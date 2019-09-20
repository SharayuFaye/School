<?php
class m_practices extends CI_Model { 
    function practices_add($class_id,$section_id,$date,$subject,$image,$school_id){ 
        $this->db->select("*");
        $this->db->from('practice');
        $this->db->where(array( 'sections_id' => $section_id));
        $this->db->where(array( 'class_id' => $class_id));
        $this->db->where(array( 'subject' => $subject)); 
        $query = $this->db->get();
        if($query->num_rows() == 0){
            if($subject !=''){
    	    $target = array(  	 
    	        "class_id" => $class_id,
    	        "sections_id" => $section_id,
    	        "date" => $date, 
    	        "subject" => $subject,
    	        "image" => $image,
    	        "school_id" => $school_id,
    	        "created_date"=>date('Y-m-d'),
    	        "created_by"=>$this->session->userdata['id'], 
    			);   
    		$this->db->insert('practice', $target);
    		return true;
            }
        }
		 
    }
    function practices_edit($id,$class_id,$section_id,$date,$subject,$image,$school_id){ 
        $this->db->select("*");
        $this->db->from('practice');
        $this->db->where(array( 'sections_id' => $section_id));
        $this->db->where(array( 'class_id' => $class_id));
        $this->db->where(array( 'subject' => $subject));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        //         print_r($query->num_rows());
        //         exit();
        if($query->num_rows() == 0){ 
            $target = array( 
                "class_id" => $class_id,
                "sections_id" => $section_id,
                "date" => $date, 
                "subject" => $subject,
                "image" => $image,
                "school_id" => $school_id,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
            );    
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('practice', $target);
    		return true; 
        }
    }
    function practices_show(){  
		$this->db->select('f.*,c.class,s.sections');
		$this->db->from('practice f');
		$this->db->join('class c', 'f.class_id=c.id', 'left');
		$this->db->join('sections s', 'f.sections_id=s.id', 'left'); 
		$this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
		
		$query = $this->db->get(); 
		
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function practices_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('practice');
		if($query)
	    {
	        return true;
	    } 
    } 
    
    function practices_show_id($id){
        $this->db->select('f.*,c.class');
        $this->db->from('practice f'); 
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'f.id' => $id ));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    
    //App Functions
    
    
    function practices_id_show_app($school_id,$sections_id){
        
        
        $this->db->select('f.*,c.class');
        $this->db->from('practice f'); 
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->where(array( 'f.school_id' => $school_id ));
        $this->db->where(array( 'f.sections_id' => $sections_id ));
         
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }

    function practices_img_show_app($school_id,$id){
        
        
        $this->db->select('f.*');
        $this->db->from('practice f'); 
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->where(array( 'f.school_id' => $school_id ));
        $this->db->where(array( 'f.id' => $id ));
         
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }

    
}
?>