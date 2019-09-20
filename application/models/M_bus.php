<?php
class m_bus extends CI_Model { 
    function bus_add($bus_number,$route,$student_strength,$drivers,$school){
        $this->db->select("*");
        $this->db->from('bus');
        $this->db->where(array( 'bus_number' => $bus_number)); 
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
		    $target = array(  	
				"school_id"=>$school,
				"bus_number"=>$bus_number, 
		        "student_strength"=>$student_strength, 
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
		     $this->db->insert('bus', $target);
		     $bus_id = $this->db->insert_id(); 
		     if($bus_id){ 
			    $target = array(
			        "school_id"=>$school,
			        "bus_id"=>$bus_id,
			        "route_id"=>$route, 
			        "created_date"=>date('Y-m-d'),
			        "created_by"=>$this->session->userdata['id'],
			    ); 
			     $this->db->insert('route_map', $target);
			    
			    $target = array(
			        "school_id"=>$school,
			        "bus_id"=>$bus_id, 
			        "drivers_id"=>$drivers,
			        "created_date"=>date('Y-m-d'),
			        "created_by"=>$this->session->userdata['id'],
			    ); 
			    $this->db->insert('driver_map', $target);
			    
			    
			     return true;
			}
        }
    }
    function bus_edit($id,$bus_number,$route,$student_strength,$drivers,$school){ 
        $this->db->select("*");
        $this->db->from('bus');
        $this->db->where(array( 'bus_number' => $bus_number));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
    	   $target = array(  	
    				"school_id"=>$school,
    				"bus_number"=>$bus_number, 
        	       "student_strength"=>$student_strength, 
        	       "updated_date"=>date('Y-m-d'),
        	       "updated_by"=>$this->session->userdata['id'],
    			);   
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('bus', $target);
    		
    		
    		$target = array(
    		    "school_id"=>$school, 
    		    "route_id"=>$route,
    		    "updated_date"=>date('Y-m-d'),
    		    "updated_by"=>$this->session->userdata['id'],
    		);
    		$this->db->where(array( 'bus_id' => $id));
    		$this->db->update('route_map', $target);
    		
    		$target = array(
    		    "school_id"=>$school, 
    		    "drivers_id"=>$drivers,
    		    "updated_date"=>date('Y-m-d'),
    		    "updated_by"=>$this->session->userdata['id'],
    		);
    		$this->db->where(array( 'bus_id' => $id));
    		$this->db->update('driver_map', $target);
    		
    		
    		
    		return true; 
        }
    }
    function bus_show(){ 

	    $this->db->select('s.school_name,b.*,r.route_name');
		$this->db->from('bus b'); 
	    $this->db->join('school s', 'b.school_id=s.id', 'left');  
	    $this->db->join('route r', 'b.route_id=r.id', 'left');  
 
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function bus_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('bus');
		if($query)
	    {
	        return true;
	    } 
    } 

    function bus_show_id(){
        $this->db->select('s.school_name,b.*,route.route_id,r.route_name,driver.drivers_id');
        $this->db->from('bus b');
        $this->db->join('route_map route', 'b.id=route.bus_id', 'left');
        $this->db->join('driver_map driver', 'b.id=driver.bus_id', 'left');  
        $this->db->join('school s', 'b.school_id=s.id', 'left');
        $this->db->join('route r', 'route.route_id=r.id', 'left');   
	    $this->db->where(array( 'b.school_id' => $this->session->userdata['school']));
		$query = $this->db->get();   
		if($query)
	    {
	        return $query->result();
	    } 
    }


     function bus_fetch($class_id){ 
	    $this->db->select("*"); 
		$this->db->from('bus'); 
	    $this->db->where(array( 'class_id' => $class_id ));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 

	function get_bus_id($bus_num){
		$this->db->select('id');
		$this->db->from('bus');
		$this->db->where(array('bus_number'=> $bus_num));
		$query = $this->db->get();
		return $query->result();
	}

}
?>
