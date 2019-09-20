<?php
class m_route extends CI_Model { 
    function route_add($pickup_point,$longitude,$lattitude,$school){  
        
        $this->db->select("*");
        $this->db->from('pickup_point');
        $this->db->where(array( 'pickup_point' => $pickup_point));
        $query = $this->db->get();
        if($query->num_rows() == 0){
		    $target = array(  	 
		        "pickup_point"=>$pickup_point,
		        "longitude"=>$longitude,
		        "lattitude"=>$lattitude,
		        "school_id"=>$school,
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
		    // print_r($target);exit();
			$this->db->insert('pickup_point', $target);
			return true; 
        }
    }
    function route_edit($id,$pickup_point,$longitude,$lattitude,$school){
        $this->db->select("*");
        $this->db->from('pickup_point');
        $this->db->where(array( 'pickup_point' => $pickup_point));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	   $target = array(  	
    	       "pickup_point"=>$pickup_point,
    	       "longitude"=>$longitude,
    	       "lattitude"=>$lattitude,
    	       "school_id"=>$school,
    	       "updated_date"=>date('Y-m-d'),
    	       "updated_by"=>$this->session->userdata['id'],
    			);   
    	   // print_r($id);exit();
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('pickup_point', $target);
    		return true; 
        }
    }
    function route_show(){ 

	    $this->db->select('s.school_name,b.* ');
		$this->db->from('pickup_point b'); 
	    $this->db->join('school s', 'b.school_id=s.id', 'left');  

		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function route_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('pickup_point');
		if($query)
	    {
	        return true;
	    } 
    } 

    function route_show_id(){ 
	    $this->db->select("*"); 
		$this->db->from('pickup_point'); 
	    $this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    }


     function route_fetch($class_id){ 
	    $this->db->select("*"); 
		$this->db->from('pickup_point'); 
	    $this->db->where(array( 'class_id' => $class_id ));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 

    function get_pickup_points($points){
	    $this->db->select("*");
	    $this->db->from('pickup_point');
	    $this->db->where('id in ('.$points.")");
	    $query = $this->db->get();
	    return $query->result();
    }

}
?>
