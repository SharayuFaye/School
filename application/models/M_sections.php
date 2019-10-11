<?php
class m_sections extends CI_Model { 
    function sections_add($school,$class,$sections,$subject,$teacher){  
	    
	    $this->db->select("*");
	    $this->db->from('sections');
	    $this->db->where(array( 'school_id' => $school));
	    $this->db->where(array( 'class_id' => $class));
	    $this->db->where(array( 'sections' => $sections)); 
	    $query = $this->db->get();
	    if($query->num_rows() == 0 ){
	        $target = array(
	            "school_id"=>$school,
	            "sections"=>$sections,
	            "class_id"=>$class,
	            "subject"=>$subject,
	            "teachers_id"=>$teacher,
	            "created_date"=>date('Y-m-d'),
	            "created_by"=>$this->session->userdata['id'],
	        );
	        $this->db->insert('sections', $target);
	          
	        $checkbox = explode(',',$subject);
	        for($i=0;$i<count($checkbox);$i++){
	            $sub = $checkbox[$i];
	            
	            $this->db->select("*");
	            $this->db->from('subject');
	            $this->db->where(array( 'school_id' => $school)); 
	            $this->db->where(array( 'subject' =>$sub ));
	            $query = $this->db->get(); 
	            
	           if($query->num_rows() == 0){
    	            $target = array(
    	                "school_id"=>$school,
    	                "subject"=>$sub ,
    	                "created_date"=>date('Y-m-d'),
    	                "created_by"=>$this->session->userdata['id'],
    	            );
    	            $this->db->insert('subject', $target);
	            }
	        }
	        return true;
	    }
	     
    }
    function sections_edit($id,$school,$class,$sections,$subject,$teacher){ 
        $this->db->select("*");
        $this->db->from('sections'); 
        $this->db->where(array( 'class_id' => $class));
        $this->db->where(array( 'sections' => $sections));
        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() ==0 ){
            $target = array(  	 
            	"sections"=>$sections,
                "class_id"=>$class,
                "subject"=>$subject,
                "teachers_id"=>$teacher,
                "updated_date"=>date('Y-m-d'),
                "updated_by"=>$this->session->userdata['id'],
			);    
	    $this->db->where(array( 'id' => $id));
		$this->db->update('sections', $target);
		
		  $checkbox = explode(',',$subject);
		   
		for($i=0;$i<count($checkbox);$i++){
		     $sub = $checkbox[$i];
		    
		    $this->db->select("*");
		    $this->db->from('subject');
		    $this->db->where(array( 'school_id' => $school));
		    $this->db->where(array( 'subject' =>$sub ));
		    $query = $this->db->get();
		    
		    if($query->num_rows() == 0){
		        $target = array(
		            "school_id"=>$school,
		            "subject"=>$sub,
		            "updated_date"=>date('Y-m-d'),
		            "updated_by"=>$this->session->userdata['id'],
		        );
		         
		        $this->db->insert('subject', $target);
		    }
		}
		return true;  
        }
    }
    function sections_show(){ 

	    $this->db->select('s.school_name,b.*,c.class,t.teacher_name');
		$this->db->from('sections b'); 
	    $this->db->join('school s', 'b.school_id=s.id', 'left'); 
	    $this->db->join('class c', 'b.class_id=c.id', 'left');
	    $this->db->join('teachers t', 'b.teachers_id=t.id', 'left');
	    $this->db->where(array( 'b.school_id' => $this->session->userdata['school']));
// 	    $this->db->order_by('b.sections','desc'); 
	    
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    function sections_distinct(){
        
        $this->db->select('sections');
        $this->db->from('sections');
        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
        $this->db->distinct();
        $this->db->order_by('sections','asc');
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    function sections_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('sections');
		if($query)
	    {
	        return true;
	    } 
    } 

    function sections_show_id(){ 
	    $this->db->select("id,sections"); 
		$this->db->from('sections'); 
		$this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$this->db->order_by('sections','asc');
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    }
    
    
    function sections_show_classid(){
        $this->db->select("id,sections,class_id");
        $this->db->from('sections');
        $this->db->where(array( 'school_id' => $this->session->userdata['school']));
        $this->db->order_by('sections','asc');
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }


    function sections_fetch($class_id){
        $this->db->select("id,sections,subject"); 
		$this->db->from('sections'); 
		$this->db->where(array( 'class_id' => $class_id ));
		$this->db->where(array( 'school_id' => $this->session->userdata['school']));
		$this->db->order_by('sections','asc');
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    
    function subject_fetch($sec_id){
        $this->db->select("id,sections,subject");
        $this->db->from('sections');
        $this->db->where(array( 'id' => $sec_id ));
        $this->db->order_by('sections','asc');
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    function subject_stud_fetch($student_id){
        
        $this->db->select('s.*');
        $this->db->from('students st');
        $this->db->join('sections s', 'st.sections_id=s.id', 'left'); 
        $this->db->where(array( 'st.id' => $student_id )); 
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    
    public function importData($data) {
        $duplicate = '';
        foreach($data as $row){
            $this->db->select("*");
            $this->db->from('sections');
            $this->db->where(array( 'sections' => $row['sections']));
            $this->db->where(array( 'class_id' => $row['class_id']));
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $target = array(
                    "class_id" => $row['class_id'],
                    "sections" => $row['sections'],
                    "subject" => $row['subject'],
                    "school_id"=>  $this->session->userdata['school'], 
                    "created_date"=>date('Y-m-d'),
                    "created_by"=>$this->session->userdata['id'],
                );
                $this->db->insert('sections', $target);
                 
                $this->db->select("*");
                $this->db->from('subject');
                $this->db->where(array( 'subject' => $row['subject']));
                $this->db->where(array( 'school_id' => $this->session->userdata['school'] ));
                $query = $this->db->get();
                if($query->num_rows() == 0){
                    $target = array(
                        "subject" => $row['subject'],
                        "school_id"=>  $this->session->userdata['school'],
                        "created_date"=>date('Y-m-d'),
                        "created_by"=>$this->session->userdata['id'],
                    );
                    $res =  $this->db->insert('subject', $target);
                    
                    
                }
            }
            else{
                $duplicate[] = $row['sections'];
                
            }
        }
        
        return $duplicate;
    }
    
    function subject_show(){
        $this->db->select('b.*');
        $this->db->from('subject b');
        $this->db->where(array( 'b.school_id' => $this->session->userdata['school']));
        // 	    $this->db->order_by('b.sections','desc');
        
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    
    
    
    //APp functions
    
    
    function sections_show_app($teachers_id){
        
        $this->db->select('s.*, c.class');
        $this->db->from('sections s'); 
        $this->db->join('class c', 'c.id=s.class_id', 'left');
        $this->db->where(array( 's.teachers_id' => $teachers_id));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    function sections_show_distinct_class_app($teachers_id){
        
        $this->db->select(' c.class');
        $this->db->from('sections s');
        $this->db->join('class c', 'c.id=s.class_id', 'left');
        $this->db->where(array( 's.teachers_id' => $teachers_id)); 
        $this->db->distinct();
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    function sections_class_app($class,$school_id){
        
        $this->db->select('s.*');
        $this->db->from('sections s');
        $this->db->join('class c', 'c.id=s.class_id', 'left');
        $this->db->where(array( 's.class_id' => $class));
        $this->db->where(array( 's.school_id' => $school_id)); 
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
}
?>