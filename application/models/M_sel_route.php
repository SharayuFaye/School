<?php
class m_sel_route extends CI_Model { 
    function route_add($route,$pickup_point,$school){  
        
//         $pref = explode(',',$preference);
//         $pickup_p = explode(',',$pickup_point);
// //         print_r($pref);
//         for($i=0;$i<count($pickup_p);$i++){
            
//             $pickup = $pickup_p[$i];
//             $prefer = $pref[$i]; 
        
        $this->db->select("*");
        $this->db->from('route'); 
        $this->db->where(array( 'route_name' =>$route ));
        $query = $this->db->get();
        if($query->num_rows() == 0){  
                    $target = array( 
                        "route_name"=>$route,
                        "pickup_point_id"=>$pickup_point,
                        "school_id"=>$school,
                        "created_date"=>date('Y-m-d'),
                        "created_by"=>$this->session->userdata['id'], 
                    );
                  
                   $this->db->insert('route', $target);
    //             }
             
    			return true; 
        }
    }
    function route_edit($id,$route,$pickup_point,$school){
        $this->db->select("*");
        $this->db->from('route'); 
        $this->db->where(array( 'route_name' =>$route ));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){ 
            $target = array(
                "route_name"=>$route,
                "pickup_point_id"=>$pickup_point,
                "school_id"=>$school,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
    			);    
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('route', $target);
    		return true; 
        }
    }
    function route_show(){ 
        
        $this->db->select("*");
        $this->db->from('route'); 
        $this->db->distinct();
        
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function route_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('route');
		if($query)
	    {
	        return true;
	    } 
    } 

    function route_show_id(){ 
	    $this->db->select("r.*,p.pickup_point"); 
	    $this->db->from('route r');
	    $this->db->join('pickup_point p', 'r.pickup_point_id=p.id', 'left');
	    $this->db->where(array( 'r.school_id' => $this->session->userdata['school']));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    }


     function route_fetch($class_id){ 
	    $this->db->select("*"); 
		$this->db->from('route'); 
	    $this->db->where(array( 'class_id' => $class_id ));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    
    function transportation_fetch($route_id){
        
        $this->db->select("r.*");
        $this->db->from('route r');  
        $this->db->where(array( 'r.id' =>$route_id));
        $query = $this->db->get(); 
        if($query)
        {
            return $query->result();
        }
    }
     
    
}
?>