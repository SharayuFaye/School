<?php
class m_login extends CI_Model { 
	function check($username,$password){ 
		$this->db->select("*"); 
		$this->db->from('users'); 
		$this->db->where(array( 'username' => $username));
		$this->db->where(array( 'password' => $password)); 
		$query = $this->db->get();  
		
		if($query->num_rows() == 0){
			$data = 'False';
			return $data;
		}	
		else{
		    $data = $query->result() ;
			return $query->result();
		} 
    } 
    
    //App Functions
    
    
    function set_gcm($token,$gcm){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where(array( 'token' => $token));
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $target = array(
                "gcm" => $gcm
            );
            $this->db->insert('users', $target);
            return true;
        }else{
            $target = array(
                "gcm" => $gcm
            );
            $this->db->where(array( 'token' => $token));
            $this->db->update('users', $target);
            return true;
        }
    }
    
    function set_token($id,$token,$fcm_token){
//         $this->db->select("*");
//         $this->db->from('users');
//         $this->db->where(array( 'id' => $id));
//         $query = $this->db->get();
//         if($query->num_rows() == 0){
//             $target = array(
//                 "token" => $token 
//             );
//             $this->db->insert('users', $target);
//             return true;
//         }else{
            $target = array(
                "token" => $token,
                "fcm_token" => $fcm_token
            );
            $this->db->where(array( 'id' => $id));
            $this->db->update('users', $target);
            return true; 
//         }
    }

    function getFCMtokens($condition){
	    $this->db->select("fcm_token");
	    $this->db->from("users");
	    $this->db->where($condition);
	    $query = $this->db->get();
	    $data = [];
	    foreach($query->result() as $rec){
		    if($rec->fcm_token != ""){
			    array_push($data,$rec->fcm_token);
		    }
	    }
	    return($data);
    }
    
    
    function get_users($token){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where(array( 'token' => $token)); 
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $data = 'False';
            return $data;
        }
        else{
            $data = $query->result() ;
            return $data;
        } 
    }
    
    function check_password($token,$old_password){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where(array( 'token' => $token));
        $this->db->where(array( 'password' => $old_password));
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $data = 'True';
            return $data;
        }
        else{
            $data = 'False';
            return $data;
        } 
    }
    
    function check_username($username){
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where(array( 'username' => $username));
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $data = 'True';
            return $data;
        }
        else{
            $data = 'False';
            return $data;
        } 
    }
    function set_password($token,$password){ 
        $target = array(
            "password" => $password
        );
        $this->db->where(array( 'token' => $token));
        $this->db->update('users', $target);
        return true; 
    }

    function set_forget_password($username,$password){ 
        $target = array(
            "password" => $password
        );
        $this->db->where(array( 'username' => $username));
        $this->db->update('users', $target);
        return true; 
    }
    
    
    function logout($token){
        $target = array(
            "token" => '',
            "fcm_token" => ''
        );
        $this->db->where(array( 'token' => $token));
        $this->db->update('users', $target);
        return true;
    }
}
?>
