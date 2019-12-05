<?php
class m_add_attendance extends CI_Model {
    function add_attendance_add($class,$section,$date,$teacher_id,$attendance, $status){
        
        $query = $this->db->select('a.*')
                        ->from('attendance a')
                        ->where(array(
                            'a.sections_id' => $section,
                            'a.students_id' => $attendance,
                            'a.date' => date("Y-m-d",strtotime(date($date)))
                        ))
                        ->get();
                        
        $target = array(
            "attendance"	=> $status ,
            "class_id"		=> $class ,
            "sections_id"	=> $section,
            "date"			=> date("Y-m-d",strtotime(date($date))),
            "teachers_id"	=> $teacher_id,
            "students_id"	=> $attendance,
            "created_date"	=> date('Y-m-d'),
            "created_by"	=>  $this->session->userdata['id'],
            "school_id"		=>  $this->session->userdata['school'],
        );
        if($query->num_rows() == 0){
            $queryA =  $this->db->insert('attendance', $target);
            
        }else{
            $atttandance = $query->result();
            $this->db->where(array( 'id' => $atttandance[0]->id));
            $queryA =  $this->db->update('attendance', $target);
        }
        
        if($queryA)
        {
            return 'true';
        }
    } 
    
    function class_show_teacher($users_id){
        $this->db->select('c.id,c.class');
        $this->db->from('teachers f');
        $this->db->join('sections sec', 'f.id=sec.teachers_id', 'left');
        $this->db->join('class c', 'c.id=sec.class_id', 'left');
        $this->db->where(array( 'f.users_id' => $users_id));
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        $this->db->distinct('sec.class_id');
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    function attendance_sections_fetch($class_id){
        $this->db->select("sec.id,sec.sections,sec.subject");
        $this->db->from('sections sec');
        if($this->session->userdata['role'] =='teacher'){
            $this->db->join('teachers f', 'f.id=sec.teachers_id', 'left');
            $this->db->where(array( 'f.users_id' =>  $this->session->userdata['id']));
        }
        $this->db->where(array( 'sec.class_id' => $class_id ));
        $this->db->where(array( 'sec.school_id' => $this->session->userdata['school']));
        $this->db->order_by('sec.sections','asc');
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    function add_attendance_show_sel($section,$date){
        
        $query = $this->db->select('s.id, s.student_name, s.roll_number, a.attendance')
        ->from('attendance a')
        ->join('students s', 's.id = a.students_id', 'left')
        ->where(array(
            'a.sections_id' => $section,
            'a.date' => date("Y-m-d",strtotime(date($date)))
        ))
        ->get();
        log_message('debug',$this->db->last_query());
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            $this->db->select('stud.id,stud.student_name,stud.roll_number');
            $this->db->from('students stud');
            $this->db->join('sections s', 's.id=stud.sections_id', 'left');
            $this->db->where(array( 's.id' =>$section));
            $this->db->where( 'stud.join_date <=', $date);
            
            $query = $this->db->get();
            
            if($query)
            {
                return $query->result();
            }
        }
    }
    
   
    
    
   
    
    
}
?>
