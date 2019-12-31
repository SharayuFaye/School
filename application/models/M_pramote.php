<?php
class m_pramote extends CI_Model {
    function pramote_add($users_id,$section,$teacher_id,$student_id, $status){
        
        $query = $this->db->select('a.*')
                        ->from('sections a')
                        ->where(array(
                            'a.id' => $section , 'a.school_id' => $this->session->userdata['school']
                        ))
                        ->get();
        $section_data = $query->result(); 
        if($section_data){
            $query = $this->db->select('a.*')
            ->from('sections a')
            ->where(array(
                'a.sections' => $section_data[0]->sections,
                'a.class_id' => $section_data[0]->class_id+1,
                'a.school_id' => $this->session->userdata['school']
            ))
            ->get();
            $section_new = $query->result();
            if($section_new){
                if($status == 'pramoted'){
                    $target = array(  
                        "sections_id"	=> $section_new[0]->id,
                        "class_id"	=> $section_new[0]->class_id,  
                    ); 
                    $this->db->where(array( 'id' => $student_id));
                    $queryA =  $this->db->update('students', $target);
                }
              
                
                $target = array(
                    "status"	=> $status ,
                    "students_id"		=> $student_id ,
                    "sections_id"	=> $section,
                    "date"			=> date("Y-m-d"), 
                    "created_by"	=> $users_id,
                    "school_id"		=>  $this->session->userdata['school'],
                );
        //         if($query->num_rows() == 0){
                    $queryA =  $this->db->insert('pramote', $target);
                    
        //         }else{
        //             $atttandance = $query->result();
        //             $this->db->where(array( 'id' => $atttandance[0]->id));
        //             $queryA =  $this->db->update('attendance', $target);
        //         }
                
                if($queryA)
                {
                    
                    
                    
                    return 'true';
                }
            }
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
    
    
    
    function pramote_show_sel($section){
        
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
