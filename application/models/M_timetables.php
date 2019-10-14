<?php
class m_timetables extends CI_Model {
    function timetables_add($class,$section,$subject,$details,$school){
        if($subject !=''  ){
            $this->db->select("*");
            $this->db->from('timetable');
            $this->db->where(array( 'sections_id' => $section ));
            $this->db->where(array( "class_id" => $class ));
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                    "class_id" => $class,
                    "sections_id" => $section,
                    "subject" => $subject,
                    "details" => $details,
                    "school_id" => $school,
                    "date"=>date('Y-m-d'),
                    "created_date"=>date('Y-m-d'),
                    "created_by"=>$this->session->userdata['id'],
                );
                $this->db->insert('timetable', $target);
                return true;
            }
        }
    }
    function timetables_edit($id,$class,$section,$subject,$details,$school){
        if($subject !=''  ){
            $this->db->select("*");
            $this->db->from('timetable');
            $this->db->where(array( 'sections_id' => $section ));
            $this->db->where(array( "class_id" => $class ));
            $this->db->where('id!=', $id);
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                    "class_id" => $class,
                    "sections_id" => $section,
                    "subject" => $subject,
                    "details" => $details,
                    "school_id" => $school,
                    "date"=>date('Y-m-d'),
                    "updated_date"=>date('Y-m-d'),
                    "updated_by"=>$this->session->userdata['id'],
                );
                
                $this->db->where(array( 'id' => $id));
                $this->db->update('timetable', $target);
                return true;
            }
        }
    }
    function timetables_show(){
        $this->db->select('f.*,c.class,sec.sections');
        $this->db->from('timetable f');
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function class_show_teacher($users_id){
        $this->db->select('c.class');
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
    
    
    
    function timetable_sections_fetch($class_id){
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
    
    
    
    function timetables_show_sel($class_id,$section_id){
        $this->db->select('f.*,c.class,sec.sections');
        $this->db->from('timetable f');
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'f.class_id' => $class_id ));
        $this->db->where(array( 'f.sections_id' => $section_id ));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    function timetables_delete($id){
        $this->db->where(array( 'id' =>$id));
        $query = $this->db->delete('timetable');
        if($query)
        {
            return true;
        }
    }
    
    
    
    function timetables_class_sel($class_id,$section_id){
        $this->db->select('s.student_name,s.roll_number,f.*,c.class,sec.sections');
        $this->db->from('timetable f');
        $this->db->join('students s', 'f.students_id=s.id', 'left');
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.school_id' => $this->session->userdata['school']));
        
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
    
    function timetables_show_app($class,$section){
        
        
        $this->db->select('f.*,c.class,sec.sections');
        $this->db->from('timetable f');
        $this->db->join('class c', 'f.class_id=c.id', 'left');
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.class_id' => $class ));
        $this->db->where(array( 'f.sections_id' => $section ));
        
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
}
?>