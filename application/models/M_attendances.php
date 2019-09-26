<?php
class m_attendances extends CI_Model { 
     
    function attendances_show(){  
		$this->db->select('s.student_name,s.roll_number,a.*,c.class,sec.sections,t.teacher_name');
		$this->db->from('attendance a');
		$this->db->join('students s', 'a.students_id=s.id', 'left');
		$this->db->join('class c', 'a.class_id=c.id', 'left');
		$this->db->join('sections sec', 'a.sections_id=sec.id', 'left');
		$this->db->join('teachers t', 'a.teachers_id=t.id', 'left');
		$this->db->where(array( 'a.school_id' => $this->session->userdata['school']));
		
		$query = $this->db->get(); 
		
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    function attendances_class_show(){
        $this->db->select('s.student_name,s.roll_number,a.attendance,c.class');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');
        $this->db->join('class c', 'a.class_id=c.id', 'left'); 
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school'])); 
        
        $query = $this->db->get();
//         print_r($query->result());exit();
        if($query)
        {
            return $query->result();
        }
    } 
    
    //App Functions
    
    
    function attendances_show_app($user_id){
        
        $this->db->select('stud.student_name,stud.roll_number,a.*');
        $this->db->from('attendance a');
        $this->db->join('students stud', 'stud.id=a.students_id' ,'left');
        $this->db->join('sections s', 's.id=stud.sections_id', 'left');
        $this->db->join('teacher t', 't.id=s.teachers_id', 'left');
        $this->db->where(array( 'stud.users_id' => $user_id )); 
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
    
    function attendances_app($user_id){
        
        $this->db->select('stud.student_name,stud.roll_number,a.*');
        $this->db->from('attendance a');
        $this->db->join('students stud', 'stud.users_id='.$user_id, 'left');
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function attendance_add_app($class,$section,$date,$teacher_id,$attend,$school_id,$users_id){
        
        $target = array( 
            "attendance"=>'1' ,
            "class"=>$class ,
            "section"=>$section,
            "date"=>$date,
            "teacher_id"=>$teacher_id,
            "students_id"=>$attend,
            "created_date"=>date('Y-m-d'),
            "created_by"=>$users_id,
            "school_id"=>$school_id,
        );
        $query =  $this->db->insert('attendance', $target);
        
        if($query)
        {
            return 'true';
        }
    } 
    
    
    
    
    function attendance_app($class,$section,$date,$teacher_id,$school_id){ 
        
        $this->db->select('stud.id,stud.student_name,stud.roll_number');
        $this->db->from('students stud');
        $this->db->join('sections s', 's.id=stud.sections_id', 'left');
        $this->db->where(array( 's.id' =>$section));  
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    } 
}
?>