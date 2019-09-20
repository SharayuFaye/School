<?php
class m_transportation extends CI_Model { 
	function transportation_add($bus_id,$pickup_point){  
		    $target = array(  	 
				"bus_id"=>$bus_id,
				"pickup_point"=>$pickup_point,
				);   
			$this->db->insert('transportation', $target);
			return true; 
    }
    function transportation_edit($id,$bus_id,$pickup_point){ 
	   $target = array(  	 
				"bus_id"=>$bus_id,
				"pickup_point"=>$pickup_point,
			);   
	   // print_r($id);exit();
	    $this->db->where(array( 'id' => $id));
		$this->db->update('transportation', $target);
		return true; 
    }
    function transportation_show(){ 

	    $this->db->select('b.bus_number,t.*');
		$this->db->from('transportation t'); 
	    $this->db->join('bus b', 't.bus_id=b.id', 'left');  
	    $this->db->where(array( 'b.school_id' => $this->session->userdata['school']));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function transportation_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('transportation');
		if($query)
	    {
	        return true;
	    } 
    } 
 

     function transportation_fetch($bus_id){ 
	    $this->db->select("*"); 
		$this->db->from('transportation'); 
	    $this->db->where(array( 'bus_id' => $bus_id ));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 

}
?>