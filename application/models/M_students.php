<?php
class m_students extends CI_Model { 
    function students_add($class,$section,$student_name,$dob,$adhar,$profile,$parent_name,$parent_mob,	$mother_name, $mother_mail, $mother_mob,$parent_id,$roll_number,$batch,$username,$password,$bus,$route,$pickup_point,$join_date,$school ){ 
		
	    $this->db->select("*");
	    $this->db->from('users');
	    $this->db->where(array( 'username' => $username));
	    $query = $this->db->get();
	    if($query->num_rows() == 0){
	        $target = array(
	            "username" => $username,
	            "password" => $password,
	            "school_id"=>  $school,
	            "role"=>  'student',
	            "created_date"=>date('Y-m-d'),
	            "created_by"=>$this->session->userdata['id'], 
	        );
	        $this->db->insert('users', $target);
	   }
	        $this->db->select("*");
	        $this->db->from('users');
	        $this->db->where(array( 'username' => $username));
	        $query = $this->db->get();
	        if($query->num_rows() > 0 ){
	             
	             $userData = $query->result();
	                         
//         	    $this->db->select("*"); 
//         		$this->db->from('students'); 
//         		$this->db->where(array( 'student_name' => $student_name));
//         		$query = $this->db->get(); 
        		
// //         		print_r($userData[0]->id); 
        		
        		
//         		if($query->num_rows() == 0){
        		    $targetS = array(
          		        "users_id" => $userData[0]->id ,
        				"class_id" => $class ,
        				"sections_id" => $section,
        		        "student_name" => $student_name,
        		        "dob" => $dob,
        		        "adhar" => $adhar,
        		        "profile" => $profile,
        		        "parent_name" => $parent_name,
        		        "parent_mob" => $parent_mob,
        		        "mother_name" => $mother_name,
        		        "mother_mob" => $mother_mob,
        		        "mother_mail" => $mother_mail,
        				"parent_scan_id"=>  $parent_id,
        				"roll_number" => $roll_number,
        				"batch"=>  $batch, 
        		        "username"=>  $username,
        		        "password"=>  $password,
//         				"teachers_id" => $teacher,
        		        "bus_id" => $bus,
        		        "route_id" => $route,
        				"transportation_id" => $pickup_point,
        				"join_date" => $join_date,
        		        "school_id"=>  $school,
        		        "created_date"=>date('Y-m-d'),
        		        "created_by"=>$this->session->userdata['id'], 
        
        		    );
//         		    print_r($targetS);exit();
        		    $query =   $this->db->insert('students', $targetS);
//         		    print_r($query);exit();
        		    if($query){ return true;  }else{ return false; }
        		}

// 	    }
    }
    function students_edit($id,$user_id,$class,$section,$student_name,$dob,$adhar,$profile,$parent_name,$parent_mob,$mother_name, $mother_mail, $mother_mob,$parent_id,$roll_number,$batch,$username,$password,$bus,$route,$pickup_point,$join_date,$school ){ 
        
//         $this->db->select("*");
//         $this->db->from('students');
//         $this->db->where(array( 'student_name' => $student_name));
//         $this->db->where('id!=', $id);
//         $query = $this->db->get();
//         if($query->num_rows() == 0){ 
            $target = array(  	
    				"class_id" => $class ,
    				"sections_id" => $section,
        	        "student_name" => $student_name,
        	        "dob" => $dob,
        	        "adhar" => $adhar,
        	        "profile" => $profile,
        	        "parent_name" => $parent_name,
    	            "parent_mob" => $parent_mob,
        	        "mother_name" => $mother_name,
        	        "mother_mob" => $mother_mob,
        	        "mother_mail" => $mother_mail,
    				"parent_scan_id"=>  $parent_id,
    				"roll_number" => $roll_number,
    				"batch"=>  $batch, 
        	        "username"=>  $username,
        	        "password"=>  $password,
    // 				"teachers_id" => $teacher,
                "bus_id" => $bus,
                "route_id" => $route,
    				"transportation_id" => $pickup_point,
    				"join_date" => $join_date,
        	       "school_id"=>  $school ,
        	       "updated_date"=>date('Y-m-d'),
        	       "updated_by"=>$this->session->userdata['id'],
    	   );
    	    
    	   $this->db->where(array( 'id' => $id));
    	   $query1 = $this->db->update('students', $target);
    	   $this->db->select("*");
    	   $this->db->from('users');
    	   $this->db->where(array( 'id' => $user_id));
    	   $query = $this->db->get();
    	   if($query->num_rows() == 1){
    	       $target = array(
    	           "username" => $username,
    	           "password" => $password,
    	           "updated_date"=>date('Y-m-d'),
    	           "updated_by"=>$this->session->userdata['id'],
    	       );
    	       $this->db->where(array( 'id' => $user_id));
    	       $this->db->update('users', $target);
    	   }
    	   if($query1){ return true;  }else{ return false; }
//         }
    }
    function students_show(){  

	    $this->db->select('st.*,u.password as password_user,s.school_name,c.class,sec.sections,t.teacher_name,trans.pickup_point,b.bus_number,r.route_name,rm.route_id,trans.id as trans_id');
		$this->db->from('students st'); 
	    $this->db->join('school s', 'st.school_id=s.id', 'left');  
	    $this->db->join('class c', 'st.class_id=c.id', 'left');  
	    $this->db->join('sections sec', 'st.sections_id=sec.id', 'left');  
	    $this->db->join('teachers t', 'st.teachers_id=t.id', 'left');  
	    $this->db->join('pickup_point trans', 'st.transportation_id=trans.id', 'left');
	    $this->db->join('bus b', 'st.bus_id=b.id', 'left');
	    $this->db->join('route_map rm', 'st.route_id=rm.route_id', 'left');
	    $this->db->join('route r', 'st.route_id=r.id', 'left');
	    $this->db->join('users u', 'st.users_id=u.id', 'left');  
	    $this->db->where(array( 'st.school_id' => $this->session->userdata['school']));
	    $this->db->where(array( 'st.active' => 1));

		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function students_delete($id){ 
        
        
// 		$this->db->where(array( 'id' =>$id));
// 		$query = $this->db->delete('students');

        $target = array(
            "active" => 0
        );
        
        $this->db->where(array( 'id' => $id));
        $query =  $this->db->update('students', $target);
		
		if($query)
	    {
	        return true;
	    } else{
	        return false;
	    }
    } 
    
    
    function students_fetch($id){
        $this->db->select("*");
        $this->db->from('students');
        $this->db->where(array( 'id' => $id ));
        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    function students_roll_fetch($section){
        $this->db->select("*");
        $this->db->from('students');  
        $this->db->where(array( 'sections_id' => $section ));
        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'active' => 1));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    function students_sel_fetch($id,$class,$section){
        
        $this->db->select('st.*,u.annual_fees');
        $this->db->from('students st');
        $this->db->join('school s', 'st.school_id=s.id', 'left');
        $this->db->join('fees u', 'st.id=u.students_id', 'left');
        $this->db->where(array( 'st.class_id' => $class ));
        $this->db->where(array( 'st.sections_id' => $section ));
        $this->db->where(array( 'st.id' =>$id));
        $this->db->where(array( 'st.school_id' => $this->session->userdata['school']));
        $this->db->order_by('u.id','desc');
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    function parents_fetch($id){
        $this->db->select("*");
        $this->db->from('students');
        $this->db->where(array( 'username' => $id )); 
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    public function importData($data) {
        $duplicate = '';
        foreach($data as $row){
            $this->db->select("*");
            $this->db->from('users');
            $this->db->where(array( 'username' => $row['username']));
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                    "username" => $row['username'],
                    "password" => $row['password'],
                    "school_id"=>  $this->session->userdata['school'],
                    "role"=>  'student',
                    "created_date"=>date('Y-m-d'),
                    "created_by"=>$this->session->userdata['id'],
                );
                $this->db->insert('users', $target);
                
                $this->db->select("*");
                $this->db->from('users');
                $this->db->where(array( 'username' => $row['username']));
                $query = $this->db->get();
                if($query->num_rows() == 1){
                    
                    $userData = $query->result(); 
                    
                    $this->db->select("*");
                    $this->db->from('students');
                    $this->db->where(array( 'student_name' =>  $row['student_name']));
                    $query = $this->db->get();
                    if($query->num_rows() == 0){
                         
                        $this->db->select("*");
                        $this->db->from('sections');
                        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
                        $this->db->where(array( 'class_id' =>  $row['class_id']));
                        $this->db->where(array( 'sections' => $row['sections_id']));
                        $query = $this->db->get();
                        $section = $query->result();
//                         print_r($section);exit();
                        $target = array(
                            "users_id" => $userData[0]->id,
                            "class_id" => $row['class_id'],
                            "sections_id" => $section[0]->id,
                            "student_name" => $row['student_name'],
                            "dob" => $row['dob'],
                            "adhar" => $row['adhar'],
                            "profile" => $row['profile'],
                            "parent_name" => $row['parent_name'],
                            "parent_mob" => $row['parent_mob'],
                            "mother_name" => $row['mother_name'],
                            "mother_mob" => $row['mother_mob'],
                            "mother_mail" => $row['mother_mail'],
                            "parent_scan_id"=>  $row['parent_scan_id'],
                            "roll_number" => $row['roll_number'],
                            "batch"=>  $row['batch'],
                            "username"=>  $row['username'],
                            "password"=>  $row['password'],
                            "join_date" => $row['join_date'],
                            "school_id"=> $this->session->userdata['school'],
                            "created_date"=>date('Y-m-d'),
                            "created_by"=>$this->session->userdata['id'], 
                        );
                        $res =  $this->db->insert('students', $target);
                        
                    }
                }
            }else{
                $duplicate[] = $row['username'];
                
            }
        }
        
        return $duplicate;
        
    }
    
    
    
     //App Functions
    
    function students_show_app($token){
        $this->db->select('st.*,s.school_name,sec.sections');
        $this->db->from('students st');
        $this->db->join('school s', 'st.school_id=s.id', 'left');
        $this->db->join('sections sec', 'st.sections_id=sec.id', 'left');
        $this->db->join('users u', 'st.users_id=u.id', 'left');
        $this->db->where(array( 'u.token' =>$token));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    function students_show_app_id($token,$id){
        $this->db->select('st.*,s.school_name');
        $this->db->from('students st');
        $this->db->join('school s', 'st.school_id=s.id', 'left');
        $this->db->join('users u', 'st.users_id=u.id', 'left');
        $this->db->where(array( 'u.token' =>$token));
        $this->db->where(array( 'st.id' =>$id));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 

    function get_student_fcm($school_id, $sections_id, $class_id){

            $this->db->select('u.fcm_token');
                $this->db->from('students b');
                $this->db->join('users u', 'b.users_id=u.id', 'left');
		$condition = array('b.school_id' => $school_id);
		if($class_id != ""){
			$condition['b.class_id'] = $class_id;
		}
		if($sections_id != ""){
			$condition['b.sections_id'] = $sections_id;
		}
		$this->db->where($condition);

                $query = $this->db->get();
		log_message("debug", print_r($this->db->last_query(),true));
                $data = [];
                foreach($query->result() as $rec){
                        if($rec->fcm_token != ""){
                                array_push($data,$rec->fcm_token);
                        }
                }
                return $data;
    }
}
?>
