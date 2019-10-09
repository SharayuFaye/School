<?php
class m_school extends CI_Model { 
    function school_add($school_name,$school_address,$school_mobile,$school_mobile2,$school_logo,$school_mail,$date){ 
		$this->db->select("*"); 
		$this->db->from('school'); 
		$this->db->where(array( 'school_name' => $school_name));
		$this->db->or_where(array( 'school_mail' => $school_mail));
		$this->db->or_where(array( 'school_mobile' => $school_mobile));
		$this->db->or_where(array( 'school_mobile2' => $school_mobile2));
		$query = $this->db->get(); 
		if($query->num_rows() == 0){
		    $target = array(  	
				"school_name"=>$school_name,
				"school_address"=>$school_address,
		        "school_mobile"=>$school_mobile,
		        "school_mobile2"=>$school_mobile2,
				"school_logo"=>$school_logo,
				"school_mail"=>$school_mail,
		        "date"=>$date,
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
// 		    print_r($target); 
		    $query = $this->db->insert('school', $target);
// 		    print_r($query);exit();
			if($query){ return true;  }else{ return false; }
		}	 
    }
    function school_edit($id,$school_name,$school_address,$school_mobile,$school_mobile2,$school_logo,$school_mail,$date){
        $this->db->select("*");
        $this->db->from('school');
        $this->db->where(array( 'school_name' => $school_name));
        $this->db->where(array( 'school_mail' => $school_mail));
        $this->db->where(array( 'school_mobile' => $school_mobile));
        $this->db->where(array( 'school_mobile2' => $school_mobile2));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	   $target = array(  	
    			"school_name"=>$school_name,
    			"school_address"=>$school_address,
    	        "school_mobile"=>$school_mobile,
    	        "school_mobile2"=>$school_mobile2,
    			"school_logo"=>$school_logo,
    			"school_mail"=>$school_mail,
    	       "date"=>$date,
    	       "updated_date"=>date('Y-m-d'),
    	       "updated_by"=>$this->session->userdata['id'],
    			);    
    	    $this->db->where(array( 'id' => $id));
    		$query = $this->db->update('school', $target);
    		if($query){ return true;  }else{ return false; }
        }
    }
    function school_show(){ 
	    $this->db->select("*"); 
		$this->db->from('school'); 
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function school_show_id($id){ 
	    $this->db->select("*"); 
		$this->db->from('school'); 
	    $this->db->where(array( 'id' => $id));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function school_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('school');
		if($query)
	    {
	        return true;
	    } 
    } 

}
?>