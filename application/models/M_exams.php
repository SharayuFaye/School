<?php
class m_exams extends CI_Model { 
    function exams_add($class,$section,$date,$time,$subject,$exam_type_id,$school){  
        if($subject !='' && $date!='' && $exam_type_id!=''){
            $this->db->select("*");
            $this->db->from('exams');
            $this->db->where(array( 'sections_id' => $section));
            $this->db->where(array( 'exam_type_id' => $exam_type_id));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'time' => $time)); 
            $query = $this->db->get();
            if($query->num_rows() == 0){
            $target = array(
                "class_id" => $class,
                "sections_id" => $section,
                "date" => $date,
                "time" => $time,
                "subject" => $subject,
                "exam_type_id" => $exam_type_id,
                "school_id" => $school,
                "created_date"=>date('Y-m-d'),
                "created_by"=>$this->session->userdata['id'], 
             );   
    		$this->db->insert('exams', $target);
    		return true; 
            }
        }
    }
    function exams_edit($id,$class,$section,$date,$time,$subject,$exam_type_id,$school){  
        if($subject !='' && $date!='' && $exam_type_id!=''){
            
            $this->db->select("*");
            $this->db->from('exams');
            $this->db->where(array( 'sections_id' => $section));
            $this->db->where(array( 'exam_type_id' => $exam_type_id));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'time' => $time));
            $this->db->where('id!=', $id);
            
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                "class_id" => $class,
                "sections_id" => $section,
                "date" => $date,
                "time" => $time,
                "subject" => $subject,
                "exam_type_id" => $exam_type_id,
                "school_id" => $school,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
    			);   
    	   // print_r($id);exit();
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('exams', $target);
    		return true;
           }
        }
    }
    function exams_show(){ 

	    $this->db->select('s.school_name,b.*,c.class,sec.sections,e.type');
		$this->db->from('exams b'); 
		$this->db->join('school s', 'b.school_id=s.id', 'left');
		$this->db->join('class c', 'b.class_id=c.id', 'left');
		$this->db->join('sections sec', 'b.sections_id=sec.id', 'left');
		$this->db->join('exam_type e', 'b.exam_type_id=e.id', 'left');
		$this->db->where(array( 'b.school_id' => $this->session->userdata['school']));

		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
 

    function exams_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('exams');
		if($query)
	    {
	        return true;
	    } 
    } 



    function exams_show_id(){ 
	    $this->db->select("id,exams"); 
		$this->db->from('exams'); 
		$this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$this->db->order_by('exams','asc'); 
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 

    
    //App Functions
    
    function exams_show_app($school_id){
        
        $this->db->select('s.school_name,b.*,c.class,sec.sections,e.type');
        $this->db->from('exams b'); 
        $this->db->join('class c', 'b.class_id=c.id', 'left');
        $this->db->join('sections sec', 'b.sections_id=sec.id', 'left');
        $this->db->join('exam_type e', 'b.exam_type_id=e.id', 'left');
        $this->db->join('school s', $school_id.'=s.id', 'left'); 
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
}
?>