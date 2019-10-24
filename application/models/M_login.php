<?php
class m_login extends CI_Model { 
	function check($username,$password){ 
		$this->db->select("t.*, u.*"); 
		$this->db->from('users u'); 
		$this->db->join('tokens t','t.user_id = u.id', 'left');
		
		log_message('debug',$username . " :: ". $password);
		log_message('debug',$username . " :: ". md5($password));
		if($username == 'admin'){
		    $this->db->where(array( 'u.username' => $username, 'u.password'=> $password));
		}else{
		    $this->db->where(array( 'u.username' => $username, 'u.password'=> md5($password)));
		}
		
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
    
    function check_token($username,$password){
        $this->db->select("t.*, u.*");
        $this->db->from('users u');
		$this->db->join('tokens t','t.user_id = u.id', 'left');
		$this->db->where(array( 'u.username' => $username, 'u.password'=>  md5($password)));
        $this->db->where( array( 't.token' => '', 't.fcm_token'=>'' ));  
        //$this->db->where( array( 'fcm_token' => '' ));   
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
         $this->db->select("*");
         $this->db->from('tokens');
         $this->db->where(array( 'user_id' => $id,
		 						 'fcm_token' => $fcm_token));
         $query = $this->db->get();
         if($query->num_rows() == 0){
             $target = array(
                 "token" => $token,
				 "fcm_token"=>$fcm_token,
				 "user_id"=>$id
             );
             $this->db->insert('tokens', $target);
             return true;
         }else{
            $target = array(
                "token" => $token,
                "fcm_token" => $fcm_token
            );
            $this->db->where(array( 'user_id' => $id));
            $this->db->update('tokens', $target);
            return true; 
         }
    }

    function getFCMtokens($school_id){
	    $this->db->select("t.fcm_token");
	    $this->db->from("tokens t");
		$this->db->join('users u','u.id = t.user_id','left');
	    $this->db->where(array('u.school_id' => $school_id, 'u.notification' => true));
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
        $this->db->select("u.*");
        $this->db->from('users u');
		$this->db->join('tokens t','t.user_id = u.id','left');
        $this->db->where(array( 't.token' => $token)); 
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
        $this->db->select("u.*");
        $this->db->from('users u');
		$this->db->join('tokens t','t.user_id = u.id','left');
        $this->db->where(array( 't.token' => $token));
        $this->db->where(array( 'u.password' => md5($old_password) ));
        $query = $this->db->get();
		log_message('debug',$this->db->last_query());
        if($query->num_rows() > 0){
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
		$user = $this->db->select('u.username')
						->from('users u')
						->join('tokens t','t.user_id = u.id','right')
						->where(array('t.token'=> $token))
						->get()
						->result();
		log_message('debug',$user[0]->username);
        $target = array(
            "password" =>  md5($password)
        );
        $this->db->where(array('username' => $user[0]->username));
        $this->db->update('users', $target);
        return true; 
    }

    function set_forget_password($otp, $username, $password){ 
		$query = $this->db->select('*')
						->from('users')
						->where(array('username' => $username, 'otp' => $otp))
						->get();
		log_message('debug', $this->db->last_query());
		if($query->num_rows() > 0){
        	$target = array(
        	    "password" =>  md5($password)
        	);
        	$this->db->where(array( 'username' => $username));
        	$this->db->update('users', $target);
        	return "Password has been reset successfully";
		}else{
			return "Incorrect OTP entered";
		}
    }

	function set_notification($token, $value){
		$user = $this->db->select('u.username')
						->from('users u')
						->join('tokens t','t.user_id = u.id','right')
						->where(array('t.token'=> $token))
						->get()
						->result();
		log_message('debug',$user[0]->username);
        $target = array(
            "notification" => $value
        );
        $this->db->where(array('username' => $user[0]->username));
        $this->db->update('users', $target);
        return true; 
	}
    
    function logout($token){
        $target = array(
            "token" => '',
            "fcm_token" => ''
        );
        $this->db->where(array( 'token' => $token));
        $this->db->update('tokens', $target);
        return true;
    }

	function update_otp($user, $otp){
		$query = $this->db->select('*')
						->from('users')
						->where(array('username' => $user))
						->get();
		if($query->num_rows() > 0){
			$target = array(
					"otp" => $otp
			);
			$this->db->where(array('username'=> $user));
			$this->db->update('users', $target);
			log_message('debug', $this->db->last_query());
			return true;
		}else{
			return false;
		}
	}

	function get_school($token){
		$query = $this->db->select('s.school_name,s.school_logo')
						->from('school s')
						->join('users u','u.school_id = s.id','left')
						->join('tokens t', 't.user_id = u.id','left')
						->where(array('t.token' => $token))
						->get();
		return $query->result();
	}
}
?>
