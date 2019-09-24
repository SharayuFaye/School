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
		         $r = explode(',',$route);
		         foreach($r as $id){
    			    $target = array(
    			        "school_id"=>$school,
    			        "bus_id"=>$bus_id,
    			        "route_id"=>$id, 
    			        "created_date"=>date('Y-m-d'),
    			        "created_by"=>$this->session->userdata['id'],
    			    ); 
    			     $this->db->insert('route_map', $target);
		         }
		         
		         $d = explode(',',$drivers);
		         foreach($d as $id){
    			    $target = array(
    			        "school_id"=>$school,
    			        "bus_id"=>$bus_id, 
    			        "drivers_id"=>$id,
    			        "created_date"=>date('Y-m-d'),
    			        "created_by"=>$this->session->userdata['id'],
    			    ); 
    			    $this->db->insert('driver_map', $target);
		         }
			    
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
    		
    		
    		
    		if($id){
    		    $this->db->where(array( 'bus_id' =>$id));
    		    $query = $this->db->delete('route_map');
    		    
    		    $r = explode(',',$route);
    		    foreach($r as $Rid){
    		        $target = array(
    		            "school_id"=>$school,
    		            "bus_id"=>$id,
    		            "route_id"=>$Rid,
    		            "created_date"=>date('Y-m-d'),
    		            "created_by"=>$this->session->userdata['id'],
    		        );
    		        $this->db->insert('route_map', $target);
    		    }
    		    
    		    $this->db->where(array( 'bus_id' =>$id));
    		    $query = $this->db->delete('driver_map');
    		    $d = explode(',',$drivers);
    		    foreach($d as $Did){
    		        $target = array(
    		            "school_id"=>$school,
    		            "bus_id"=>$id,
    		            "drivers_id"=>$Did,
    		            "created_date"=>date('Y-m-d'),
    		            "created_by"=>$this->session->userdata['id'],
    		        );
    		        $this->db->insert('driver_map', $target);
    		    }
    		    
    		    return true;
    		}
    		 
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
        
        
        $this->db->where(array( 'bus_id' =>$id));
        $query = $this->db->delete('route_map');
        
        $this->db->where(array( 'bus_id' =>$id));
        $query = $this->db->delete('driver_map');
        
        
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('bus');
		if($query)
	    {
	        return true;
	    } 
    } 

    function bus_show_id(){
        $this->db->select('s.school_name,b.id,b.bus_number,b.student_strength');
        $this->db->from('bus b'); 
        $this->db->join('school s', 'b.school_id=s.id', 'left'); 
        $this->db->where(array( 'b.school_id' => $this->session->userdata['school']));
        $this->db->distinct('b.id');
		$query = $this->db->get();   
		if($query)
	    {
	        return $query->result();
	    } 
    }

    
    function route_map($bus_id){
        $this->db->select('rm.*,r.route_name');
        $this->db->from('route_map rm');
        $this->db->join('route r', 'r.id=rm.route_id', 'left'); 
        $this->db->where(array( 'rm.bus_id' => $bus_id)); 
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    function driver_map($bus_id){
        $this->db->select('rm.*,r.drivers_name');
        $this->db->from('driver_map rm');
        $this->db->join('drivers r', 'r.id=rm.drivers_id', 'left');
        $this->db->where(array( 'rm.bus_id' => $bus_id));
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function route_map_show(){
        $this->db->select('rm.*,r.route_name');
        $this->db->from('route_map rm');
        $this->db->join('route r', 'r.id=rm.route_id', 'left'); 
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    function driver_map_show(){
        $this->db->select('rm.*,r.drivers_name');
        $this->db->from('driver_map rm');
        $this->db->join('drivers r', 'r.id=rm.drivers_id', 'left'); 
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
