<?php
class m_exam_type extends CI_Model { 
	function exam_type_add($type,$school){ 
		$this->db->select("*"); 
		$this->db->from('exam_type'); 
		$this->db->where(array( 'type' => $type));
		$query = $this->db->get(); 
		if($query->num_rows() == 0){
		    $target = array(  	
				"type"=>$type,
				"school_id"=>$school 
				);   
			$this->db->insert('exam_type', $target);
			return true;
		}	
    }
    function exam_type_edit($id,$type,$school){ 
        $this->db->select("*");
        $this->db->from('exam_type');
        $this->db->where(array( 'type' => $type));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	   $target = array(  	
    				"type"=>$type,
    				"school_id"=>$school 
    		 );   
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('exam_type', $target);
    		return true; 
        }
    }
    function exam_type_show(){ 
	    $this->db->select("*"); 
	    $this->db->from('exam_type');
	    $this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function exam_type_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('exam_type');
		if($query)
	    {
	        return true;
	    } 
    } 

    function exam_type_show_id(){ 
	    $this->db->select("*"); 
		$this->db->from('exam_type'); 
	    $this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    }


     function exam_type_fetch($bus_id){ 
	    $this->db->select("*"); 
		$this->db->from('exam_type'); 
	    $this->db->where(array( 'bus_id' => $bus_id ));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
     }   
     
     //App Functions
     
     function exam_type_show_app($student_id){
         
         $this->db->select("e.*");
         $this->db->from('exam_type e');
		 $this->db->join('students s', 's.school_id = e.school_id', 'left');
         $this->db->where(array( 's.id' =>$student_id));
         $query = $this->db->get(); 
         
         if($query)
         {
             return $query->result();
         }
     }
     
     
}
?>
