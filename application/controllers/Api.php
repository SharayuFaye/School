<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH . 'libraries/REST_Controller.php'); 

require APPPATH . 'libraries/Format.php';

class Api extends CI_Controller
{
    use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct($config = 'rest')
    {
	parent::__construct($config);
	$this->__resTraitConstruct();
    	header ("Access-Control-Allow-Origin: *");
    	header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
    	header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    	header ("Access-Control-Allow-Headers: *"); 
    	
    	$method = $_SERVER['REQUEST_METHOD'];
    	if ($method == "OPTIONS") {
    	    die();
    	}
    }
    
    public function pdf_post()
    {
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        
        $token = $request['token'];
        $fees_id = $request['fees_id']; 
        
        $a=$this->load->library('numbertowords');
        
        $this->load->model('m_fees');
        $this->load->model('m_school');
        $this->load->model('m_students');
        $this->load->model('m_login');
        
        $users = $this->m_login->get_users($token);
        
        $data['getinfo'] = $this->m_fees->getContent($fees_id);
        $data['school'] = $this->m_school->school_show_id($users[0]->school_id);
        $data['students'] = $this->m_students->students_show_app($token);
        //     load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // retrieve data from model
        $data['title'] = "items";
        ini_set('memory_limit', '256M');
        // boost the memory limit if it's low ;)
        $html = $this->load->view('pdf', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html); // write the HTML into the PDF
        
        $output = 'pdf_fees/pdf_' . date('Y_m_d_H_i_s') . '.pdf';
        $pdf->Output("$output", 'F'); // save to file because we can
        
        $this->response(array(
            'url' => $output,
            'status' => 'live'
        ),200); 
        
        exit();
        
    } 
    
    
    public function login_post(){
        $this->load->model('m_login');
         
        $post_data = file_get_contents("php://input"); 
         $request = json_decode($post_data,true);  
         $username = $request['username']; 
         $password = $request['password']; 
	 $fcm_token = $request['fcm_token'];
        
        if ($username != '' && $password!='') { 
            
//             $dataCheck = $this->m_login->check_token($username,$password);
//             if($dataCheck == 'False'){
//                 $msg = "User already logged in !";
//                 $this->response(array(
//                     'msg' => $msg,
//                     'status' => 'expired'
//                 ));
//             } 
            
            $data = $this->m_login->check($username,$password);
             if($data == 'False'){
                 $msg = "Login credentials are  Incorrect.Please,try again!";
         		 $this->response(array(
                     'msg' => $msg,
                     'status' => 'expired'
                 ));
             }
             else { 
                $rand = rand(10001, 99999);
                $date = date('Y/m/d-H:m:s') ;
                $random = $rand .'_'.  $date ; 
                $dataset = $this->m_login->set_token($data[0]->id,$random, $fcm_token); 
                 
                $msg = "Login Successfull";
                $this->response(array(
                    'role' => $data[0]->role,
                    'msg' => $msg,
                    'token' => $random,
                    'status' => 'live',
					'notification' => $data[0]->notification
                ),200);
             } 
        } else { 
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ),200);
        } 
    }
     
    function set_gcm_post(){
        $this->load->model('m_login');
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $gcm = $request['gcm'];
        $token = $request['token'];  
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $user = $this->m_login->set_gcm($token,$gcm); 
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
             
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        } 
    }
    function app_dashboard_post(){
        
        $this->load->model('m_login'); 
        $this->load->model('m_students');
        $this->load->model('m_notifications');
        $this->load->model('m_attendances');
        $this->load->model('m_home_page_menu');
        $this->load->model('m_backgrounds');
        $this->load->model('m_teachers');
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true); 
        $token = $request['token']; 
        $date = $request['date'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $students = $this->m_students->students_show_app($token);
             
            $notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id,$users[0]->school_id);

			$home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->school_id);
            
           // $attendances = $this->m_attendances->attendances_show_app($users[0]->id, $date);
            
            $backgrounds = $this->m_backgrounds->backgrounds_show_app($users[0]->school_id);
            
            $teachers = $this->m_teachers->teachers_show_app($students[0]->teachers_id);
            
             
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'students_all' => $students,
                    'notifications' => $notifications,
                    'home_page_menu' => $home_page_menu,
            //        'attendances' => $attendances,
                    'backgrounds' => $backgrounds,
                    'teachers' => $teachers,
                    'status' => 'live'
                )); 
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }  
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        } 
    }
     
    
    
    function app_sel_student_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students');
        $this->load->model('m_notifications');
        $this->load->model('m_attendances');
        $this->load->model('m_home_page_menu');
        $this->load->model('m_backgrounds');
        $this->load->model('m_teachers');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $student_id = $request['student_id'];
        //$date = $request['date'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            $students = $this->m_students->students_show_app_id($token,$student_id); 
            
            $students_all = $this->m_students->students_show_app($token);
            
            $notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id,$users[0]->school_id);
            
            $home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->id);
            
            //$attendances = $this->m_attendances->attendances_show_app($users[0]->id, $date);
            
            $backgrounds = $this->m_backgrounds->backgrounds_show_app($users[0]->school_id); 
            
            $teachers = $this->m_teachers->teachers_show_app($students[0]->teachers_id);
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students_all' => $students_all,
                    'students' => $students,
                    'notifications' => $notifications,
                    'home_page_menu' => $home_page_menu,
                   // 'attendances' => $attendances,
                    'backgrounds' => $backgrounds,
                    'teachers' => $teachers,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    function app_notification_post(){
        $this->load->model('m_login'); 
        $this->load->model('m_notifications');
        $this->load->model('m_students');  
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $student_id = $request['student_id'];
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
		log_message('debug',"Notification student id : " . print_r($users,true));
            
			if($student_id){
				log_message('debug','Notification student id : '. $student_id);
            	$students = $this->m_students->students_show_app_id($token,$student_id);
       	log_message('debug',print_r($students, true));
            	$notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id,$users[0]->school_id);
			}else{
			    $notifications = $this->m_notifications->notifications_show_app($token, null, null,$users[0]->school_id);
			}

            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users, 
                    'notifications' => $notifications, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        } 
    } 
    
    function app_fees_history_post(){
        $this->load->model('m_login');
        $this->load->model('m_students');
        $this->load->model('m_fees'); 
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $student_id = $request['student_id'];
        
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token); 
            
            $fees = $this->m_fees->fees_show_app($student_id); 
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'fees' => $fees,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
            
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_attendance_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students'); ;
        $this->load->model('m_attendances');
        $this->load->model('m_teachers'); 
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);  
            
            $attendances = $this->m_attendances->attendances_app($users[0]->id); 
            
            
            
            $teachers = $this->m_teachers->teachers_show_section_app($students[0]->sections_id);
            
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'teachers' => $teachers, 
                    'attendances' => $attendances, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            } 
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    function app_attendance_show_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students'); ;
        $this->load->model('m_attendances');
        $this->load->model('m_teachers'); 
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $date = $request['date'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);
            
            $attendances = $this->m_attendances->attendances_show_app($users[0]->id, $date);
            
            $teachers = $this->m_teachers->teachers_show_section_app($students[0]->sections_id);
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'teachers' => $teachers, 
                    'attendances' => $attendances,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_exams_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students'); ;
        $this->load->model('m_exams');
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);
			log_message('debug',print_r($students, true));
            
            $exams = $this->m_exams->exams_show_app($users[0]->school_id,$students[0]->class_id, $students[0]->sections_id);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'exams' => $exams,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }  
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_marks_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students');  
        $this->load->model('m_marks');
        $this->load->model('m_exam_type');
        
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);
            
            $exam_type = $this->m_exam_type->exam_type_show_app($users[0]->school_id);
            
            $marks = $this->m_marks->marks_show_app($users[0]->school_id);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'exam_type' => $exam_type,
                    'marks' => $marks,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    
    function app_sel_marks_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students');
        $this->load->model('m_marks');
        $this->load->model('m_exam_type');
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
        $student_id = $request['student_id'];
        $exam_t = $request['exam_type'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);
            
            $exam_type = $this->m_exam_type->exam_type_show_app($users[0]->school_id);
            
            $marks = $this->m_marks->marks_id_show_app($users[0]->school_id,$student_id,$exam_t);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students,
                    'exam_type' => $exam_type,
                    'marks' => $marks,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_practise_post(){
        
        $this->load->model('m_login'); 
        $this->load->model('m_exam_type');
        $this->load->model('m_students');
        $this->load->model('m_sections');
        $this->load->model('m_practices');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $student_id = $request['student_id'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app_id($token,$student_id);
            
            $subject = $this->m_sections->subject_fetch($students[0]->sections_id);
            
            $exam_type = $this->m_exam_type->exam_type_show_app($users[0]->school_id); 
            
            $practices = $this->m_practices->practices_id_show_app($users[0]->school_id,$students[0]->sections_id);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users, 
                    'exam_type' => $exam_type,
                    'subject' => $subject,
                    'practices' => $practices, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    function app_exam_practise_post(){
        
        $this->load->model('m_login'); 
        $this->load->model('m_practices');
        $this->load->model('m_exam_type');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
//         $subject = $request['subject'];
        $date = $request['date'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            $exam_type = $this->m_exam_type->exam_type_show_app($users[0]->school_id);
            
            $practices = $this->m_practices->practices_id_show_app($users[0]->school_id,$exam_type);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'practices' => $practices,
                    'exam_type' => $exam_type, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }


    function download_practice_post(){
        
        $this->load->model('m_login'); 
        $this->load->model('m_practices');
        $this->load->model('m_exam_type');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $practice_id = $request['practice_id'];
      //    $date = $request['date'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            $exam_type = $this->m_exam_type->exam_type_show_app($users[0]->school_id);
            $practices = $this->m_practices->practices_id_show_app($users[0]->school_id,$exam_type);
            
            $practices_img = $this->m_practices->practices_img_show_app($users[0]->school_id,$practice_id);
            
             $url_to_image = "https://mastermindsdigital.in/school/practices/"+$practices_img[0]->image ;
               $my_save_dir = '';
               $filename = basename($url_to_image);
               $complete_save_loc = $my_save_dir.$filename;
               if(file_put_contents($complete_save_loc,file_get_contents($url_to_image))){
                echo "success";
               }

            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'practices_img' => $practices_img,
                    'practices' => $practices,
                    'exam_type' => $exam_type, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_timetable_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_students'); 
        $this->load->model('m_timetables'); 
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
        
        
        $student_id = $request['student_id'];
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token,$student_id); 
            
           log_message('debug',print_r($students, true)); 
//         $student_id = $request['student_id'];
//         if ($token != '') {
//             $users = $this->m_login->get_users($token);
//             $students = $this->m_students->students_show_app_id($token,$student_id);
             
            $timetable = $this->m_timetables->timetables_show_app($students[0]->class_id,$students[0]->sections_id); 
           log_message('debug',print_r($timetable, true)); 
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'students' => $students,
                    'users' => $users,
                    'timetable' => $timetable, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function app_homework_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_homework');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $student_id = $request['student_id'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $homework = $this->m_homework->homework_show_app($users[0]->school_id,$student_id);
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] < $endDay){
                $this->response(array(
                    'users' => $users,
                    'homework' => $homework,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
 
    function app_month_activity_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_activity');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);  
            $activity = $this->m_activity->activity_show_app($users[0]->school_id);
             
            $month = 9  ; 
            $year =  2019 ; 
            $firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 
            $lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 
            $count_weeks = 1 + ceil(($lastday-7+$firstday)/7);

 
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'activity' => '',
                    'count_weeks' => $count_weeks,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    

    function app_activity_week_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_activity');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
        $week = $request['week']; 
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);  

            $month = 9  ; 
            $year =  2019 ; 
            $firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 
            $lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 
            $count_weeks = 1 + ceil(($lastday-7+$firstday)/7);

            
        $thisWeek = $week+1;

        for($i = 1; $i < $week; $i++) {
            $thisWeek = $thisWeek + 7;
        }

        $currentDay = date('Y-m-d',mktime(0,0,0,$month,$thisWeek,$year));

        $monday = strtotime('monday this week', strtotime($currentDay));
        $sunday = strtotime('sunday this week', strtotime($currentDay));

        $weekStart = date('Y-m-d', $monday);
        $weekEnd = date('Y-m-d', $sunday);
        $date_for_monday = $weekStart ; 
        $date_for_sunday = $weekEnd; 
 

        $activity = $this->m_activity->activity_show_week_app($users[0]->school_id,$date_for_monday,$date_for_sunday);
              
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'activity' => $activity,
                    'count_weeks' => $count_weeks, 
                    'date_for_monday' => $date_for_monday,
                    'date_for_sunday' =>  $date_for_sunday ,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }



    function app_faq_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_faq');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            $faq = $this->m_faq->faq_show_app($users[0]->school_id);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'faq' => $faq,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
     
    function password_post(){
        
        $this->load->model('m_login'); 
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $old_password = $request['old_password'];
        $new_password = $request['new_password'] ;
        
        if ($token != '') {
            $data = $this->m_login->check_password($token,$old_password);
            if($data == 'True'){
                
                $users = $this->m_login->set_password($token,$new_password);
                
                    $this->response(array( 
                        'msg' => 'Password change successfully!',
                        'status' => 'live'
                    ));
                
            } else {
                $msg = "Old Password is Incorrect.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    

    function forget_post(){
        
        $this->load->model('m_login'); 
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true); 
        $username = $request['username'];
        $password = $request['password']; 
		$otp = $request['otp'];

		$result = $this->m_login->set_forget_password($otp, $username, $password);
		$this->response(array(
			'msg' => $result
		));
    }

    
    function logout_post(){
        
        $this->load->model('m_login');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token']; 
        if ($token != '') { 
            $users = $this->m_login->logout($token);
            
            $this->response(array(
                'msg' => 'Logout successfully!',
                'status' => 'live'
            )); 
        } else {
            $msg = "Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
        
    }
    
    
    function app_dashboard_teacher_post(){
        
        $this->load->model('m_login'); 
        $this->load->model('m_teachers');
        $this->load->model('m_home_page_menu');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            $teachers = $this->m_teachers->teachers_show_user_app($users[0]->id);
            $home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->school_id);
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users, 
                    'teachers' => $teachers,
                    'home_page_menu' => $home_page_menu,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    
    function app_attendance_teacher_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $teachers_id = $request['teachers_id'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $class = $this->m_sections->sections_show_distinct_class_app($teachers_id); 
            $sections = $this->m_sections->sections_show_app($teachers_id); 
             
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'class' => $class,
                    'sections' => $sections,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    
    
    function app_class_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $class = $request['class'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $sections = $this->m_sections->sections_class_app($class,$users[0]->school_id); 
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users, 
                    'sections' => $sections,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    
    
    
    function app_add_attendance_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        $this->load->model('m_attendances');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $class = $request['class'];
//         $attendance = $request['attendance'];
        $section = $request['section'];
        $date = $request['date'];
        $teacher_id = $request['teacher_id'];
//         $students_id = $request['students_idrequest'];
        log_message('debug',print_r($request,true)); 
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $attendance = $this->m_attendances->attendance_app($class,$section,$date,$teacher_id,$users[0]->school_id);
			foreach($attendance as $a){
				if(!isset($a->attendance)){
					$a->attendance = null;
					$recorded = false;
				}else{
					$recorded = true;
				}
			}
        log_message('debug',print_r($attendance,true)); 
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
					'recorded' => $recorded,
                    'users' => $users,
                    'attendance' => $attendance, 
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    
    
    function app_attendance_add_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        $this->load->model('m_attendances');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        
        $token = $request['token'];
        $class = $request['class'];
        $section = $request['section'];
        $date = $request['date'];
        $teacher_id = $request['teacher_id']; 
        $attendance = $request['attendance'];
        
        log_message('debug',print_r($request,true)); 
        
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            foreach($attendance as $key=>$value){
                
				$status = $value == 1 ? "present" : "absent";
                $att  = $this->m_attendances->attendance_add_app($class,$section,$date,$teacher_id,$key, $status, $users[0]->school_id,$users[0]->id);
            }
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'msg' => 'Attendance submitted successfully'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    function app_dashboard_drivers_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_drivers');
        $this->load->model('m_home_page_menu');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $drivers = $this->m_drivers->drivers_show_user_app($users[0]->id);
            $home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->school_id);
            
            $d = explode('_',$token);
            $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'drivers' => $drivers,
                    'home_page_menu' => $home_page_menu,
                    'status' => 'live'
                ));
            }else{
                $msg = "Session Expired.Please,try again!";
                $this->response(array(
                    'msg' => $msg,
                    'status' => 'expired'
                ));
            }
        } else {
            $msg = "Login credentials are Incorrect.Please,try again!";
            $this->response(array(
                'msg' => $msg,
                'status' => 'expired'
            ));
        }
    }
    
    function get_driver_route_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_drivers');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
	log_message("debug","Driver Route Token ::::: " . $token);
        
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $drivers = $this->m_drivers->drivers_show_user_app($users[0]->id);
	    	$route = $this->m_drivers->get_driver_route($drivers[0]->id);
	    	$this->response(array(
			    'routes'=> $route
	    	));
		}
    }
    
    function get_pickup_points_post(){
		$this->load->model('m_route');
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $points = $request['points'];
		log_message("debug","Points ::::: " . $points);
		$pickups = $this->m_route->get_pickup_points($points);
		$this->response(array(
			'pickups'=> $pickups
		));
    }

    function update_location_post(){
		$this->load->model('m_location');
		$this->load->model('m_bus');

		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$lat = $request['latitude'];
		$lon = $request['longitude'];
		$bus = $request['bus'];
		$bus_id = $this->m_bus->get_bus_id($bus);
		log_message("debug","Bus id ::::: " . print_r($bus_id, true));

		$this->m_location->update_location($lat, $lon, $bus_id[0]->id);
	}

	/*Get the pickup points for the student. Called from bus.page.ts*/
	function get_student_route_post(){
		$this->load->model('m_route');
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		log_message("debug","Token ::::: " . $token);
		
		$route = $this->m_route->get_student_route($token);

		$this->response(array(
			'route'=> $route
		));
	}

	/*Get the current location of the bus for a student. Called from bus.page.ts*/
	function get_bus_location_post(){
		$this->load->model('m_route');
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$location = $this->m_route->get_bus_location($token);
		$this->response(array(
			'location' => $location
		));
	}
		
	/*Function for submitting leaves. Check if leave is already applied for the dates*/
	function apply_leave_post(){
		$this->load->model("m_attendances");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$start_date = date("Y-m-d",strtotime(date($request['start_date'])));
		$end_date = date("Y-m-d",strtotime(date($request['end_date'])));
		$reason = $request['reason'];
		$approver = $request['teacher'];
		$desc = $request['description'];
		$student = $request['student'];

		$result = $this->m_attendances->apply_leave($student, $start_date, $end_date, $reason, $approver, $desc);
		$this->response(array(
			'msg' => $result
		));
	}

	/*Get leaves by student id */
	function get_leaves_post(){
		$this->load->model("m_attendances");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$student = $request['student'];

		$result = $this->m_attendances->get_leaves($student);
		foreach($result as $d){
			$d->days = round(($d->end_date - $d->start_date)/(60*60*24)) + 1;
		}
		$this->response(array(
			'leaves'=> $result
		));
	}
		
 	/*Get the section details for which the teacher is the approver and the pending leaves for those sections*/
	function get_class_leaves_post(){
		$this->load->model("m_attendances");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$status = $request['status'];

		$data = $this->m_attendances->get_class_leaves($token, $status);
		$cons = array();
		foreach($data as $d){
			if($d->status == "pending"){
				if(!array_key_exists($d->sec, $cons)){
					$cons[$d->sec] = array($d->class_id, $d->sections, 1);
				}else{
					$pending = $cons[$d->sec][2] + 1;
					$cons[$d->sec] = array($d->class_id, $d->sections, $pending);
				}
			}else{
				if(!array_key_exists($d->sec, $cons)){
					$cons[$d->sec] = array($d->class_id, $d->sections, 0);
				}
			}	
			$d->days = round(($d->end_date - $d->start_date)/(60*60*24)) + 1;
		}
		$this->response(array(
			'data' => $data,
			'cons' => $cons
		));
	}

	/*Set the leave status and remarks for the student. Teacher function*/
	function set_leave_post(){
		$this->load->model("m_attendances");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$status = $request['status'];
		$leave_id = $request['leave_id'];
		$remark = $request['remark'];

		$data = $this->m_attendances->set_leave($token, $status, $leave_id, $remark);
		foreach($data as $d){
			$d->days = round(($d->end_date - $d->start_date)/(60*60*24)) + 1;
		}
		$this->response(array(
			'data' => $data
		));
	}

	/*Save image to local folder*/
	function hw_image_upload_post(){
		$this->load->model("m_homework");
        $config['upload_path']  = './homework/'; 
        $config['allowed_types']        = 'jpg|png|jpeg';  
        $this->load->library('upload', $config); 

        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors()); 
                 $this->response(array(
                    'error' => $error,  
                    'request' => $_FILES['file']['name'],  
                ),200);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                 $this->response(array(
                    'msg' => "File uploaded successfully",
                    'request' => $_FILES['file']['name'],  
                ),200); 
        } 
	}

	/*Add homework record from the app*/
	function add_homework_post(){
		$this->load->model("m_homework");
		$this->load->model("m_login");
		$this->load->model("m_teachers");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$user = $this->m_login->get_users($token);
		$teacher = $this->m_teachers->teachers_show_id_user($user[0]->id); 
		log_message('debug', print_r($request, true));
		$homework = array(
			'teacher_id' 	=> $teacher[0]->id,
			'class_id' 	=> $request['class_id'],
			'sections_id' 	=> $request['section'],
			'subject' 	=>$request['subject'],
			'details' 	=> $request['details'],
			'image' 	=> array_key_exists('image',$request) ? $request['image'] : null,
			'submission_date' => $request['submit_by'],
			'created_by' => $teacher[0]->id,
			'created_date' => date('Y-m-d'),
			'active' 	=> $request['active'],
			'school_id' 	=> $teacher[0]->school_id
		);
		$data = $this->m_homework->add_homework($homework);
        $this->response(array(
        	'msg' => "Homework added successfully",
			'homework' => $data
        ),200); 
	}

	/*Get homework details to display to the teachers */
	function get_teacher_hw_post(){
		$this->load->model("m_homework");
		$this->load->model("m_login");
		$this->load->model("m_teachers");
		$this->load->model("m_sections");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$user = $this->m_login->get_users($token);
		$teacher = $this->m_teachers->teachers_show_id_user($user[0]->id); 
        $class = $this->m_sections->sections_show_distinct_class_app($teacher[0]->id); 
        $sections = $this->m_sections->sections_show_app($teacher[0]->id); 

		$homework = $this->m_homework->get_teacher_hw($teacher[0]->id);
		$this->response(array(
				'homework' => $homework,
				'sections' => $sections,
				'class' => $class
		));
	}

	function set_notification_post(){
		$this->load->model("m_login");
		$post_data = file_get_contents("php://input");
		$request = json_decode($post_data, true);
		$token = $request['token'];
		$value = $request['notification'];
		$result = $this->m_login->set_notification($token, $value);
		$this->response(array(
			'status' => $result
		));
	}

}
