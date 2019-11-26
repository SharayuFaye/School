<?php
class m_faq extends CI_Model { 
    
    
    function faq_add($questions,$answers,$date,$school){
        $this->db->select("*");
        $this->db->from('faq');
        $this->db->where(array( "questions"=>$questions ));
        $this->db->where(array( 'school_id' =>$this->session->userdata['school']));
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $target = array(
                "questions"=>$questions,
                "answers"=>$answers,
                "date"=>$date, 
                "school_id"=>$school,
                "created_date"=>date('Y-m-d'),
                "created_by"=>$this->session->userdata['id'], 
            );
            $this->db->insert('faq', $target);
            return true;
        }
    }
    function faq_edit($id,$questions,$answers,$date,$school){
        $this->db->select("*");
        $this->db->from('faq');
        $this->db->where(array( "questions"=>$questions ));
        $this->db->where('id!=', $id);
        $this->db->where(array( 'school_id' =>$this->session->userdata['school']));
        
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $target = array(
                "questions"=>$questions,
                "answers"=>$answers,
                "date"=>$date, 
                "school_id"=>$school,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
            );
            
            $this->db->where(array( 'id' => $id));
            $this->db->update('faq', $target);
            return true;
        }
    }
    function faq_show(){
        
        
        $this->db->select('h.*,s.school_name');
        $this->db->from('faq h');
        $this->db->join('school s', 'h.school_id=s.id', 'left');
        $this->db->where(array( 'h.school_id' =>$this->session->userdata['school']));
        
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function faq_show_id($id){
        $this->db->select("*");
        $this->db->from('faq');
        $this->db->where(array( 'id' => $id));
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function faq_delete($id){
        $this->db->where(array( 'id' =>$id));
        $query = $this->db->delete('faq');
        if($query)
        {
            return true;
        }
    } 
    
    //App Functions
    
    function faq_show_app($school_id){
        $this->db->select('f.*');
        $this->db->from('faq f'); 
        $this->db->where(array( 'f.school_id' => $school_id ));
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
}
?>