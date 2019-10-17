<?php
class m_class extends CI_Model { 
	function class_add($school,$class){  
	    
	    $this->db->select("*");
	    $this->db->from('class'); 
	    $this->db->where(array( 'class' => $class));
	    $query = $this->db->get();
	    if($query->num_rows() == 0){
	        $target = array( 
	            "class"=>$class,
	        );
	        $this->db->insert('class', $target);
	        return true; 
	    }
	    
		   
    }
    function class_edit($id,$school,$class){ 
	   $target = array(  	 
				"class"=>$class,
			);   
	   // print_r($id);exit();
	    $this->db->where(array( 'id' => $id));
		$this->db->update('class', $target);
		return true; 
    }
    function class_show(){ 

	    $this->db->select('b.class_id as class,b.class_id as id');
		$this->db->from('sections b');    

		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
 

    function class_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('class');
		if($query)
	    {
	        return true;
	    } 
    } 



    function class_show_id(){ 
        $this->db->select('b.class_id as class,b.class_id as id'); 
		$this->db->from('sections b');  
		$this->db->order_by('b.class_id','asc');
		$this->db->distinct('b.class_id'); 
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    function class_show_all(){
        $this->db->select('b.*');
        $this->db->from('class b');
        $this->db->order_by('b.class','asc'); 
        $query = $this->db->get();
        if($query)
        {
            return $query->result();
        }
    } 
}
?>