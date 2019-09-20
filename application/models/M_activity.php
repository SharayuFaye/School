<?php
class m_activity extends CI_Model { 
    
    function activity_add($activity,$details,$date,$submission_date,$class,$section,$school){
        if($activity !='' && $date!='' && $section!=''){
            $this->db->select("*");
            $this->db->from('activity');
            $this->db->where(array( 'activity' => $activity ));
            $this->db->where(array( "school_id" => $school ));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'class_id' => $class));
            $query = $this->db->get();
            if($query->num_rows() == 0){
                    $target = array( 
                    "activity"=>$activity,
                    "details"=>$details,
                    "date"=>$date,
                    "submission_date"=>$submission_date,
                    "class_id"=>$class,
                    "sections_id"=>$section,
                    "school_id"=>$school,
                    "created_date"=>date('Y-m-d'),
                    "created_by"=>$this->session->userdata['id'], 
                );
                     
                $this->db->insert('activity', $target);
                return true;
            }
        }
    }
    function activity_edit($id,$activity,$details,$date,$submission_date,$class,$section,$school){
        if($activity !='' && $date!='' && $section!=''){
            $this->db->select("*");
            $this->db->from('activity');
            $this->db->where(array( 'activity' => $activity ));
            $this->db->where(array( "school_id" => $school ));
            $this->db->where(array( 'date' => $date));
            $this->db->where(array( 'class_id' => $class));
            $this->db->where('id!=', $id);
            $query = $this->db->get();
            if($query->num_rows() == 0){
                    $target = array( 
                    "activity"=>$activity,
                    "details"=>$details,
                    "date"=>$date,
                    "submission_date"=>$submission_date,
                    "class_id"=>$class,
                    "sections_id"=>$section,
                    "school_id"=>$school,
                    "updated_date"=>date('Y-m-d'),
                    "updated_by"=>$this->session->userdata['id'],
                );
                
                $this->db->where(array( 'id' => $id));
                $this->db->update('activity', $target);
                return true;
            }
        }
    }
    function activity_show(){
        
        
        $this->db->select('h.*,s.school_name,c.class,sec.sections');
        $this->db->from('activity h');
        $this->db->join('school s', 'h.school_id=s.id', 'left');
        $this->db->join('class c', 'h.class_id=c.id', 'left');
        $this->db->join('sections sec', 'h.sections_id=sec.id', 'left');
        $this->db->where(array( 'h.school_id' => $this->session->userdata['school']));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function activity_show_id($id){
        $this->db->select("*");
        $this->db->from('activity');
        $this->db->where(array( 'id' => $id));
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function activity_delete($id){
        $this->db->where(array( 'id' =>$id));
        $query = $this->db->delete('activity');
        if($query)
        {
            return true;
        }
    } 
    //App Functions
    
    function activity_show_app($school_id){
        $this->db->select('f.*,c.class ,sec.sections');
        $this->db->from('activity f');
        $this->db->join('class c', 'f.class_id=c.id', 'left'); 
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where(array( 'f.school_id' => $school_id ));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }


    function activity_show_week_app($school_id,$start,$end){
        $this->db->select('f.*,c.class ,sec.sections');
        $this->db->from('activity f');
        $this->db->join('class c', 'f.class_id=c.id', 'left'); 
        $this->db->join('sections sec', 'f.sections_id=sec.id', 'left');
        $this->db->where('f.date >=', $start);
        $this->db->where('f.date <=', $end);
        $this->db->where(array( 'f.school_id' => $school_id ));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
}
?>