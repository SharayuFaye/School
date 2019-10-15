<?php
class m_subject_allocation extends CI_Model { 
    function subject_allocation_add($school,$class,$sections_id,$subject,$teacher){  
	    
			$this->db->select("*");
			$this->db->from('subject');
			$this->db->where(array( 'subject' => $subject)); 
			$query = $this->db->get();
			$sub = $query->result();
			
	    $this->db->select("*");
	    $this->db->from('subject_allocation');
	    $this->db->where(array( 'school_id' => $school));
	    $this->db->where(array( 'sections_id' => $sections_id));
	    $this->db->where(array( 'subject_id' => $sub[0]->id)); 
	    $this->db->where(array( 'teachers_id' => $teacher)); 
	    $query = $this->db->get();
		
	    if($query->num_rows() == 0 ){
			
	        $target = array(
	            "school_id"=>$school,
	            "sections_id"=>$sections_id,
	            "class_id"=>$class,
	            "subject_id"=>$sub[0]->id,
	            "teachers_id"=>$teacher, 
	        );
	        $this->db->insert('subject_allocation', $target);
	          
	        return true;
	    }
	     
    }
    function subject_allocation_edit($id,$school,$class,$sections_id,$subject,$teacher){   
        $this->db->select("*");
			$this->db->from('subject');
			$this->db->where(array( 'subject' => $subject)); 
			$query = $this->db->get();
			$sub = $query->result();
			
	    $this->db->select("*");
	    $this->db->from('subject_allocation');
	    $this->db->where(array( 'school_id' => $school));
	    $this->db->where(array( 'sections_id' => $sections_id));
	    $this->db->where(array( 'subject_id' => $sub[0]->id)); 
	    $this->db->where(array( 'teachers_id' => $teacher)); 
        $this->db->where('id!=', $id);
	    $query = $this->db->get();
		
	    if($query->num_rows() == 0 ){
			
	        $target = array(
	            "id"=>$id	,
	            "school_id"=>$school,
	            "sections_id"=>$sections_id,
	            "class_id"=>$class,
	            "subject_id"=>$sub[0]->id,
	            "teachers_id"=>$teacher, 
	        );
			// print_r($target);exit();
	    $this->db->where(array( 'id' => $id));
		$this->db->update('subject_allocation', $target);
		return true;  
        }
    }
    function subject_allocation_show(){   
	    $this->db->select('b.*,sub.subject,s.sections,s.class_id,t.teacher_name');
		$this->db->from('subject_allocation b');   
	    $this->db->join('sections s', 'b.sections_id=s.id', 'left');
	    $this->db->join('subject sub', 'b.subject_id=sub.id', 'left');
	    $this->db->join('teachers t', 'b.teachers_id=t.id', 'left');
	    $this->db->where(array( 'b.school_id' => $this->session->userdata['school'])); 
		$query = $this->db->get(); 
		if($query)
	    { 
	        return $query->result();
	    } 
    }  
    
    function subject_allocation_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('subject_allocation');
		if($query)
	    {
	        return true;
	    } 
    }    
    
    function subject_allocation_id($teacher){
        $query = $this->db->select('sa.subject,s.sections_id')
        ->from('subject_allocation s')
        ->join('subject sa','sa.id = s.subject_id','left')
        ->where(array('s.teachers_id' => $teacher))
        ->get();
        return $query->result();
    }
    
    
	function get_allocated_classes($teacher){
		$query = $this->db->select('class_id')
						->from('subject_allocation')
						->group_by('class_id')
						->where(array('teachers_id' => $teacher))
						->get();
		return $query->result();
	}

	function get_alloc_sections($teacher, $class){
		$query = $this->db->select('s.id, s.sections')
						->from('sections s')
						->join('subject_allocation sa','sa.sections_id = s.id','left')
						->where(array('sa.teachers_id' => $teacher, 'sa.class_id'=> $class))
						->get();
		log_message('debug',$this->db->last_query());
		return $query->result();
	}

	function get_alloc_subjects($teacher, $section){
		$query = $this->db->select('s.id, s.subject')
						->from('subject s')
						->join('subject_allocation sa', 'sa.subject_id = s.id','left')
						->where(array('sa.teachers_id' => $teacher, 'sa.sections_id' => $section))
						->get();
		return $query->result();
	}
}
?>
