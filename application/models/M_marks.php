<?php
class m_marks extends CI_Model { 
    function marks_add($teacher_id,$student_id,$date,$exam_type,$marks,$out_of,$subject,$competence,$percentage,$school,$class,$section,$roll_no,$evaluation_type,$pa){ 
        $this->db->select("*");
        $this->db->from('marks');
        $this->db->where(array( 'students_id' => $student_id));
        $this->db->where(array( 'subject' => $subject));
        $this->db->where(array( 'exam_type_id' => $exam_type)); 
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	    $target = array(  	
    	        "students_id" => $student_id,
    	        "teacher_id" => $teacher_id,
    	        "date" => $date,
    	        'exam_type_id' => $exam_type,
    	        "marks" => $marks, 
    	        "out_of" => $out_of,
    	        "subject" => $subject,
    	        "competence" => $competence,
    	        "percentage" => $percentage,
    	        "school_id" => $school,
    	        "created_date"=>date('Y-m-d'),
    	        "created_by"=>$this->session->userdata['id'],
    	        "class_id" => $class,
    	        "sections_id" => $section,
    	        "roll_no" => $roll_no,
    	        "evaluation_type" => $evaluation_type,
    	        "pa" => $pa,
    			);   
    	   $q = $this->db->insert('marks', $target);
//     	    print_r($target);print_r($q);exit();
    	   if($q){
    		return true;
    	   }
        }
    }
    function marks_edit($id,$teacher_id,$student_id,$date,$exam_type,$marks,$out_of,$subject,$competence,$percentage,$school,$class,$section,$roll_no,$evaluation_type,$pa){ 
        $this->db->select("*");
        $this->db->from('marks');
        $this->db->where(array( 'students_id' => $student_id));
        $this->db->where(array( 'subject' => $subject));
        $this->db->where(array( 'marks' => $marks));
        $this->db->where(array( 'out_of' => $out_of));
        $this->db->where(array( 'date' => $date));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
         
            $target = array(
                "students_id" => $student_id,
                "teacher_id" => $teacher_id,
                "date" => $date,
                "exam_type_id" => $exam_type,
                "marks" => $marks,
                "out_of" => $out_of,
                "subject" => $subject,
                "competence" => $competence,
                "percentage" => $percentage,
                "school_id" => $school,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
                "class_id" => $class,
                "sections_id" => $section,
                "roll_no" => $roll_no,
                "evaluation_type" => $evaluation_type,
                "pa" => $pa,
                
            );   
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('marks', $target);
    		return true;
        }
    }
    function marks_show(){  
		$this->db->select('s.student_name,s.roll_number,f.*,t.teacher_name,ex.type,sec.sections');
		$this->db->from('marks f');
		$this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
		$this->db->join('students s', 'f.students_id=s.id', 'left');
		$this->db->join('teachers t', 'f.teacher_id=t.id', 'left');
		$this->db->join('exam_type ex', 'f.exam_type_id=ex.id', 'left'); 
		$this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
		$this->db->where(array( 's.active' => 1));
		
		$query = $this->db->get(); 
		
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function marks_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('marks');
		if($query)
	    {
	        return true;
	    } 
    } 
    
    
    
    function marks_class_sel($class_id,$section_id){
        $this->db->select('s.student_name,s.roll_number,f.*,c.class,sec.sections');
        $this->db->from('marks f');
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
    
    
    //App Functions
    
    function marks_show_app($school_id){
        
        $this->db->select('s.student_name,s.roll_number,f.*,t.teacher_name');
        $this->db->from('marks f');
        $this->db->join('students s', 'f.students_id=s.id', 'left');
        $this->db->join('teachers t', 'f.teacher_id=t.id', 'left');
        $this->db->where(array( 'f.school_id' => $school_id ));
        $this->db->where(array( 's.active' => 1));
         
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function marks_id_show_app($school_id,$student_id,$exam_type){
        
        $this->db->select('*');
        $this->db->from('marks');  
        $this->db->where(array( 'school_id' => $school_id ));
        $this->db->where(array( 'students_id' => $student_id ));
        $this->db->where(array( 'exam_type_id' => $exam_type ));
        
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
 
}
?>
