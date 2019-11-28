<?php
class m_route extends CI_Model { 
    function route_add($pickup_point,$longitude,$lattitude,$school){  
        
        $this->db->select("*");
        $this->db->from('pickup_point');
        $this->db->where(array( 'pickup_point' => $pickup_point));
        $query = $this->db->get();
//         if($query->num_rows() == 0){
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
//         }
    }
    function route_edit($id,$pickup_point,$longitude,$lattitude,$school){
        $this->db->select("*");
        $this->db->from('pickup_point');
        $this->db->where(array( 'pickup_point' => $pickup_point));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
//         if($query->num_rows() == 0){
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
//         }
    }
    function route_show(){ 

	    $this->db->select('s.school_name,b.* ');
		$this->db->from('pickup_point b'); 
		$this->db->join('school s', 'b.school_id=s.id', 'left');
		$this->db->where(array( 'school_id' => $this->session->userdata['school']));

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

    function get_driver_pickup_points($route_id){
		$pickups = array();
		//Get pickup points for the route
		$pp = $this->db->select("pickup_point_id")
				->from('route')
				->where(array('id'=>$route_id))
				->get()
				->result();
		log_message('debug',print_r($pp, true));
		$points = json_decode($pp[0]->pickup_point_id);
		//$points = json_decode($route_id);
		log_message('debug',print_r($points, true));
		foreach($points as $point){
	    	$this->db->select("*");
	    	$this->db->from('pickup_point');
	    	$this->db->where(array('id' => $point));
	    	$query = $this->db->get();
			array_push($pickups, $query->result()[0]);
		}
	    return $pickups;
    }

    function get_pickup_points($route_id){
		$pickups = array();
		//Get pickup points for the route
		//$pp = $this->db->select("pickup_point_id")
		//				->from('route')
		//				->where(array('id'=>$route_id))
		//				->get()
		//				->result();
		//log_message('debug',print_r($pp, true));
		//$points = json_decode($pp[0]->pickup_point_id);
		$points = json_decode($route_id);
		log_message('debug',print_r($points, true));
		foreach($points as $point){
	    	$this->db->select("*");
	    	$this->db->from('pickup_point');
	    	$this->db->where(array('id' => $point));
	    	$query = $this->db->get();
			array_push($pickups, $query->result()[0]);
		}
	    return $pickups;
    }

	function get_student_route($token){
		$this->db->select('r.pickup_point_id');
		$this->db->from('route r');
		$this->db->join('students s','s.route_id = r.id','left');
		$this->db->join('users u','s.users_id = u.id','left');
		$this->db->join('tokens t','t.user_id = u.id','left');
		$this->db->where(array('t.token'=> $token));
		$query = $this->db->get();
		$points = $query->result();

		log_message("debug","Students pickup points ::::: " . print_r($points,true));
		if($this->get_pickup_points($points[0]->pickup_point_id) == null){
		      return array();
		}else{
		      return($this->get_pickup_points($points[0]->pickup_point_id));
		}
	}

	function get_bus_location($token){
		$this->db->select('l.*,b.bus_number');
		$this->db->from('location l');
		$this->db->join('students s','s.bus_id = l.bus_id','left');
		$this->db->join('bus b','b.id = l.bus_id','left');
		$this->db->join('users u','s.users_id = u.id','left');
		$this->db->join('tokens t','t.user_id = u.id','left');
		$this->db->where(array('t.token'=>$token));
		$query = $this->db->get();
		return $query->result();
	}

}
?>
