<?php
class m_roles extends CI_Model { 
	function roles_add($role){ 
		$this->db->select("*"); 
		$this->db->from('roles'); 
		$this->db->where(array( 'role_name' => $role));
		$query = $this->db->get(); 
		if($query->num_rows() == 0){
		    $target = array(  	
				"role_name"=>$role,
				);   
			$this->db->insert('roles', $target);
			return true;
		}	 
    }
    function roles_edit($id,$role){ 
	   $target = array(  	
			"role_name"=>$role,
			);   
	    $this->db->where(array( 'id' => $id));
		$this->db->update('roles', $target);
		return true; 
    }
    function roles_show(){ 
	    $this->db->select("*"); 
		$this->db->from('roles'); 
		$query = $this->db->get(); 
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    function roles_delete($id){ 
		$this->db->where(array( 'id' =>$id));
		$query = $this->db->delete('roles');
		if($query)
	    {
	        return true;
	    } 
    } 

}
?>