<?php
class m_homework extends CI_Model { 
    function homework_add($class,$section,$date,$subject,$details,$image,$teacher_id,$submission_date,$school){ 
        if($subject!=''){
            $this->db->select("*");
            $this->db->from('homework');
            $this->db->where(array( 'sections_id' => $section));
            $this->db->where(array( 'class_id' => $class));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'subject' => $subject));
            $this->db->where(array( 'teacher_id' => $teacher_id));
            $query = $this->db->get();
            if($query->num_rows() == 0){ 
                $target = array( 
                "class_id"=>$class,
                "sections_id"=>$section,
                "date"=>$date, 
                "subject"=>$subject,
                "details"=>$details,
                "image"=>$image,
                "teacher_id"=>$teacher_id,
                "submission_date"=>$submission_date,
                "school_id"=>$school, 
                "created_date"=>date('Y-m-d'),
                "created_by"=>$this->session->userdata['id'], 
            ); 
            $this->db->insert('homework', $target);
            return true; 
            }
        }
    }
    function homework_edit($id,$class,$section,$date,$subject,$details,$image,$teacher_id,$submission_date,$school){ 
        if($subject!=''){
            $this->db->select("*");
            $this->db->from('homework');
            $this->db->where(array( 'sections_id' => $section));
            $this->db->where(array( 'class_id' => $class));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'subject' => $subject));
            $this->db->where(array( 'teacher_id' => $teacher_id));
            $this->db->where('id!=', $id);
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                    "class_id"=>$class,
                    "sections_id"=>$section,
                    "date"=>$date,
                    "subject"=>$subject,
                    "details"=>$details,
                    "image"=>$image,
                    "teacher_id"=>$teacher_id,
                    "submission_date"=>$submission_date,
                    "school_id"=>$school, 
                    "updated_date"=>date('Y-m-d'),
                    "updated_by"=>$this->session->userdata['id'],
                );
        
                $this->db->where(array( 'id' => $id));
                $this->db->update('homework', $target);
                return true;
            }
        }
    }
    function homework_show(){
        
         
        $this->db->select('h.*,s.school_name,c.class,sec.sections,t.teacher_name');
        $this->db->from('homework h');
        $this->db->join('school s', 'h.school_id=s.id', 'left');
        $this->db->join('class c', 'h.class_id=c.id', 'left');
        $this->db->join('sections sec', 'h.sections_id=sec.id', 'left');
        $this->db->join('teachers t', 'h.teacher_id=t.id', 'left');
        $this->db->where(array( 'h.school_id' => $this->session->userdata['school']));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function homework_show_id($id){
        $this->db->select("*");
        $this->db->from('homework');
        $this->db->where(array( 'id' => $id));
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function homework_delete($id){
        $this->db->where(array( 'id' =>$id));
        $query = $this->db->delete('homework');
        if($query)
        {
            return true;
        }
    } 
    
    //App Functions
    
    function homework_show_app($school_id,$student_id){
        $this->db->select('f.*');
        $this->db->from('homework f');
        $this->db->join('students s', 's.sections_id=f.sections_id', 'left'); 
        $this->db->where(array( 's.id' => $student_id ));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }

	/*Add homework record from the app*/
	function add_homework($data){
		$this->db->insert('homework', $data);
		return $this->get_teacher_hw($data['teacher_id']);
	}

	/*Get the homework set by the teacher*/
	function get_teacher_hw($teacher_id){
		$query = $this->db->select('h.*, s.sections')
						->from('homework h')
						->join('sections s', 'h.sections_id = s.id','left')
						->where(array('h.teacher_id' => $teacher_id))
						->get();
						
		log_message('debug',$this->db->last_query());
		return $query->result();
	}
    
    
}
?>
