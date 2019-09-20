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
    
    public function login_post(){
        $this->load->model('m_login');
         
        $post_data = file_get_contents("php://input"); 
         $request = json_decode($post_data,true);  
         $username = $request['username']; 
         $password = $request['password']; 
	 $fcm_token = $request['fcm_token'];
        
        if ($username != '' && $password!='') { 
            $data = $this->m_login->check($username,$password);
             if($data == 'False'){
                 $msg = "Login credentials are 111 Incorrect.Please,try again!";
         		 $this->response(array(
                     'msg' => $msg,
                     'status' => 'expired'
                 ));
             }
             else {
                $rand = rand(10001, 99999);
                $date = date('Y/m/d-H:m:s') ;
                $random = $rand .'_'.  $date ; 
                 $dataset = $this->m_login->set_token($data[0]->id,$random,$fcm_token); 
                 
                $msg = "Login Successfull";
                $this->response(array(
                    'role' => $data[0]->role,
                    'msg' => $msg,
                    'token' => $random,
                    'status' => 'live'
                ),200);
             } 
        } else { 
            $msg = "Login credentials 222 are Incorrect.Please,try again!";
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
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);
             
            $notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id);
            
            $home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->id);
            
            $attendances = $this->m_attendances->attendances_show_app($users[0]->id);
            
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
                    'attendances' => $attendances,
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
        
        if ($token != '') {
            $users = $this->m_login->get_users($token); 
            
            $students = $this->m_students->students_show_app_id($token,$student_id); 
            
            $students_all = $this->m_students->students_show_app($token);
            
            $notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id);
            
            $home_page_menu = $this->m_home_page_menu->home_page_menu_show_app($users[0]->id);
            
            $attendances = $this->m_attendances->attendances_show_app($users[0]->id);
            
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
                    'attendances' => $attendances,
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
            
            $students = $this->m_students->students_show_app($token,$student_id);
            $notifications = $this->m_notifications->notifications_show_app($token,$students[0]->class_id,$students[0]->sections_id);
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
         
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            
            $students = $this->m_students->students_show_app($token);  
            
            $attendances = $this->m_attendances->attendances_show_app($users[0]->id); 
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
                    'users' => $users,
                    'students' => $students, 
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
            
            $exams = $this->m_exams->exams_show_app($users[0]->school_id);
            
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
     
    function app_timetable_post(){
        
        $this->load->model('m_login');
        $this->load->model('m_timetables'); 
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
             
            $timetable = $this->m_timetables->timetables_show_app($users[0]->school_id); 
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
                $this->response(array(
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
        $this->load->model('m_homework');
        
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        $token = $request['token'];
        $month = $request['month'];
         
        if ($token != '') {
            $users = $this->m_login->get_users($token);
            $month = $this->m_login->get_users($month);
            
            $activity = $this->m_activity->activity_show_app($users[0]->school_id);
            
            $d = explode('_',$token);
             $endDay = strtotime(date('Y/m/d H:i:s', strtotime('+1 day',strtotime($d[1]))));
            if($d[1] <   $endDay){
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
}
