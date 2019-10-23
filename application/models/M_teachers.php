<?php
class m_teachers extends CI_Model { 
    function teachers_add($teacher_name,$teacher_address,$teacher_mobile,$teacher_mail,$username,$password,$profile,$salary_details,$education_details,$join_date,$school){ 
		
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where(array( 'username' => $username));
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $target = array(
                "username" => $username,
                "password" => md5($password),
                "school_id"=>  $school,
                "role"=>  'teacher',
		        "created_date"=>date('Y-m-d'),
                "created_by"=>$this->session->userdata['id'], 
            );
            $this->db->insert('users', $target);
            
            $this->db->select("*");
            $this->db->from('users');
            $this->db->where(array( 'username' => $username));
            $query = $this->db->get();
            if($query->num_rows() == 1){ 
                $userData = $query->result(); 
                $this->db->select("*");
                $this->db->from('teachers');
                $this->db->where(array( 'teacher_name' => $teacher_name));
                $this->db->where(array( 'teacher_mail' => $teacher_mail));
                $query = $this->db->get();
                if($query->num_rows() == 0){
                    $target = array(
                        "users_id" => $userData[0]->id ,
                        "teacher_name"=>$teacher_name,
                        "teacher_address"=>$teacher_address,
                        "teacher_mobile"=>$teacher_mobile,
                        "teacher_mail"=>$teacher_mail,
                        "profile" => $profile,
                        "salary_details"=>$salary_details,
                        "education_details"=>$education_details,
                        "join_date"=>$join_date,
                        "school_id"=>$school,
                        "created_date"=>date('Y-m-d'),
                        "created_by"=>$this->session->userdata['id'], 
                    );
                    $query = $this->db->insert('teachers', $target);
                    
                    if($query){ return true;  }else{ return false; }
                }	 
            }
        } 
    }
    function teachers_edit($id,$user_id,$teacher_name,$teacher_address,$teacher_mobile,$teacher_mail,$username,$password,$profile,$salary_details,$education_details, $join_date,$school){ 
     
        $this->db->select("*");
        $this->db->from('teachers');
        $this->db->where(array( 'teacher_name' => $teacher_name));
        $this->db->where(array( 'teacher_mail' => $teacher_mail));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        
        
        if($query->num_rows() == 0){ 
            $target = array(  	
    				"teacher_name"=>$teacher_name,
    				"teacher_address"=>$teacher_address,
    				"teacher_mobile"=>$teacher_mobile,
                "teacher_mail"=>$teacher_mail,
                "profile" => $profile,
    				"salary_details"=>$salary_details,
    				"education_details"=>$education_details,
    				"join_date"=>$join_date,
                    "school_id"=>$school,
                    "updated_date"=>date('Y-m-d'),
                    "updated_by"=>$this->session->userdata['id'],
    			);   
    	   
    	   $this->db->select("*");
    	   $this->db->from('users');
    	   $this->db->where(array( 'id' => $user_id));
    	   $query = $this->db->get(); 
    	    
    	   $res = $query->result();
    	   
    	   if(md5($password) != $res[0]->password && $password !=''){
    	       $password = md5($this->input->post('password') );
    	   }else{
    	       $password =$res[0]->password ;
    	   }
    	   
    	   
    	   if($query->num_rows() == 1){
    	       $target1 = array(
    	           "username" => $username,
    	           "password" => $password,
    	           "updated_date"=>date('Y-m-d'),
    	           "updated_by"=>$this->session->userdata['id'],
    	       );
    	       $this->db->where(array( 'id' => $user_id));
    	       $this->db->update('users', $target1);
    	   }  
    	   
    	    $this->db->where(array( 'id' => $id));
    	    $query = $this->db->update('teachers', $target);
    	    if($query){ return true;  }else{ return false; }
    		 
        }
    }
    function teachers_show(){  

	    $this->db->select('s.school_name,b.*,u.username,u.password');
		$this->db->from('teachers b'); 
		$this->db->join('school s', 'b.school_id=s.id', 'left');
		$this->db->join('users u', 'b.users_id=u.id', 'left');
		$this->db->where(array( 'b.school_id' => $this->session->userdata['school']));

		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function teachers_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('teachers');
		if($query)
	    {
	        return true;
	    } 
    } 

    function teachers_show_id(){ 
	    $this->db->select("*"); 
		$this->db->from('teachers'); 
	    $this->db->where(array( 'school_id' => $this->session->userdata['school']));
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
            
            if (!filter_var($row['teacher_mail'], FILTER_VALIDATE_EMAIL)  ) {
                $duplicate[] = !preg_match('/[^A-Za-z ]/', $row['teacher_mail']);
                
            }else{
                 
                if($query->num_rows() == 0){
                    $target = array(
                        "username" => $row['username'],
                        "password" =>md5($row['password']),
                        "school_id"=>  $this->session->userdata['school'],
                        "role"=>  'teacher',
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
                        $this->db->from('teachers');
                        $this->db->where(array( 'teacher_name' => $row['teacher_name']));
                        $this->db->where(array( 'teacher_mail' => $row['teacher_mail']));
                        $query = $this->db->get();
                        if($query->num_rows() == 0){
                            $target = array(
                                "users_id" => $userData[0]->id ,
                                "teacher_name"=>$row['teacher_name'],
                                "teacher_address"=>$row['teacher_address'],
                                "teacher_mobile"=>$row['teacher_mobile'],
                                "teacher_mail"=>$row['teacher_mail'],
                                "salary_details"=>$row['salary_details'],
                                "education_details"=>$row['education_details'],
                                "join_date"=>$row['join_date'],
                                "school_id"=>$this->session->userdata['school'],
                                "created_date"=>date('Y-m-d'),
                                "created_by"=>$this->session->userdata['id'],
                            );
                            $res =  $this->db->insert('teachers', $target);
                           
                        }
                    }
                }else{
                    $duplicate[] = $row['username'];
                   
                }
            }
        }
         
       return $duplicate;
        
    }
    
    
    function teachers_show_id_user($teachers_id){
        
        
        $this->db->select("*");
        $this->db->from('teachers');
        $this->db->where(array( 'users_id' => $teachers_id));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    //APp functions
    
    
    function teachers_show_app($teachers_id){
        
        
        $this->db->select("*");
        $this->db->from('teachers');
        $this->db->where(array( 'id' => $teachers_id));
        $query = $this->db->get();  
        
        if($query)
        {
            return $query->result();
        }
    }
    
    function teachers_show_section_app($sections){
        
        $this->db->select('t.*,s.sections,c.class');
        $this->db->from('teachers t');
        $this->db->join('sections s', 's.teachers_id=t.id', 'left');
        $this->db->join('class c', 'c.id=s.class_id', 'left');
        $this->db->where(array( 's.id' => $sections));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    function teachers_show_user_app($teachers_id){
        
        $this->db->select('t.*,s.sections,c.class');
        $this->db->from('teachers t');
        $this->db->join('sections s', 's.teachers_id=t.id', 'left');
        $this->db->join('class c', 'c.id=s.class_id', 'left');
        $this->db->where(array( 't.users_id' => $teachers_id));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }

    function get_teachers_fcm($school_id){  

	    $this->db->select('t.fcm_token');
		$this->db->from('tokens t');
		$this->db->join('users u', 't.user_id = u.id', 'left');
		$this->db->join('teachers b','b.users_id = u.id','left');
		$this->db->where(array( 'b.school_id' => $school_id));

		$query = $this->db->get(); 
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
