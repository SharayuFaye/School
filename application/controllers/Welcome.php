<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);
 

class Welcome extends CI_Controller {
	function __Construct(){
	  	parent::__Construct ();
	  	$this->load->database(); 
		$this->load->helper('url');
		$this->load->helper('url_helper'); 
		$this->load->helper('file'); 
		$this->load->helper('form'); 
		$this->load->library('form_validation'); 
		$this->load->library('session');
		  
		//--------------------------------//
	 }  
	public function index()
	{	
		if($this->input->post('login')){ 
		    $this->load->model('m_login');
		    $this->load->model('m_school');
		    $this->load->model('m_school_admin');
		    $this->load->model('m_students');
		    $this->load->model('m_teachers');
		    $this->load->model('m_drivers');
		    
			$username = $this->input->post('username') ;
			$password = $this->input->post('password') ; 

			$data = $this->m_login->check($username,$password);
 
			if($data == 'False'){
				$this->data['msg']='Sorry!Username Password is incorrect.Please try again!';
				$this->load->view('login',$this->data);
			}else {
			     
			    $school_show_id = $this->m_school->school_show_id($data[0]->school_id);
			    if(isset($school_show_id[0]->school_logo)){
			        $logo = $school_show_id[0]->school_logo ;
			    }else{
			        $logo = 'logo.png';
			    }
				$this->session->set_userdata(array(
							'id' => $data[0]->id,
							'username' => $data[0]->username,
							'password' => $data[0]->password,
				            'school' => $data[0]->school_id,
        				    'role' =>  $data[0]->role,
				            'logo' =>  $logo
				)) ;
				$this->load->model('m_school');
				$this->data['school_show'] =$this->m_school->school_show();
				$this->data['school_count'] =count($this->m_school->school_show());
				$this->data['school_admin_count'] =count($this->m_school_admin->school_admin_show());
				
				$this->data['students_count'] =count($this->m_students->students_show());
				$this->data['teachers_count'] =count($this->m_teachers->teachers_show());
				$this->data['drivers_count'] =count($this->m_drivers->drivers_show());
				$this->load->view('dashboard',$this->data);
			}
		} else{
			$this->load->view('login');
		}
	}
	public function dashboard()
	{ 
		if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{
		    $this->load->model('m_school');
		    $this->load->model('m_students');
		    $this->load->model('m_teachers');
		    $this->load->model('m_school_admin');
		    $this->load->model('m_drivers');
		    
		    $this->data['school_count'] =count($this->m_school->school_show());
		    $this->data['school_admin_count'] =count($this->m_school_admin->school_admin_show());
		     
		    $this->data['school_show'] =$this->m_school->school_show();
		    $this->data['students_count'] =count($this->m_students->students_show());
		    $this->data['teachers_count'] =count($this->m_teachers->teachers_show());
		    $this->data['drivers_count'] =count($this->m_drivers->drivers_show());
		    
		    $this->load->view('dashboard',$this->data);
		}	
	}

	public function logout_admin() { 
		$this->session->set_userdata(array(
							'username' => '',
							'password' => '',
							'school' => '',
							'role' =>  ''
							)); 
		$this->data['msg'] = 'Successfully Logout';
		$this->load->view('login');
	}

	public function roles()
	{	 
		if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_roles');
			if($this->input->post('save_role')){ 
				$role = $this->input->post('role') ;
				$this->m_roles->roles_add($role);
			} 
			if($this->input->post('edit_role')){ 
				$id = $this->input->post('id') ;
				$role = $this->input->post('role') ;
				$this->m_roles->roles_edit($id,$role);
			} 
			if($this->input->post('del_role')){ 
				$id = $this->input->post('id') ;
				$this->m_roles->roles_delete($id);
			} 
			$this->data['roles_show'] =$this->m_roles->roles_show();
			$this->load->view('roles',$this->data);

		}  		
	}

	public function school()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_school');
	  		$this->load->model('m_class');
	  		$this->load->model('m_sections');
	  		$this->load->model('m_teachers');
	  		$this->load->model('m_school');

	        if($this->input->post('save_school')){


	        	$config['upload_path']  = './logo/'; 
				$config['allowed_types']        = 'jpg|png|jpeg';  
           		$this->load->library('upload', $config); 

            	if ( ! $this->upload->do_upload('school_logo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!';
                    $school_logo = ''; 
                        
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $school_logo = $data['upload_data']['file_name'];  
                } 
 
	            $school_name = $this->input->post('school_name') ;
	            $school_address = $this->input->post('school_address') ;
	             $school_mobile = $this->input->post('school_mobile') ; 
	             $school_mobile2 = $this->input->post('school_mobile2') ; 
	            $school_mail = $this->input->post('school_mail') ;
	            $date = $this->input->post('date') ;
	            
	            if($school_mobile == $school_mobile2){
	                $this->data['error_msg'] = 'Mobile and alternate mobile number should not be same!!' ;
                }
                else
                {
                    $data = $this->m_school->school_add($school_name,$school_address,$school_mobile,$school_mobile2,$school_logo,$school_mail,$date); 
                    
                    if($data != 'true'){
                        $this->data['error_msg'] ='Data should be Unique!';
                    }else{
                        $this->data['success_msg'] ='Record inserted successfully!';
                    }
                    
                    
                }
	        }

	        if($this->input->post('edit_school')){
	            $id = $this->input->post('id') ;
	            if (isset($_FILES['school_logo']) && is_uploaded_file($_FILES['school_logo']['tmp_name'])) {
   
		        	$config['upload_path']  = './logo/'; 
					$config['allowed_types']        = 'jpg|png|jpeg';  
	           		$this->load->library('upload', $config); 

	            	if ( ! $this->upload->do_upload('school_logo'))
	                {
	                    $error = array('error' => $this->upload->display_errors());
	                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!';
	                    $school_logo = ''; 
	                        
	                }else{
	                    $data = array('upload_data' => $this->upload->data());
	                        $school_logo = $data['upload_data']['file_name'];  
	                } 
 				}else{
 					 $school_show_id   =$this->m_school->school_show_id($id); 
 					 $school_logo = $school_show_id[0]->school_logo;  
 				} 
 
	            $school_name = $this->input->post('school_name') ;
	            $school_address = $this->input->post('school_address') ;
	            $school_mobile = $this->input->post('school_mobile') ;
	            $school_mobile2 = $this->input->post('school_mobile2') ; 
	            $school_mail = $this->input->post('school_mail') ;
	            $date = $this->input->post('date') ;

	            $data = $this->m_school->school_edit($id,$school_name,$school_address,$school_mobile,$school_mobile2,$school_logo,$school_mail,$date);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	            
	        }

	        if($this->input->post('del_school')){
	            $id = $this->input->post('id') ;
	            $data =  $this->m_school->school_delete($id);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	         
	        $this->data['class_show'] =$this->m_class->class_show();
	        $this->data['sections_show'] =$this->m_sections->sections_show();
	        $this->data['teachers_show'] =$this->m_teachers->teachers_show();
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->load->view('school',$this->data);
	    }    
    }

    
    public function school_admin()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_school'); 
            $this->load->model('m_school_admin');
            
            if($this->input->post('save_school_admin')){
                 
                $username = $this->input->post('username') ;
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password') ; 
                $school_id = $this->input->post('school') ;
                $role = 'school_admin' ; 
                if($confirm_password == $password){
                    $data = $this->m_school_admin->school_admin_add($username,$password,$school_id,$role);
                    
                    if($data != 'true'){
                        $this->data['error_msg'] ='Data should be Unique!';
                    }else{
                        $this->data['success_msg'] ='Record inserted successfully!';
                    }
                }else{
                    $this->data['msg'] = 'Password and confirm password should match!' ;
                }
            }
            
            if($this->input->post('edit_school_admin')){
                $id = $this->input->post('id') ;
                $username = $this->input->post('username') ;
                $password = $this->input->post('password') ;
                $confirm_password = $this->input->post('confirm_password') ; 
                $school_id = $this->input->post('school') ;
                $role = 'school_admin' ; 
                $role = 'school_admin' ;
                if($confirm_password == $password){
                    $data = $this->m_school_admin->school_admin_edit($id,$username,$password,$school_id,$role); 
                    if($data != 'true'){
                        $this->data['error_msg'] ='Error in updation!';
                    }else{
                        $this->data['success_msg'] ='Record updated successfully!';
                    }
                }else{
                    $this->data['msg'] = 'Password and confirm password should match!' ;
                } 
            }
            
            if($this->input->post('del_school_admin')){
                $id = $this->input->post('id') ;
                $data = $this->m_school_admin->school_admin_delete($id);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
             
            $this->data['school_show'] =$this->m_school->school_show();
            $this->data['school_admin_show'] =$this->m_school_admin->school_admin_show();
            $this->load->view('school_admin',$this->data);
        }
    }
    
    
    
    
    public function backgrounds()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_school'); 
	  		$this->load->model('m_backgrounds');

	        if($this->input->post('save_backgrounds')){ 

	        	$config['upload_path']  = './wallpaper/'; 
				$config['allowed_types']        = 'jpg|png|jpeg';  
           		$this->load->library('upload', $config); 

            	if ( ! $this->upload->do_upload('wallpaper'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!';
                    $wallpaper = ''; 
                        
                }else{
                        $data = array('upload_data' => $this->upload->data());
                        $wallpaper = $data['upload_data']['file_name'];  
                } 
 
	            $date = $this->input->post('date') ;
	            $school = $this->input->post('school') ; 
	            $data = $this->m_backgrounds->backgrounds_add($wallpaper,$date,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	            
	        }

	        if($this->input->post('edit_backgrounds')){

	            $id = $this->input->post('id') ;
	            if (isset($_FILES['wallpaper']) && is_uploaded_file($_FILES['wallpaper']['tmp_name'])) {
   
		        	$config['upload_path']  = './wallpaper/'; 
					$config['allowed_types']        = 'jpg|png|jpeg';  
	           		$this->load->library('upload', $config); 

	            	if ( ! $this->upload->do_upload('wallpaper'))
	                {
	                    $error = array('error' => $this->upload->display_errors());
	                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!';
	                    $wallpaper = ''; 
	                        
	                }else{
	                        $data = array('upload_data' => $this->upload->data());
	                        $wallpaper = $data['upload_data']['file_name'];  
	                } 
 				}else{
 					 $backgrounds_show_id   =$this->m_backgrounds->backgrounds_show_id($id); 
 					 $wallpaper = $backgrounds_show_id[0]->wallpaper;  
 				} 
 
	            $date = $this->input->post('date') ;
	            $school = $this->input->post('school') ; 

	            $data = $this->m_backgrounds->backgrounds_edit($id,$wallpaper,$date,$school);
	             
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	            
	        }

	        if($this->input->post('del_backgrounds')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_backgrounds->backgrounds_delete($id);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        } 
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->data['backgrounds_show'] =$this->m_backgrounds->backgrounds_show();
	        $this->load->view('backgrounds',$this->data);
	    }    
    }
    
    public function home_page_menu()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_school'); 
	  		$this->load->model('m_home_page_menu');

	        if($this->input->post('save_home_page_menu')){  
	            $menu_name = $this->input->post('menu_name') ;
	            $page_name = $this->input->post('page_name') ;
	            $school = $this->input->post('school') ; 
	            $data = $this->m_home_page_menu->home_page_menu_add($menu_name,$page_name,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_home_page_menu')){

	            $id = $this->input->post('id') ; 
	            $menu_name = $this->input->post('menu_name') ;
	            $page_name = $this->input->post('page_name') ;
	            $school = $this->input->post('school') ; 
	            $data = $this->m_home_page_menu->home_page_menu_edit($id,$menu_name,$page_name,$school);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	            
	        }

	        if($this->input->post('del_home_page_menu')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_home_page_menu->home_page_menu_delete($id);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        } 
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->data['home_page_menu_show'] =$this->m_home_page_menu->home_page_menu_show();
	        $this->load->view('home_page_menu',$this->data);
	    }    
    }
    
    public function teachers()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_school'); 
	  		$this->load->model('m_teachers');
// 	  		$this->load->library('Excel');
	  		
	  		if($this->input->post('upload_xls')){  
	  		    $path = './xls_teacher/';
	  		    require_once APPPATH . "/third_party/PHPExcel/Classes/PHPExcel.php";
	  		    $config['upload_path'] = $path;
	  		    $config['allowed_types'] = 'xlsx|xls';
	  		    $config['remove_spaces'] = TRUE;
	  		    $this->load->library('upload', $config);
	  		    $this->upload->initialize($config);
	  		    if (!$this->upload->do_upload('xls_file')) {
	  		        $error = array('error' => $this->upload->display_errors());
	  		    } else {
	  		        $data = array('upload_data' => $this->upload->data());
	  		    }
	  		    if(empty($error)){
	  		        if (!empty($data['upload_data']['file_name'])) {
	  		            $import_xls_file = $data['upload_data']['file_name'];
	  		        } else {
	  		            $import_xls_file = 0;
	  		        }
	  		        $inputFileName = $path . $import_xls_file;
	  		        
	  		        try {
	  		            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	  		            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	  		            $objPHPExcel = $objReader->load($inputFileName);
	  		            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	  		            $flag = true;
	  		            $i=0;
	  		            foreach ($allDataInSheet as $value) {
	  		                if($flag){
	  		                    $flag =false;
	  		                    continue;
	  		                }
	  		                 
	  		                $inserdata[$i]['teacher_name']  = $value['A'];
	  		                $inserdata[$i]['teacher_address']  = $value['B'];
	  		                $inserdata[$i]['teacher_mobile']  = $value['C'];
	  		                $inserdata[$i]['teacher_mail']  = $value['D'];
	  		                $inserdata[$i]['salary_details']  =  $value['E'];
	  		                $inserdata[$i]['education_details']  = $value['F'];
	  		                $inserdata[$i]['username']  = $value['G'];
	  		                $inserdata[$i]['password']  = $value['H'];
	  		                $inserdata[$i]['join_date']  = $value['I']; 
	  		                
	  		                $i++;
	  		            }
	  		            
	  		            $result = $this->m_teachers->importdata($inserdata);
	  		            $this->data['duplicate_record'] =$result;
	  		            
	  		        } catch (Exception $e) {
	  		            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	  		                . '": ' .$e->getMessage());
	  		        }
	  		    }else{
	  		        $this->data['error_msg'] = $error['error'];
	  		    } 
		
	  		}
		
	        if($this->input->post('save_teachers')){  
 
	            $teacher_name = $this->input->post('teacher_name') ;
	            $teacher_address = $this->input->post('teacher_address') ; 
	            $teacher_mobile = $this->input->post('teacher_mobile') ;
	            $teacher_mail = $this->input->post('teacher_mail') ;
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
	            $salary_details = $this->input->post('salary_details') ;
	            $education_details = $this->input->post('education_details') ;  
	            $join_date = $this->input->post('join_date') ;
	            $school = $this->session->userdata['school']; 

	            $data = $this->m_teachers->teachers_add($teacher_name,$teacher_address,$teacher_mobile,$teacher_mail,$username,$password,$salary_details,$education_details, $join_date,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_teachers')){

	            $id = $this->input->post('id') ;
	            $user_id = $this->input->post('users_id') ;
	            $teacher_name = $this->input->post('teacher_name') ;
	            $teacher_address = $this->input->post('teacher_address') ; 
	            $teacher_mobile = $this->input->post('teacher_mobile') ;
	            $teacher_mail = $this->input->post('teacher_mail') ; 
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
	            $salary_details = $this->input->post('salary_details') ;
	            $education_details = $this->input->post('education_details') ;  
	            $join_date = $this->input->post('join_date') ;
	            $school = $this->session->userdata['school']; 

	            $data = $this->m_teachers->teachers_edit($id,$user_id,$teacher_name,$teacher_address,$teacher_mobile,$teacher_mail,$username,$password,$salary_details,$education_details, $join_date,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	            
	        }

	        if($this->input->post('del_teachers')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_teachers->teachers_delete($id);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        } 
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->data['teachers_show'] =$this->m_teachers->teachers_show();
	        $this->load->view('teachers',$this->data);
	    }    
    }

    public function class()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{   
	  		$this->load->model('m_class'); 
	  		$this->load->model('m_school');

	        if($this->input->post('save_class')){
	            $school = $this->session->userdata['school']; 
	            $class = $this->input->post('class') ; 
	            $this->m_class->class_add($school,$class);
	        }

	        if($this->input->post('edit_class')){
	            $id = $this->input->post('id') ;
	            $school = $this->session->userdata['school']; 
	            $class = $this->input->post('class') ; 
	            $this->m_class->class_edit($id,$school,$class);
	        }

	        if($this->input->post('del_class')){
	            $id = $this->input->post('id') ;
	            $this->m_class->class_delete($id);
	        }
	         
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->data['class_show'] =$this->m_class->class_show_id(); 
	        $this->load->view('class',$this->data);
	    }    
    }

    public function sections()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{   
	  		$this->load->model('m_class'); 
	  		$this->load->model('m_sections'); 
	  		$this->load->model('m_school');
	  		$this->load->model('m_teachers');
	  		
	  		// for upload  
	  		if($this->input->post('upload_xls')){
	  		    $path = './xls_sections/';
	  		    require_once APPPATH . "/third_party/PHPExcel/Classes/PHPExcel.php";
	  		    $config['upload_path'] = $path;
	  		    $config['allowed_types'] = 'xlsx|xls';
	  		    $config['remove_spaces'] = TRUE;
	  		    $this->load->library('upload', $config);
	  		    $this->upload->initialize($config);
	  		    if (!$this->upload->do_upload('xls_file')) {
	  		        $error = array('error' => $this->upload->display_errors());
	  		    } else {
	  		        $data = array('upload_data' => $this->upload->data());
	  		    }
	  		    if(empty($error)){
	  		        if (!empty($data['upload_data']['file_name'])) {
	  		            $import_xls_file = $data['upload_data']['file_name'];
	  		        } else {
	  		            $import_xls_file = 0;
	  		        }
	  		        $inputFileName = $path . $import_xls_file;
	  		        
	  		        try {
	  		            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	  		            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	  		            $objPHPExcel = $objReader->load($inputFileName);
	  		            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	  		            $flag = true;
	  		            $i=0;
	  		            foreach ($allDataInSheet as $value) {
	  		                if($flag){
	  		                    $flag =false;
	  		                    continue;
	  		                }
	  		                
	  		                $inserdata[$i]['class_id']  = $value['A'];
	  		                $inserdata[$i]['sections']  = $value['B'];
	  		                $inserdata[$i]['subject']  = $value['C']; 
	  		                
	  		                $i++;
	  		            }
	  		            
	  		            $result = $this->m_sections->importdata($inserdata);
	  		            $this->data['duplicate_record'] =$result;
	  		            
	  		        } catch (Exception $e) {
	  		            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	  		                . '": ' .$e->getMessage());
	  		        }
	  		    }else{
	  		        $this->data['error_msg'] = $error['error'];
	  		    }
	  		    
	  		}
	  		
	  		// for upload  
	  		
	  		
	        if($this->input->post('save_sections')){
	            
	            $school = $this->session->userdata['school'] ;
	            $class = $this->input->post('class') ;
	            $sections = $this->input->post('sections') ;
	            
	            $teacher = $this->input->post('teacher') ;
	            
	            if($this->input->post('subject') ){
    	            $checkbox = $this->input->post('subject') ; 
    	            $values  = implode(",", $checkbox);
	            }else{
	                $values ='0';
	            }
	            if($values != '0' ){
    	            $subject = $values ;
    	            $data = $this->m_sections->sections_add($school,$class,$sections,$subject,$teacher);
    	            
    	            if($data != 'true'){
    	                $this->data['error_msg'] ='Data should be Unique!';
    	            }else{
    	                $this->data['success_msg'] ='Record inserted successfully!';
    	            }
	            }else{
	                $this->data['error_msg'] ='Please select subject!';
	            }
	        }

	        if($this->input->post('edit_sections')){
	            $id = $this->input->post('id') ;
	            $school = $this->session->userdata['school'] ;
	            $class = $this->input->post('class') ; 
	            $sections = $this->input->post('sections');
	            $teacher = $this->input->post('teacher') ;
	            
	            if($this->input->post('subject')){
    	            $checkbox = $this->input->post('subject') ;
    	            $values  = implode(",", $checkbox);
    	            $subject = $values ;
	            }else{
	                $subject ='0';
	            }
	            if($subject != '0' ){
	                $data = $this->m_sections->sections_edit($id,$school,$class,$sections,$subject,$teacher);
    	            if($data != 'true'){
    	                $this->data['error_msg'] ='Error in updation!';
    	            }else{
    	                $this->data['success_msg'] ='Record updated successfully!';
    	            }
	            }else{
	                $this->data['error_msg'] ='Please select subject!';
	            }
	        }

	        if($this->input->post('del_sections')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_sections->sections_delete($id);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	         
	        $this->data['school_show'] =$this->m_school->school_show();
	        $this->data['teachers_show'] =$this->m_teachers->teachers_show();
	        $this->data['class_show'] =$this->m_class->class_show_id();  
	        $this->data['sections_show'] =$this->m_sections->sections_show(); 
	        $this->load->view('sections',$this->data);
	    }    
    }

    public function route()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{    
	  		$this->load->model('m_route');  

	        if($this->input->post('save_route')){
	            $school = $this->session->userdata['school'] ;
	            $pickup_point = $this->input->post('pickup_point') ;
	            $longitude = $this->input->post('longitude') ;
	            $lattitude = $this->input->post('lattitude') ; 
	            $data = $this->m_route->route_add($pickup_point,$longitude,$lattitude,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_route')){
	            $school = $this->session->userdata['school'] ;
	            $id = $this->input->post('id') ;
	            $pickup_point = $this->input->post('pickup_point') ;
	            $longitude = $this->input->post('longitude') ;
	            $lattitude = $this->input->post('lattitude') ; 
	            $data = $this->m_route->route_edit($id,$pickup_point,$longitude,$lattitude,$school);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	        }

	        if($this->input->post('del_route')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_route->route_delete($id); 
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	            
	        $this->data['route_show'] =$this->m_route->route_show_id(); 
	        $this->load->view('route',$this->data);
	    }    
    }
    
    public function sel_route()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_sel_route');
            $this->load->model('m_route');
            
            if($this->input->post('save_route')){
                $school = $this->session->userdata['school'] ;  
                $route = $this->input->post('route') ; 
                
                if($this->input->post('pickup_point')){
                    $pickup_point =  implode(",", $this->input->post('pickup_point'));
                }else{
                    $pickup_point =  '';
                }
                 
                $data = $this->m_sel_route->route_add($route,$pickup_point,$school);
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
            }
            
            if($this->input->post('edit_route')){
                $school = $this->session->userdata['school'] ;
                $id = $this->input->post('id') ;  ;
                $route = $this->input->post('route') ;
                if($this->input->post('pickup_point')){
                $pickup_point =  implode(",", $this->input->post('pickup_point')); 
                }else{
                    $pickup_point =  '';
                }
                $data = $this->m_sel_route->route_edit($id,$route,$pickup_point,$school);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
            }
            
            if($this->input->post('del_route')){
                $id = $this->input->post('id') ;
                $data = $this->m_sel_route->route_delete($id);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
            
            $this->data['pickup_show'] =$this->m_route->route_show();
            $this->data['route_show'] =$this->m_sel_route->route_show();
            $this->load->view('sel_route',$this->data);
        }
    }
    
    public function bus()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{    
	  		$this->load->model('m_bus');
	  		$this->load->model('m_sel_route');
	  		$this->load->model('m_drivers'); 

	  		 
	  		
	        if($this->input->post('save_bus')){
	            $bus_number = $this->input->post('bus_number') ;
	            $route = $this->input->post('route') ;
	            $student_strength = $this->input->post('student_strength') ;
	            
	            
	            if($this->input->post('drivers')){
    	            $checkbox = $this->input->post('drivers') ;
    	            $drivers  = implode(",", $checkbox);
    	        }else{
    	            $drivers ='0';
    	        }
	            $school = $this->session->userdata['school'] ; 
	            $data = $this->m_bus->bus_add($bus_number,$route,$student_strength,$drivers,$school);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Bus number should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_bus')){
	            $id = $this->input->post('id') ;
	            $bus_number = $this->input->post('bus_number') ;
	            $route = $this->input->post('route') ;
	            $student_strength = $this->input->post('student_strength') ;
	            
	            if($this->input->post('drivers')){
	            $checkbox = $this->input->post('drivers') ;
	            $drivers  = implode(",", $checkbox);
	            }else{
	                $drivers ='0';
	            }
	            $school = $this->session->userdata['school'] ;   
	            $data = $this->m_bus->bus_edit($id,$bus_number,$route,$student_strength,$drivers,$school);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	        }

	        if($this->input->post('del_bus')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_bus->bus_delete($id);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	        
	        $this->data['route_show'] =$this->m_sel_route->route_show_id(); 
	        $this->data['drivers_show'] =$this->m_drivers->drivers_show();     
	        $this->data['bus_show'] =$this->m_bus->bus_show_id(); 
	        $this->load->view('bus',$this->data);
	    }    
    }

	public function drivers()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_bus');
	  		$this->load->model('m_drivers');
	  		
	  		// for upload
	  		if($this->input->post('upload_xls')){
	  		    $path = './xls_drivers/';
	  		    require_once APPPATH . "/third_party/PHPExcel/Classes/PHPExcel.php";
	  		    $config['upload_path'] = $path;
	  		    $config['allowed_types'] = 'xlsx|xls';
	  		    $config['remove_spaces'] = TRUE;
	  		    $this->load->library('upload', $config);
	  		    $this->upload->initialize($config);
	  		    if (!$this->upload->do_upload('xls_file')) {
	  		        $error = array('error' => $this->upload->display_errors());
	  		    } else {
	  		        $data = array('upload_data' => $this->upload->data());
	  		    }
	  		    if(empty($error)){
	  		        if (!empty($data['upload_data']['file_name'])) {
	  		            $import_xls_file = $data['upload_data']['file_name'];
	  		        } else {
	  		            $import_xls_file = 0;
	  		        }
	  		        $inputFileName = $path . $import_xls_file;
	  		        
	  		        try {
	  		            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	  		            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	  		            $objPHPExcel = $objReader->load($inputFileName);
	  		            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	  		            $flag = true;
	  		            $i=0;
	  		            foreach ($allDataInSheet as $value) {
	  		                if($flag){
	  		                    $flag =false;
	  		                    continue;
	  		                }
	  		                
	  		                $inserdata[$i]['drivers_name']  = $value['A'];
	  		                $inserdata[$i]['drivers_address']  = $value['B'];
	  		                $inserdata[$i]['drivers_mobile']  = $value['C'];
	  		                $inserdata[$i]['join_date']  = $value['D']; 
	  		                $inserdata[$i]['username']  = $value['E'];
	  		                $inserdata[$i]['password']  = $value['F']; 
	  		                
	  		                $i++;
	  		            }
	  		            
	  		            $result = $this->m_drivers->importdata($inserdata);
	  		            $this->data['duplicate_record'] =$result;
	  		            
	  		        } catch (Exception $e) {
	  		            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	  		                . '": ' .$e->getMessage());
	  		        }
	  		    }else{
	  		        $this->data['error_msg'] = $error['error'];
	  		    }
	  		    
	  		}
	  		
	  		// for upload
	  		
	  		
	        if($this->input->post('save_driver')){
	            $drivers_name = $this->input->post('drivers_name') ;
	            $drivers_address = $this->input->post('drivers_address') ;
	            $drivers_mobile = $this->input->post('drivers_mobile') ;
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
	            $join_date = $this->input->post('join_date') ;
	            $data = $this->m_drivers->drivers_add($drivers_name,$drivers_address,$drivers_mobile,$username,$password,$join_date);
	            
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Username and password should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_driver')){
	            $id = $this->input->post('id') ;
	            $user_id = $this->input->post('users_id') ;
	            $drivers_name = $this->input->post('drivers_name') ;
	            $drivers_address = $this->input->post('drivers_address') ;
	            $drivers_mobile = $this->input->post('drivers_mobile') ;
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
	            $join_date = $this->input->post('join_date') ;
	            $data = $this->m_drivers->drivers_edit($id,$user_id,$drivers_name,$drivers_address,$drivers_mobile,$username,$password,$join_date);
 
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	        }

	        if($this->input->post('del_driver')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_drivers->drivers_delete($id);
	            
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	        

	        $this->data['bus_show'] =$this->m_bus->bus_show_id(); 
	        $this->data['drivers_show'] =$this->m_drivers->drivers_show();
	        
	        
	        $this->load->view('drivers',$this->data);
	    }    
    }



    public function class_fetch()
    {
    	$school_sel = $this->input->get('school_sel') ;
	  	$this->load->model('m_class');
    	$sections_data = $this->m_class->class_show_id($school_sel);  
    	echo json_encode($sections_data);
    }	
 
    public function sections_fetch()
    {
    	$class_sel = $this->input->get('class_sel') ;
	  	$this->load->model('m_sections');
    	$sections_data = $this->m_sections->sections_fetch($class_sel);  
    	echo json_encode($sections_data);
    }
    
    public function students_roll_fetch()
    {
        $section_sel = $this->input->get('section_sel') ;
        $this->load->model('m_students');
        $students_data = $this->m_students->students_roll_fetch($section_sel);
        echo json_encode($students_data);
    }	
 
    public function transportation_fetch()
    {
    	$bus_sel = $this->input->get('bus_sel') ;
	  	$this->load->model('m_sel_route');
	  	$transportation_data = $this->m_sel_route->transportation_fetch($bus_sel);  
    	echo json_encode($transportation_data);
    }	
  
    public function students_fetch()
    {
        $roll_no = $this->input->get('roll_no') ;
        $this->load->model('m_students');
        $students_data = $this->m_students->students_fetch($roll_no);
        echo json_encode($students_data);
    }
    
    public function students_sel_fetch()
    {
         $roll_no = $this->input->post('roll_no') ;
           $class = $this->input->post('class1') ;
          $sections = $this->input->post('sections') ;
        $this->load->model('m_students');
        $students_data = $this->m_students->students_sel_fetch($roll_no,$class,$sections);
        echo  json_encode($students_data);
    }	
    
    public function parents_fetch()
    {
        $mail_id = $this->input->get('mail_id') ;
        $this->load->model('m_students');
        $parents_data = $this->m_students->parents_fetch($mail_id);
        echo json_encode($parents_data);
    }
     
    public function subject_fetch()
    {
        $sel_section = $this->input->get('sel_section') ;
        $this->load->model('m_sections');
        $subject_data = $this->m_sections->subject_fetch($sel_section);
        echo json_encode($subject_data);
    }
    
    public function subject_stud_fetch()
    {
        $student_id = $this->input->get('student_id') ;
        $this->load->model('m_sections');
        $subject_data = $this->m_sections->subject_stud_fetch($student_id);
        echo json_encode($subject_data);
    }
    
    
    
	public function students()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{  
	  		$this->load->model('m_students');
	  		$this->load->model('m_class');
	  		$this->load->model('m_bus'); 
	  		$this->load->model('m_sel_route');
	  		$this->load->model('m_route');
	  		$this->load->model('m_sections');
	  		$this->load->model('m_teachers');
	  		$this->load->model('m_school');
 
	  		
	  		// for upload
	  		if($this->input->post('upload_xls')){
	  		    $path = './xls_sections/';
	  		    require_once APPPATH . "/third_party/PHPExcel/Classes/PHPExcel.php";
	  		    $config['upload_path'] = $path;
	  		    $config['allowed_types'] = 'xlsx|xls';
	  		    $config['remove_spaces'] = TRUE;
	  		    $this->load->library('upload', $config);
	  		    $this->upload->initialize($config);
	  		    if (!$this->upload->do_upload('xls_file')) {
	  		        $error = array('error' => $this->upload->display_errors());
	  		    } else {
	  		        $data = array('upload_data' => $this->upload->data());
	  		    }
	  		    if(empty($error)){
	  		        if (!empty($data['upload_data']['file_name'])) {
	  		            $import_xls_file = $data['upload_data']['file_name'];
	  		        } else {
	  		            $import_xls_file = 0;
	  		        }
	  		        $inputFileName = $path . $import_xls_file;
	  		        
	  		        try {
	  		            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	  		            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	  		            $objPHPExcel = $objReader->load($inputFileName);
	  		            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	  		            $flag = true;
	  		            $i=0;
	  		            foreach ($allDataInSheet as $value) {
	  		                if($flag){
	  		                    $flag =false;
	  		                    continue;
	  		                }
	  		                 
	  		                $inserdata[$i]['class_id']  = $value['A'];
	  		                $inserdata[$i]['sections_id']  = $value['B'];
	  		                $inserdata[$i]['student_name']  = $value['C'];
	  		                $inserdata[$i]['dob']  = $value['D'];
	  		                $inserdata[$i]['adhar']  =  $value['E'];
	  		                $inserdata[$i]['profile']  = $value['F'];
	  		                $inserdata[$i]['parent_name']  = $value['G'];
	  		                $inserdata[$i]['parent_mob']  = $value['H'];
	  		                $inserdata[$i]['mother_name']  = $value['I']; 
	  		                $inserdata[$i]['mother_mob']  = $value['J'];
	  		                $inserdata[$i]['mother_mail']  =  $value['K'];
	  		                $inserdata[$i]['parent_scan_id']  = $value['L'];
	  		                $inserdata[$i]['roll_number']  = $value['M'];
	  		                $inserdata[$i]['batch']  = $value['N'];
	  		                $inserdata[$i]['username']  = $value['O'];
	  		                $inserdata[$i]['password']  = $value['P'];
	  		                $inserdata[$i]['join_date']  = $value['Q']; 
	  		                  
	  		                $i++;
	  		            }
	  		            
	  		            $result = $this->m_students->importdata($inserdata);
	  		            $this->data['duplicate_record'] =$result;
	  		            
	  		        } catch (Exception $e) {
	  		            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	  		                . '": ' .$e->getMessage());
	  		        }
	  		    }else{
	  		        $this->data['error_msg'] = $error['error'];
	  		    }
	  		    
	  		}
	  		
	  		// for upload  
	  		
	        if($this->input->post('save_students')){
	            $profile = '';
	            $config['upload_path']  = './profile/';
	            $config['allowed_types']        = 'jpg|png|jpeg';
	            $this->load->library('upload', $config);
	            
	            if ( ! $this->upload->do_upload('profile'))
	            {
	                $error = array('error' => $this->upload->display_errors());
	                $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
	                $profile = '';
	            }else{
	                $data = array('upload_data' => $this->upload->data());
	                $profile = $data['upload_data']['file_name'];
	            }
	             
	            $class = $this->input->post('class') ;
	            $section = $this->input->post('section') ;
	            $student_name = $this->input->post('student_name') ;
	            $dob = $this->input->post('dob') ;
	            $adhar = $this->input->post('adhar') ; 
	            $parent_name = $this->input->post('parent_name') ;
	            
	            $parent_mob = $this->input->post('parent_mob') ;
	            $mother_name = $this->input->post('mother_name') ;
	            $mother_mail = $this->input->post('mother_mail') ;
	            $mother_mob = $this->input->post('mother_mob') ;
	             
	            
	            $parent_id = $this->input->post('parent_id') ;
	            $roll_number = $this->input->post('roll_number') ;
	            $batch = $this->input->post('batch') ;
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
// 	            $teacher = $this->input->post('teacher') ;
	            $bus = $this->input->post('bus') ;
	            $pickup_point = $this->input->post('pickup_point') ;
	            $join_date = $this->input->post('join_date') ; 
	            $school = $this->session->userdata['school'] ;   

	            $data = $this->m_students->students_add($class,$section,$student_name,$dob,$adhar,$profile,$parent_name,$parent_mob,	$mother_name, $mother_mail, $mother_mob,$parent_id,$roll_number,$batch,$username,$password,$bus,$pickup_point,$join_date,$school );
	            
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	            
	        }

	        if($this->input->post('edit_students')){
	            $profile = '';
	            $id = $this->input->post('id') ;
	            if (isset($_FILES['profile']) && is_uploaded_file($_FILES['profile']['tmp_name'])) {
	                
	                $config['upload_path']  = './profile/';
	                $config['allowed_types']        = 'jpg|png|jpeg';
	                $this->load->library('upload', $config);
	                
	                if ( ! $this->upload->do_upload('profile'))
	                {
	                    $error = array('error' => $this->upload->display_errors());
	                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!';
	                    $profile = ''; 
	                    
	                }else{
	                    $data = array('upload_data' => $this->upload->data());
	                    $profile = $data['upload_data']['file_name'];
	                }
	            }else{
	                $students_show_id   =$this->m_students->students_fetch($id);
	                $profile = $students_show_id[0]->profile;
	            } 
	            $users_id = $this->input->post('users_id') ;
	            $class = $this->input->post('class') ;
	            $section = $this->input->post('sections') ;
	            $student_name = $this->input->post('student_name') ;
	            $dob = $this->input->post('dob') ;
	            $adhar = $this->input->post('adhar') ; 
	            $parent_name = $this->input->post('parent_name') ;
	            
	            $parent_mob = $this->input->post('parent_mob') ;
	            $mother_name = $this->input->post('mother_name') ;
	            $mother_mail = $this->input->post('mother_mail') ;
	            $mother_mob = $this->input->post('mother_mob') ;
	            
	            $parent_id = $this->input->post('parent_id') ;
	            $roll_number = $this->input->post('roll_number') ;
	            $batch = $this->input->post('batch') ;
	            $username = $this->input->post('username') ;
	            $password = $this->input->post('password') ;
// 	            $teacher = $this->input->post('teacher') ;
	            $bus = $this->input->post('bus') ;
	            $pickup_point = $this->input->post('pickup_point') ;
	            $join_date = $this->input->post('join_date') ; 
	            $school = $this->session->userdata['school'] ;   

	            $data = $this->m_students->students_edit($id,$users_id,$class,$section,$student_name,$dob,$adhar,$profile,$parent_name,$parent_mob,	$mother_name, $mother_mail, $mother_mob,$parent_id,$roll_number,$batch,$username,$password,$bus,$pickup_point,$join_date,$school );
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	        }

	        if($this->input->post('del_students')){
	            $id = $this->input->post('id') ;
	            
// 	            $this->load->model('m_fees');
// 	            $this->load->model('m_marks');
	            
// 	            $fees_show_app = $this->m_fees->fees_show_id($id); 
	            //print_r($fees_show_app);exit();
// 	            if($fees_show_app[0]->id){
// 	                foreach($fees_show_app as $fees){
// 	                   $this->m_fees->fees_delete($fees->id);
// 	                }
// 	            }
	            
// 	            $marks_show_app = $this->m_marks->marks_show_id($id);
// 	            print_r($marks_show_app);exit();
// 	            if($marks_show_app[0]->id){
// 	                foreach($marks_show_app as $marks){
// 	                    $this->m_marks->marks_delete($marks->id);
// 	                }
// 	            }
	            
	            
	            $data = $this->m_students->students_delete($id);

	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	        
	        $this->data['students_show'] =$this->m_students->students_show();
	        $this->data['class_show'] =$this->m_class->class_show_id();
	        $this->data['bus_show'] =$this->m_bus->bus_show_id();
	        $this->data['route_show'] =$this->m_route->route_show(); 
	        $this->data['sections_show'] =$this->m_sections->sections_show_id();
	        $this->data['teachers_show'] =$this->m_teachers->teachers_show_id(); 
	        $this->load->view('students',$this->data);
	    }    
    }

	public function exam_type()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{   

	  		$this->load->model('m_exam_type');
	        if($this->input->post('save_exam_type')){
	            $type = $this->input->post('type') ;
	            $school = $this->session->userdata['school'] ;   
	            $data = $this->m_exam_type->exam_type_add($type,$school );
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be Unique!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	        }

	        if($this->input->post('edit_exam_type')){
	            $id = $this->input->post('id') ;
	            $type = $this->input->post('type') ;
	            $school = $this->session->userdata['school'] ;  
	            $data = $this->m_exam_type->exam_type_edit($id,$type,$school );
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	        }

	        if($this->input->post('del_exam_type')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_exam_type->exam_type_delete($id);
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	         
	        $this->data['exam_type_show'] =$this->m_exam_type->exam_type_show();
	        $this->load->view('exam_type',$this->data);
	    }    
    }
    
    public function fees_add()
    {
        $this->load->model('m_fees'); 
        $roll_no = $this->input->post('roll_no') ;
        $class = $this->input->post('class') ;
        $section = $this->input->post('section') ;
        $student_name = $this->input->post('student_name') ;
        $annual_fees = $this->input->post('annual_fees') ;
        $fees_paid = $this->input->post('fees_paid') ;
        $date = $this->input->post('date') ;
        $type_payment = $this->input->post('type_payment') ;
        $school = $this->session->userdata['school'] ;
        $data = $this->m_fees->fees_add($roll_no,$class,$section,$student_name,$annual_fees,$fees_paid,$date,$type_payment,$school);
        
        echo $data;
    }
    
	public function fees()
    {	
    	if(!isset($this->session->userdata['username']) ){
			$this->load->view('login'); 
		} else{   
	  		$this->load->model('m_fees');

	  		$this->load->model('m_students');
	  		$this->load->model('m_class'); 
	  		$this->load->model('m_sections'); 
	  		
	  		$this->data['class'] = 0;
	  		$this->data['section'] = 0;
	  		
	        if($this->input->post('save_fees')){ 
	            
	            $roll_no = $this->input->post('roll_no') ;
	            $class = $this->input->post('class') ;
	            $section = $this->input->post('section') ;
	            $student_name = $this->input->post('student_name') ;
	            $annual_fees = $this->input->post('annual_fees') ;
	            $fees_paid = $this->input->post('fees_paid') ;
	            $date = $this->input->post('date') ;
	            $type_payment = $this->input->post('type_payment') ;
	            $school = $this->session->userdata['school'] ;   
	            $data =  $this->m_fees->fees_add($roll_no,$class,$section,$student_name,$annual_fees,$fees_paid,$date,$type_payment,$school);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Data should be entered properly!';
	            }else{
	                $this->data['success_msg'] ='Record inserted successfully!';
	            }
	            
	        }

	        if($this->input->post('edit_fees')){
	            $id = $this->input->post('id') ;
	            $roll_no = $this->input->post('roll_no') ;
	            $class = $this->input->post('class') ;
	            $section = $this->input->post('section') ;
	            $student_name = $this->input->post('student_name') ;
	            $annual_fees = $this->input->post('annual_fees') ;
	            $fees_paid = $this->input->post('fees_paid') ;
	            $date = $this->input->post('date') ;
	            $type_payment = $this->input->post('type_payment') ;
	            $school = $this->session->userdata['school'] ;  
	            
	            $data = $this->m_fees->fees_edit($id,$roll_no,$class,$section,$student_name,$annual_fees,$fees_paid,$date,$type_payment,$school);
	             
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in updation!';
	            }else{
	                $this->data['success_msg'] ='Record updated successfully!';
	            }
	            
	        }

	        if($this->input->post('del_fees')){
	            $id = $this->input->post('id') ;
	            $data = $this->m_fees->fees_delete($id);
	            
	            if($data != 'true'){
	                $this->data['error_msg'] ='Error in deletion!';
	            }else{
	                $this->data['success_msg'] ='Record deleted successfully!';
	            }
	        }
	         
	        if($this->input->post('Search')){ 
	            $class = $this->input->post('class') ;
	            $section = $this->input->post('section') ; 
	            $this->data['fees_show'] =$this->m_fees->fees_class_sel($class,$section);
	            $this->data['class'] = $class;
	            $this->data['section'] = $section;
	        }else{ 
	            $this->data['fees_show'] =$this->m_fees->fees_show();
	        }
	        
	        $this->data['students_show'] =$this->m_students->students_show();
	        $this->data['class_show'] =$this->m_class->class_show_id(); 
	        $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
	        $this->data['sections_show'] =$this->m_sections->sections_show_id(); 
	         
	        $this->load->view('fees',$this->data);
	    }    
    }
    
    
    public function exams_add(){
    
        $this->load->model('m_exams');
        $class = $this->input->post('class') ;
        $section = $this->input->post('section') ;
        $student_id = $this->input->post('student') ;
        $date = $this->input->post('date') ;
        $time = $this->input->post('time') ;
        $subject = $this->input->post('subject') ;
        $exam_type_id = $this->input->post('exam_type') ;
        $school = $this->session->userdata['school'] ;
        $data = $this->m_exams->exams_add($class,$section,$date,$time,$subject,$exam_type_id,$school);
        echo $data;
    }

    public function exams()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_exams');
            $this->load->model('m_exam_type'); 
            $this->load->model('m_students');
            $this->load->model('m_class');
            $this->load->model('m_sections');
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_exams')){
                 
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $student_id = $this->input->post('student') ;
                $date = $this->input->post('date') ;
                $time = $this->input->post('time') ;
                $subject = $this->input->post('subject') ;
                $exam_type_id = $this->input->post('exam_type') ;
                $school = $this->session->userdata['school'] ;
                $data = $this->m_exams->exams_add($class,$section,$date,$time,$subject,$exam_type_id,$school);
                
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be entered properly!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
                
            }
            
            if($this->input->post('edit_exams')){
                $id = $this->input->post('id') ;
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $student_id = $this->input->post('student') ;
                $date = $this->input->post('date') ;
                $time = $this->input->post('time') ;
                $subject = $this->input->post('subject') ;
                $exam_type_id = $this->input->post('exam_type') ;
                $school = $this->session->userdata['school'] ;
                
                $data = $this->m_exams->exams_edit($id,$class,$section,$date,$time,$subject,$exam_type_id,$school);
                
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
            }
            
            if($this->input->post('del_exams')){
                $id = $this->input->post('id') ;
                $data = $this->m_exams->exams_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
                
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['exams_show'] =$this->m_exams->exams_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['exams_show'] =$this->m_exams->exams_show();
            }
            
            $this->data['exam_type_show'] =$this->m_exam_type->exam_type_show();
            $this->data['students_show'] =$this->m_students->students_show();
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
            $this->data['sections_show'] =$this->m_sections->sections_show_id();
            
            $this->load->view('exams',$this->data);
        }
    }
     
    public function marks()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{ 
            $this->load->model('m_teachers');
            $this->load->model('m_students');
            $this->load->model('m_marks');
            $this->load->model('m_exam_type'); 
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_marks')){
                
                $teacher_id = $this->input->post('teacher_id') ; 
                $student_id = $this->input->post('students_id') ;
                $date = $this->input->post('date') ;
                $exam_type = $this->input->post('exam_type') ;
                $marks = $this->input->post('marks') ;
                $out_of = $this->input->post('out_of') ;
                $subject = $this->input->post('subject') ;
                $competence = $this->input->post('competence') ;
                $percentage = $this->input->post('percentage') ;
                $school_id = $this->session->userdata['school'] ;
                $data = $this->m_marks->marks_add($teacher_id,$student_id,$date,$exam_type,$marks,$out_of,$subject,$competence,$percentage,$school_id);
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
                
            }
            
            if($this->input->post('edit_marks')){
                $id = $this->input->post('id') ;
                $teacher_id = $this->input->post('teacher_id') ;
                $student_id = $this->input->post('students_id') ;
                $date = $this->input->post('date') ;
                $exam_type = $this->input->post('exam_type') ;
                $marks = $this->input->post('marks') ;
                $out_of = $this->input->post('out_of') ;
                $subject = $this->input->post('subject') ;
                $competence = $this->input->post('competence') ;
                $percentage = $this->input->post('percentage') ;
                $school_id = $this->session->userdata['school'] ;
                
                $data = $this->m_marks->marks_edit($id,$teacher_id,$student_id,$date,$exam_type,$marks,$out_of,$subject,$competence,$percentage,$school_id);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
                
            }
            
            if($this->input->post('del_marks')){
                $id = $this->input->post('id') ;
                $data = $this->m_marks->marks_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['marks_show'] =$this->m_marks->marks_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['marks_show'] =$this->m_marks->marks_show();
            }
            
            $this->data['exam_type_show'] =$this->m_exam_type->exam_type_show();
            $this->data['students_show'] =$this->m_students->students_show();
            $this->data['teachers_show'] =$this->m_teachers->teachers_show_id(); 
            
            $this->load->view('marks',$this->data);
        }
    }
    
    public function practices_add()
    {
        $this->load->model('m_practices');
        $config['upload_path']  = './practices/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
            $image ='';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
        } 
        $class_id = $this->input->post('class') ;
        $section_id = $this->input->post('section') ;
        $date = $this->input->post('date') ;
        $subject = $this->input->post('subject') ;
        $school_id = $this->session->userdata['school'] ;
        $data = $this->m_practices->practices_add($class_id,$section_id,$date,$subject,$image,$school_id);
        echo $data;
    }
    public function practices()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_class');
            $this->load->model('m_sections');
            $this->load->model('m_students');
            $this->load->model('m_practices');
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_practices')){  
                
                $config['upload_path']  = './practices/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
                    $image ='';
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $image = $data['upload_data']['file_name'];
                } 
                
                $class_id = $this->input->post('class') ;
                $section_id = $this->input->post('section') ; 
                $date = $this->input->post('date') ;  
                $subject = $this->input->post('subject') ; 
                $school_id = $this->session->userdata['school'] ;
                
                $data = $this->m_practices->practices_add($class_id,$section_id,$date,$subject,$image,$school_id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
            }
            
            if($this->input->post('edit_practices')){
                $id = $this->input->post('id') ;
                
                if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                    
                    $config['upload_path']  = './practices/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('image'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
                        
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $image = $data['upload_data']['file_name'];
                    }
                }else{
                    $practices_show_id   =$this->m_practices->practices_show_id($id);
                    $image = $practices_show_id[0]->image;
                } 
                
                 
                
                $class_id = $this->input->post('class') ;
                $section_id = $this->input->post('section') ; 
                $date = $this->input->post('date') ; 
                $subject = $this->input->post('subject') ;
                $school_id = $this->session->userdata['school'] ;
                
                $data = $this->m_practices->practices_edit($id,$class_id,$section_id,$date,$subject,$image,$school_id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
            }
            
            if($this->input->post('del_practices')){
                $id = $this->input->post('id') ;
                $data = $this->m_practices->practices_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['practices_show'] =$this->m_practices->practices_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['practices_show'] =$this->m_practices->practices_show();
            }
            
            $this->data['students_show'] =$this->m_students->students_show();
            $this->data['sections_show'] =$this->m_sections->sections_show_id();
            $this->data['class_show'] =$this->m_class->class_show_id();
            
            $this->load->view('practices',$this->data);
        }
    }
     
    public function notifications()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_class');
            $this->load->model('m_sections');
            $this->load->model('m_notifications');
            $this->load->model('m_students');
            $this->load->model('m_teachers');
            $this->load->model('m_drivers');
            $this->load->model('m_login');
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_notifications')){
                
                $role_id = $this->input->post('role') ;
                $class_id = $this->input->post('class') ;
                $sections_id = $this->input->post('section') ;
                $students_id = $this->input->post('student') ;
                $title = $this->input->post('title') ;
                $message = $this->input->post('message') ;
                $datetime = $this->input->post('datetime') ; 
                $school_id = $this->session->userdata['school'] ;
                $data = $this->m_notifications->notifications_add($role_id,$class_id,$sections_id,$students_id,$title,$message,$datetime,$school_id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
		    $condition = array("school_id" => $school_id);
		    log_message("debug", "ROLE ::::: ".$role_id);
		    if($role_id == "teacher"){
			$fcm = $this->m_teachers->get_teachers_fcm($school_id);
		    }elseif($role_id == "driver"){
			$fcm = $this->m_drivers->get_driver_fcm($school_id);
		    }elseif($role_id == "section"){
			$fcm = $this->m_students->get_student_fcm($school_id, $sections_id, $class_id);
		    }else{
		    	$fcm = $this->m_login->getFCMtokens($condition);
		    }
		    log_message("debug",print_r($fcm, true));
		    $this->send_notification($title, $message, $fcm);
                }
            }
            
            if($this->input->post('edit_notifications')){
                $id = $this->input->post('id') ;
                $role_id = $this->input->post('role') ;
                $class_id = $this->input->post('class') ;
                $sections_id = $this->input->post('section') ;
                $students_id = $this->input->post('student') ;
                $title = $this->input->post('title') ;
                $message = $this->input->post('message') ;
                $datetime = $this->input->post('datetime') ;
                $school_id = $this->session->userdata['school'] ;
                $data =  $this->m_notifications->notifications_edit($id,$role_id,$class_id,$sections_id,$students_id,$title,$message,$datetime,$school_id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
                
            }
            
            if($this->input->post('del_notifications')){
                $id = $this->input->post('id') ;
                $data = $this->m_notifications->notifications_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['notifications_show'] =$this->m_notifications->notifications_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['notifications_show'] =$this->m_notifications->notifications_show();
            }
            
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_show'] =$this->m_sections->sections_show_id();
            $this->data['students_show'] =$this->m_students->students_show();
            
            $this->load->view('notifications',$this->data);
        }
    }

    private function send_notification($title,$message,$tokenList){
	    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
	    $key = "AIzaSyDgKeLm4f-xa4EDQHsuUmlRhyMXb3ZyRHA";
	    //$token = "fin8QkEiroI:APA91bHSuddPlk7rYrCLNtCT0fjJa1SzO7f1H0cnZQVuuFJI1NNJ4bsXPdWA-i71TbBRrOWdgO4IpvKPChcXSdLTDKtg2khNQt63xTsqtbY03endhfhOY_IE5eBlhOjBy439WJYaPblS";
	    $tokens = array_values($tokenList);
	    log_message("debug",print_r($tokenList, true));

	    $notification = [
        	    'title' =>$title,
        	    'body' => $message,
        	    'icon' =>'myIcon'
        	];

	    $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        	$fcmNotification = [
        	    'registration_ids' => $tokens, //multple token array
        	    //'to'        => $token, //single token
        	    'notification' => $notification,
        	    'data' => $extraNotificationData
        	];

        	$headers = [
        	    'Authorization: key=' . $key,
        	    'Content-Type: application/json'
        	];


        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        	$result = curl_exec($ch);
        	curl_close($ch);


		log_message("debug","HELLO");
        	log_message("debug",$result);
	
    }
    
    public function attendances()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_attendances');
            
            $this->load->model('m_students');
            $this->load->model('m_class');
            $this->load->model('m_sections');
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_attendances')){
                
                $roll_no = $this->input->post('roll_no') ;
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $student_name = $this->input->post('student_name') ;
                $annual_attendances = $this->input->post('annual_attendances') ;
                $attendances_paid = $this->input->post('attendances_paid') ;
                $date = $this->input->post('date') ;
                $type_payment = $this->input->post('type_payment') ;
                $school = $this->session->userdata['school'] ;
                $this->m_attendances->attendances_add($roll_no,$class,$section,$student_name,$annual_attendances,$attendances_paid,$date,$type_payment,$school);
            }
            
            if($this->input->post('edit_attendances')){
                $id = $this->input->post('id') ;
                $roll_no = $this->input->post('roll_no') ;
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $student_name = $this->input->post('student_name') ;
                $annual_attendances = $this->input->post('annual_attendances') ;
                $attendances_paid = $this->input->post('attendances_paid') ;
                $date = $this->input->post('date') ;
                $type_payment = $this->input->post('type_payment') ;
                $school = $this->session->userdata['school'] ;
                
                $this->m_attendances->attendances_edit($id,$roll_no,$class,$section,$student_name,$annual_attendances,$attendances_paid,$date,$type_payment,$school);
            }
            
            if($this->input->post('del_attendances')){
                $id = $this->input->post('id') ;
                $this->m_attendances->attendances_delete($id);
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['attendances_show'] =$this->m_attendances->attendances_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['attendances_show'] =$this->m_attendances->attendances_show();
            }
            
            $this->data['students_show'] =$this->m_students->students_show();
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
            $this->data['sections_show'] =$this->m_sections->sections_show_id();
            
            $this->load->view('attendances',$this->data);
        }
    }
    
    public function class_attendance()
    {
        $class = $this->input->get('class') ;
        $this->load->model('m_attendances');
        $this->load->model('m_students');
        
        $this->data['students_show'] = $this->m_students->students_show(); 
        $this->data['attendances_class_show'] = $this->m_attendances->attendances_class_show($class); 
        
        $this->load->view('class_attendance',$this->data);
    }
    
    public function student_attendance()
    {
        $class = $this->input->get('class') ;
        $this->load->model('m_attendances');
        $this->load->model('m_students');
        
        $this->data['students_show'] = $this->m_students->students_show();
        $this->data['attendances_class_show'] = $this->m_attendances->attendances_class_show($class);
        
        $this->load->view('student_attendance',$this->data);
    }
    
     
    public function timetables_add()
    {
        $this->load->model('m_timetables');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        $this->load->model('m_teachers');
         
        $this->data['class_show'] =$this->m_class->class_show_id();
        $this->data['teachers_show'] =$this->m_teachers->teachers_show_id();
        $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
        $this->data['sections_show'] =$this->m_sections->sections_show_id();
        $this->load->view('timetables_add',$this->data);
    }   
    
    
    public function timetables_edit()
    {
        $this->load->model('m_timetables');
        $this->load->model('m_class');
        $this->load->model('m_sections');
        $this->load->model('m_teachers');
        
        $class = $this->input->get('class') ;
        $section = $this->input->get('section') ;
        $this->data['timetables_show'] =$this->m_timetables->timetables_show_sel($class,$section);
        $this->data['class_show'] =$this->m_class->class_show_id();
        $this->data['teachers_show'] =$this->m_teachers->teachers_show_id();
        $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
        $this->data['sections_show'] =$this->m_sections->sections_show_id();
        $this->load->view('timetables_edit',$this->data);
    }  
    
    public function timetables()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_timetables');
            
            $this->load->model('m_students');
            $this->load->model('m_class');
            $this->load->model('m_sections');
            $this->load->model('m_teachers');
            
            $this->data['class'] = '';
            $this->data['section1'] = '';
            $this->data['msg'] = '';
            
            if($this->input->post('save_timetables')){
              $class = $this->input->post('class') ;
              $section = $this->input->post('section') ;
              $subject = $this->input->post('subject') ;
              $details = json_encode($this->input->post());
              $school = $this->session->userdata['school'] ;
              $data = $this->m_timetables->timetables_add($class,$section,$subject,$details,$school);
              if($data != 'true'){
                  $this->data['error_msg'] ='Data should be Unique!';
              }else{
                  $this->data['success_msg'] ='Record inserted successfully!';
              }
            }
            
            if($this->input->post('Search')){
              $class = $this->input->post('class') ;
              $section = $this->input->post('section') ; 
              $this->data['timetables_show'] =$this->m_timetables->timetables_show_sel($class,$section);
              $this->data['class'] = $class;
              $this->data['section1'] = $section;
              $this->data['msg'] = 'No Records Found!';
            } 
            
            if($this->input->post('edit_timetables')){
                $id = $this->input->post('id') ;
                
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $subject = $this->input->post('subject') ;
                $details = json_encode($this->input->post()); 
                $school = $this->session->userdata['school'] ;
                
                $data = $this->m_timetables->timetables_edit($id,$class,$section,$subject,$details,$school);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
                 
            }
            
            if($this->input->post('del_timetables')){
                $id = $this->input->post('id') ;
                $data = $this->m_timetables->timetables_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            } 
            
//             $this->data['timetables_show'] =$this->m_timetables->timetables_show();
            
            $this->data['teachers_show'] =$this->m_teachers->teachers_show_id(); 
            $this->data['students_show'] =$this->m_students->students_show();
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
            $this->data['sections_show'] =$this->m_sections->sections_show_classid();
            
            $this->load->view('timetables',$this->data);
        }
    }
    public function homework_add(){
        
        $this->load->model('m_homework');
        $config['upload_path']  = './homework/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
            $image ='';
            
        }else{
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
        }
        
        
        $class = $this->input->post('class') ;
        $section = $this->input->post('section') ;
        $date = $this->input->post('date') ;
        $subject = $this->input->post('subject') ;
        $details = $this->input->post('details') ;
        $image = $image ;
        $teacher_id = $this->input->post('teacher') ;
        $submission_date = $this->input->post('submission_date') ;
        $school = $this->session->userdata['school'] ;
        $data = $this->m_homework->homework_add($class,$section,$date,$subject,$details,$image,$teacher_id,$submission_date,$school);
        echo $data;
    }
    public function homework()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_homework');
             
            $this->load->model('m_class');
            $this->load->model('m_sections');
            $this->load->model('m_teachers');
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            $this->data['teacher_id'] = $this->m_teachers->teachers_show_id_user($this->session->userdata['id']);
            
            
            if($this->input->post('save_homework')){
                
                $config['upload_path']  = './homework/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error_msg'] ='Please select logo in jpg,png,jpeg format!'; 
                    $image ='';
                    
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $image = $data['upload_data']['file_name'];
                }
                
                
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $date = $this->input->post('date') ;
                $subject = $this->input->post('subject') ;
                $details = $this->input->post('details') ;
                $image = $image ;
                $teacher_id = $this->input->post('teacher') ;
                $submission_date = $this->input->post('submission_date') ;
                $school = $this->session->userdata['school'] ;
                $data = $this->m_homework->homework_add($class,$section,$date,$subject,$details,$image,$teacher_id,$submission_date,$school);
                
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
            }
            
            if($this->input->post('edit_homework')){
                $id = $this->input->post('id') ;
                
                if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                    
                    $config['upload_path']  = './homework/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('image'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $image = $data['upload_data']['file_name'];
                    }
                }else{
                    $homework_show_id   =$this->m_homework->homework_show_id($id);
                    $image = $homework_show_id[0]->image;
                }
                
                
                
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $date = $this->input->post('date') ;
                $subject = $this->input->post('subject') ;
                $details = $this->input->post('details') ;
                $image = $image ;
                $teacher_id = $this->input->post('teacher') ;
                $submission_date = $this->input->post('submission_date') ;
                $school = $this->session->userdata['school'] ;
                
                $data = $this->m_homework->homework_edit($id,$class,$section,$date,$subject,$details,$image,$teacher_id,$submission_date,$school);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
            }
            
            if($this->input->post('del_homework')){
                $id = $this->input->post('id') ;
                $data = $this->m_homework->homework_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
            
            if($this->input->post('Search')){
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $this->data['homework_show'] =$this->m_homework->homework_class_sel($class,$section);
                $this->data['class'] = $class;
                $this->data['section'] = $section;
            }else{
                $this->data['homework_show'] =$this->m_homework->homework_show();
            }
             
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
            $this->data['sections_show'] =$this->m_sections->sections_show_id();
            $this->data['teachers_show'] =$this->m_teachers->teachers_show_id(); 
            
            $this->load->view('homework',$this->data);
        }
    }
    
    public function activity_add()
    {
        $this->load->model('m_activity'); 
        $activity = $this->input->post('activity') ;
        $details = $this->input->post('details') ;
        $date = $this->input->post('date') ;
        $submission_date = $this->input->post('submission_date') ;
        $class = $this->input->post('class') ;
        $section = $this->input->post('section') ;
        $school = $this->session->userdata['school'] ;
        $data = $this->m_activity->activity_add($activity,$details,$date,$submission_date,$class,$section,$school);
        echo $data;
    }
    public function activity()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_activity');
            
            $this->load->model('m_class');
            $this->load->model('m_sections'); 
            
            $this->data['class'] = 0;
            $this->data['section'] = 0;
            
            if($this->input->post('save_activity')){
                
                $activity = $this->input->post('activity') ;
                $details = $this->input->post('details') ;
                $date = $this->input->post('date') ;
                $submission_date = $this->input->post('submission_date') ;
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;  
                $school = $this->session->userdata['school'] ;
                $data = $this->m_activity->activity_add($activity,$details,$date,$submission_date,$class,$section,$school);
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
                
            }
            
            if($this->input->post('edit_activity')){
                $id = $this->input->post('id') ;
                $activity = $this->input->post('activity') ;
                $details = $this->input->post('details') ;
                $date = $this->input->post('date') ;
                $submission_date = $this->input->post('submission_date') ;
                $class = $this->input->post('class') ;
                $section = $this->input->post('section') ;
                $school = $this->session->userdata['school'] ;
                
                $data = $this->m_activity->activity_edit($id,$activity,$details,$date,$submission_date,$class,$section,$school);
                 
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
                
            }
            
            if($this->input->post('del_activity')){
                $id = $this->input->post('id') ;
                $data =  $this->m_activity->activity_delete($id);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
                
            }
            
            $this->data['activity_show'] =$this->m_activity->activity_show();
            
            $this->data['class_show'] =$this->m_class->class_show_id();
            $this->data['sections_distinct'] =$this->m_sections->sections_distinct();
            $this->data['sections_show'] =$this->m_sections->sections_show_id(); 
            
            $this->load->view('activity',$this->data);
        }
    }
    
    public function faq()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_faq'); 
            
            if($this->input->post('save_faq')){ 
                $questions = $this->input->post('questions') ;
                $answers = $this->input->post('answers') ;
                $date = $this->input->post('date') ;
                $school = $this->session->userdata['school'] ;
                $data = $this->m_faq->faq_add($questions,$answers,$date,$school);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Data should be Unique!';
                }else{
                    $this->data['success_msg'] ='Record inserted successfully!';
                }
            }
            
            if($this->input->post('edit_faq')){
                $id = $this->input->post('id') ;
                $questions = $this->input->post('questions') ;
                $answers = $this->input->post('answers') ;
                $date = $this->input->post('date') ;
                $school = $this->session->userdata['school'] ;
                
                $data = $this->m_faq->faq_edit($id,$questions,$answers,$date,$school);
                
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in updation!';
                }else{
                    $this->data['success_msg'] ='Record updated successfully!';
                }
            }
            
            if($this->input->post('del_faq')){
                $id = $this->input->post('id') ;
                $data = $this->m_faq->faq_delete($id);
                if($data != 'true'){
                    $this->data['error_msg'] ='Error in deletion!';
                }else{
                    $this->data['success_msg'] ='Record deleted successfully!';
                }
            }
              $this->data['faq_show'] =$this->m_faq->faq_show();
             
            $this->load->view('faq',$this->data);
        }
    }
    
    
    
    public function transportation()
    {
        if(!isset($this->session->userdata['username']) ){
            $this->load->view('login');
        } else{
            $this->load->model('m_transportation');
            $this->load->model('m_bus');
            
            if($this->input->post('save_transportation')){
                $bus_no = $this->input->post('bus_no') ;
                $pickup_point = $this->input->post('pickup_point') ; 
                $school = $this->session->userdata['school'] ;
                $this->m_transportation->transportation_add($bus_no,$pickup_point,$school);
            }
            
            if($this->input->post('edit_transportation')){
                $id = $this->input->post('id') ;
                $bus_no = $this->input->post('bus_no') ;
                $pickup_point = $this->input->post('pickup_point') ; 
                $school = $this->session->userdata['school'] ;
                
                $this->m_transportation->transportation_edit($id,$bus_no,$pickup_point,$school);
            }
            
            if($this->input->post('del_transportation')){
                $id = $this->input->post('id') ;
                $this->m_transportation->transportation_delete($id);
            }
             
            $this->data['transportation_show'] =$this->m_transportation->transportation_show();
             
            $this->data['bus_show'] =$this->m_bus->bus_show();
            $this->load->view('transportation',$this->data);
        }
    }
    
}
