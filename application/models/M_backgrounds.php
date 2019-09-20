<?php
class m_backgrounds extends CI_Model { 
	function backgrounds_add($wallpaper,$date,$school){ 
		$this->db->select("*"); 
		$this->db->from('backgrounds');  
		$this->db->where(array( 'school_id' => $school));
		$query = $this->db->get(); 
		if($query->num_rows() == 0){
		    $target = array(  	
				"wallpaper"=>$wallpaper,
				"date"=>$date,
		        "school_id"=>$school,
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
			$this->db->insert('backgrounds', $target);
			return true;
		}	 
    }
    function backgrounds_edit($id,$wallpaper,$date,$school){
        $this->db->select("*");
        $this->db->from('backgrounds'); 
        $this->db->where(array( 'school_id' => $school));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	   $target = array(  	
    				"wallpaper"=>$wallpaper,
    				"date"=>$date,
        	       "school_id"=>$school,
        	       "updated_date"=>date('Y-m-d'),
        	       "updated_by"=>$this->session->userdata['id'],
    			);    
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('backgrounds', $target);
    		return true; 
        }
    }
    function backgrounds_show(){  
	    $this->db->select('s.school_name,b.*');
		$this->db->from('backgrounds b'); 
	    $this->db->join('school s', 'b.school_id=s.id', 'left');   
   		$query = $this->db->get(); 
 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function backgrounds_show_id($id){ 
	    $this->db->select("*"); 
		$this->db->from('backgrounds'); 
	    $this->db->where(array( 'id' => $id));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function backgrounds_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('backgrounds');
		if($query)
	    {
	        return true;
	    } 
    } 
    
    //App FUnctions
    
    function backgrounds_show_app($school_id){
        
        
        $this->db->select('s.school_name,b.*');
        $this->db->from('backgrounds b');
        $this->db->join('school s', 'b.school_id='.$school_id, 'left');
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
}
?>