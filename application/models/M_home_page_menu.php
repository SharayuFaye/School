<?php
class m_home_page_menu extends CI_Model { 
	function home_page_menu_add($menu_name,$page_name,$school){ 
		$this->db->select("*"); 
		$this->db->from('home_page_menu'); 
		$this->db->where(array( 'menu_name' => $menu_name));
		$this->db->where(array( 'page_name' => $page_name));
		$this->db->where(array( 'school_id' => $school));
		$query = $this->db->get(); 
		if($query->num_rows() == 0){
		    $target = array(  	
				"menu_name"=>$menu_name,
				"page_name"=>$page_name,
		        "school_id"=>$school,
		        "created_date"=>date('Y-m-d'),
		        "created_by"=>$this->session->userdata['id'], 
				);   
			$this->db->insert('home_page_menu', $target);
			return true;
		}	 
    }
    function home_page_menu_edit($id,$menu_name,$page_name,$school){ 
        $this->db->select("*");
        $this->db->from('home_page_menu');
        $this->db->where(array( 'menu_name' => $menu_name));
        $this->db->where(array( 'page_name' => $page_name));
        $this->db->where(array( 'school_id' => $school));
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
    	   $target = array(  	
    				"menu_name"=>$menu_name,
    				"page_name"=>$page_name,
        	       "school_id"=>$school,
        	       "updated_date"=>date('Y-m-d'),
        	       "updated_by"=>$this->session->userdata['id'],
    			);    
     
    	    $this->db->where(array( 'id' => $id));
    		$this->db->update('home_page_menu', $target);
    		return true; 
        }
    }
    function home_page_menu_show(){ 


	    $this->db->select('s.school_name,b.*');
		$this->db->from('home_page_menu b'); 
	    $this->db->join('school s', 'b.school_id=s.id', 'left');   
   		$query = $this->db->get(); 
 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function home_page_menu_show_id($id){ 
	    $this->db->select("*"); 
		$this->db->from('home_page_menu'); 
	    $this->db->where(array( 'id' => $id));
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 


    function home_page_menu_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('home_page_menu');
		if($query)
	    {
	        return true;
	    } 
    } 

    //App Functions
    function home_page_menu_show_app($school_id){
        
        
        $this->db->select('b.*');
        $this->db->from('home_page_menu b');
        $this->db->where(array( 'b.school_id' => $school_id));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    
}
?>