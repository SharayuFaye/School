<?php
class m_school_admin extends CI_Model { 
    function school_admin_add($username,$password,$school_id,$role){ 
		$this->db->select("*"); 
		$this->db->from('users');
		$this->db->where(array( 'role' => 'school_admin')); 
		$this->db->where(array( 'school_id' => $school_id)); 
		$query = $this->db->get();
		 
		if($query->num_rows() == 0){
		    $target = array(  	
		        "username"=>$username,
		        "password"=>md5($password),
				"school_id"=>$school_id,
		        "role"=>$role,
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
		    $query = $this->db->insert('users', $target);
		    if($query){ return true;  }else{ return false; } 
		}	 
    }
    function school_admin_edit($id,$username,$password,$school_id,$role){  
            $this->db->select("*");
            $this->db->from('users');
            $this->db->where(array( 'role' => 'school_admin')); 
            $this->db->where(array( 'school_id' => $school_id));
            $this->db->where('id!=', $id);
            $query = $this->db->get();
            
            
            $this->db->select("*");
            $this->db->from('users');
            $this->db->where(array( 'role' => 'school_admin'));
            $this->db->where(array( 'school_id' => $school_id));
            $this->db->where('id', $id);
            $queryStud = $this->db->get();
            $res = $queryStud->result();
            if(md5($password) != $res[0]->password && $password !=''){
                $password = md5($this->input->post('password') );
            }else{
                $password =$res[0]->password ;
            }
            
            if($query->num_rows() == 0){
                $target = array(  	 
    	       "username"=>$username,
    	       "password"=>$password,
    	       "school_id"=>$school_id,
                "role"=>$role,
                    "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
    			);    
    	    $this->db->where(array( 'id' => $id));
    	    $query = $this->db->update('users', $target);
    	    if($query){ return true;  }else{ return false; }
          }
    }
    function school_admin_show(){ 
	    $this->db->select("u.*,s.school_name"); 
	    $this->db->from('users u');
	    $this->db->join('school s', 'u.school_id=s.id', 'left');
	    $this->db->where(array( 'role' => 'school_admin'));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function school_admin_show_id($id){ 
	    $this->db->select("*"); 
		$this->db->from('users'); 
	    $this->db->where(array( 'id' => $id));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function school_admin_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('users');
		if($query)
	    {
	        return true;
	    } 
    } 

}
?>