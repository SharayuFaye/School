<?php
class m_fees extends CI_Model { 
    function fees_add($student_id,$class,$section,$student_name,$annual_fees,$fees_paid,$date,$type_payment,$school){ 
        if($student_id!='' && $fees_paid!=''){
            $this->db->select("*");
            $this->db->from('fees');
            $this->db->where(array( 'sections_id' => $section));
            $this->db->where(array( 'class_id' => $class));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'fees_paid' => $fees_paid));
            $query = $this->db->get();
            if($query->num_rows() == 0){
        	    $target = array(  	
        	        "students_id" => $student_id,
        	        "class_id" => $class,
        	        "sections_id" => $section, 
        	        "annual_fees" => $annual_fees,
        	        "fees_paid" => $fees_paid,
        	        "date" => $date,
        	        "type_payment" => $type_payment,
        	        "school_id" => $school,
        	        "created_date"=>date('Y-m-d'),
        	        "created_by"=>$this->session->userdata['id'], 
        			);   
        		$this->db->insert('fees', $target);
        		return true;
            }
        }
    }
    function fees_edit($id,$student_id,$class,$section,$student_name,$annual_fees,$fees_paid,$date,$type_payment,$school){  
        
        $this->db->select("*");
        $this->db->from('fees');
        $this->db->where(array( 'sections_id' =>  $section));
        $this->db->where(array( 'class_id' => $class));
        $this->db->where(array( 'date' => $date));
        $this->db->where(array( 'fees_paid' => $fees_paid));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
//         print_r($query->num_rows());
//         exit();
        if($query->num_rows() == 0){ 
          
            $target = array(
                "students_id" => $student_id,
                "class_id" => $class,
                "sections_id" => $section,
                "annual_fees" => $annual_fees,
                "fees_paid" => $fees_paid,
                "date" => $date,
                "type_payment" => $type_payment,
                "school_id" => $school,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
            );  
//             print_r($target); exit();
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('fees', $target);
    		return true;
        }
    }
    function fees_show(){  
		$this->db->select('s.student_name,s.roll_number,f.*,c.class,sec.sections');
		$this->db->from('fees f');
		$this->db->join('students s', 'f.students_id=s.id', 'left');
		$this->db->join('class c', 'f.class_id=c.id', 'left');
		$this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
		$this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
		$this->db->where(array( 's.active' => 1));
		
		$query = $this->db->get(); 
		
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function fees_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('fees');
		if($query)
	    {
	        return true;
	    } 
    } 
    
    
    
    function fees_class_sel($class_id,$section_id){
        $this->db->select('s.student_name,s.roll_number,f.*,c.class,sec.sections');
        $this->db->from('fees f');
        $this->db->join('students s', 'f.students_id=s.id', 'left');
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 's.active' => 1));
        
        if($class_id != '0'){
            $this->db->where(array( 'f.class_id' => $class_id ));
        }
        if($section_id != '0'){
            $this->db->where(array( 'sec.sections' => $section_id ));
        }
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    
    
    function fees_show_app($student_id){
        
        
        $this->db->select('f.*,c.class,sec.sections');
        $this->db->from('fees f'); 
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left'); 
        $this->db->where(array( 'f.students_id' => $student_id)); 
         
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    
    function getContent($id){
        
        
        $this->db->select('f.*');
        $this->db->from('fees f');
        $this->db->where(array( 'f.id' => $id));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
    
}
?>