<?php
class m_attendances extends CI_Model { 
     
    function attendances_show(){  
		$this->db->select('s.student_name,s.roll_number,a.*,c.class,sec.sections,t.teacher_name');
		$this->db->from('attendance a');
		$this->db->join('students s', 'a.students_id=s.id', 'left');
		$this->db->join('class c', 'a.class_id=c.id', 'left');
		$this->db->join('sections sec', 'a.sections_id=sec.id', 'left');
		$this->db->join('teachers t', 'a.teachers_id=t.id', 'left');
		$this->db->where(array( 'a.school_id' => $this->session->userdata['school']));
		
		$query = $this->db->get(); 
		
		if($query)
	    {
	        return $query->result();
	    } 
    } 
    
    function attendances_class_show(){
        $this->db->select('s.student_name,s.roll_number,a.attendance,c.class');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');
        $this->db->join('class c', 'a.class_id=c.id', 'left'); 
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school'])); 
        
        $query = $this->db->get();
//         print_r($query->result());exit();
        if($query)
        {
            return $query->result();
        }
    } 
    
    
    function leaves_show_id($id){
       // echo $teacher_id;exit();
        
        return $this->db->select('s.class_id, s.sections, l.* , st.student_name')
                    ->from('leaves l')
                    ->join('teachers t','l.approver = t.id','left') 
                    ->join('students st','l.student_id = st.id','left')
                    ->join('sections s','st.sections_id = s.id','left')
                    ->join('users u','u.id = t.users_id','left')
                    ->where(array('u.id' => $id)) 
                    ->get()
                    ->result();
    }
    
    
    function set_leave_admin($leave_id, $status){
        $target = array(
            'status' => $status 
        );
        $d = $this->db->update('leaves',$target, array('id' => $leave_id));
        if($d){
            return '1';
        }else{
            return '2';
        }
    }
    
    
    function attendances_class_sel($class_id,$section_id,$date){
        
        $this->db->select('s.student_name,s.id as stud_id,s.roll_number,a.*,c.class,sec.sections,t.teacher_name');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');
        $this->db->join('class c', 'a.class_id=c.id', 'left');
        $this->db->join('sections sec', 'a.sections_id=sec.id', 'left');
        $this->db->join('teachers t', 'a.teachers_id=t.id', 'left'); 
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'a.class_id' => $class_id ));
        $this->db->where(array( 'a.sections_id' => $section_id ));
        $this->db->where(array( 'a.date' => $date ));
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    function attendances_student_show($student_id,$date){
        
        $this->db->select('s.student_name,s.id as stud_id,s.roll_number,a.*,c.class,sec.sections,t.teacher_name');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');
        $this->db->join('class c', 'a.class_id=c.id', 'left');
        $this->db->join('sections sec', 'a.sections_id=sec.id', 'left');
        $this->db->join('teachers t', 'a.teachers_id=t.id', 'left');
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school'])); 
        $this->db->where(array( 'a.students_id' => $student_id )) 
        ->where("DATE_FORMAT(date,'%Y-%m')", $date);
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function leaves_student_show($student_id,$date){
        
        $this->db->select('s.student_name,s.id as stud_id,s.roll_number,a.*');
        $this->db->from('leaves a');
        $this->db->join('students s', 'a.student_id=s.id', 'left'); 
        $this->db->where(array( 'a.student_id' => $student_id ))
        ->where("DATE_FORMAT(start_date,'%Y-%m')", $date);
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    function attendances_percent_today(){  
        
          $date = date('Y-m-d') . " 00:00:00";
        
        $this->db->select('a.*');
        $this->db->from('attendance a'); 
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'a.attendance' => 'present' ));
        $this->db->where(array( 'a.date' => $date ));   
        $query = $this->db->get();
         
        if($query)
        {
            return $query->result();
        }
    }
    
    
    
    function attendances_percent($month){
        $date = date('Y');
        $from_date = $date .'-'.$month. '-01 00:00:00';
        $to_date = $date  .'-'.$month. "-31 00:00:00";
        
        $this->db->select('a.students_id,s.id');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school'])); 
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $this->db->where(array( 's.active' => 1));
        $query = $this->db->get();
//         print_r($query->result());
        if($query)
        {
            return $query->result();
        }
    }
    
    function attendances_percent_present($month){
        $date = date('Y');
        $from_date = $date .'-'.$month. '-01 00:00:00';
        $to_date = $date  .'-'.$month. "-31 00:00:00";
        
        $this->db->select('a.students_id,s.id');
        $this->db->from('attendance a');
        $this->db->join('students s', 'a.students_id=s.id', 'left');  
        $this->db->where(array( 'a.school_id' => $this->session->userdata['school']));
        $this->db->where(array( 'a.attendance' => 'present' ));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $this->db->where(array( 's.active' => 1));
        $query = $this->db->get();
//         print_r($query->result()); 
        if($query)
        {
            return $query->result();
        }
    }
    
    
    //App Functions
    
    
    function attendances_show_app($user_id, $date){
		if($date == null){
			$date = date('Y-m');
			$from_date = $date . '-01';
			$to_date = date('Y-m-d');
		}else{
			$from_date = $date . "-01";
			$to_date = $date . "-31";
		}

		log_message('debug',"From date : " . $from_date);
		log_message('debug',"To date : " . $to_date);
        
        $this->db->select('stud.student_name,stud.roll_number,a.*,t.teacher_name');
        $this->db->from('attendance a');
        $this->db->join('students stud', 'stud.id=a.students_id' ,'left');
        $this->db->join('sections s', 's.id=stud.sections_id', 'left');
        $this->db->join('teachers t', 't.id=s.teachers_id', 'left');
        $this->db->where(array( 'stud.id' => $user_id )); 
		$this->db->where('date >=', $from_date);
		$this->db->where('date <=', $to_date);
        $query = $this->db->get();
       
	   	log_message('debug',$this->db->last_query());
        if($query)
        {
            return $query->result();
        }
    } 
    
    function attendances_app($user_id){
        
        $this->db->select('stud.student_name,stud.roll_number,a.*');
        $this->db->from('attendance a');
        $this->db->join('students stud', 'stud.users_id='.$user_id, 'left');
        $query = $this->db->get();
        
        if($query)
        {
            return $query->result();
        }
    }
    
    
    function attendance_add_app($class,$section,$date,$teacher_id,$user_id, $status, $school_id,$users_id){
        
        $target = array( 
            "attendance"	=> $status ,
            "class_id"		=> $class ,
            "sections_id"	=> $section,
            "date"			=> date("Y-m-d",strtotime(date($date))),
            "teachers_id"	=> $teacher_id,
            "students_id"	=> $user_id,
            "created_date"	=> date('Y-m-d'),
            "created_by"	=> $users_id,
            "school_id"		=> $school_id,
        );
        $query =  $this->db->insert('attendance', $target);
        
        if($query)
        {
            return 'true';
        }
    } 
    
    
    
    
    function attendance_app($class,$section,$date,$teacher_id,$school_id){ 
        
		$query = $this->db->select('s.id, s.student_name, s.roll_number, a.attendance')
				 ->from('attendance a')
				 ->join('students s', 's.id = a.students_id', 'left')
				 ->where(array(
				 		'a.sections_id' => $section, 
						'a.date' => date("Y-m-d",strtotime(date($date)))
					))
				 ->get();
        log_message('debug',$this->db->last_query()); 
		if($query->num_rows() > 0){	
			return $query->result();
		}else{
        	$this->db->select('stud.id,stud.student_name,stud.roll_number');
        	$this->db->from('students stud');
        	$this->db->join('sections s', 's.id=stud.sections_id', 'left');
        	$this->db->where(array( 's.id' =>$section));
        	$this->db->where( 'stud.join_date <=', $date); 
        	
        	$query = $this->db->get();
        	
        	if($query)
        	{
        	    return $query->result();
        	}
		}
    } 

	function apply_leave($student, $start_date, $end_date, $reason, $approver, $desc){
		
		$leave = $this->db->select('*')
		->from('leaves')
		->where('start_date <=', $start_date)
		->where('end_date >=', $end_date)
		->where('student_id =', $student)
		->get();

		log_message('debug', $this->db->last_query());

		if($leave->num_rows() > 0){
			return "Leave already applied for this date !";
		}else{
			$data = array(
					'student_id' => $student,
					'start_date' => $start_date,
					'end_date'   => $end_date,
					'reason'	 => $reason,
					'approver'	 => $approver,
					'description'=> $desc
				);
			$this->db->insert('leaves', $data);
			return "Leave successfully applied";
		}
	}

	function get_leaves($student){
		return $this->db->select('*')
				->from('leaves')
				->where(array('student_id' => $student))
				->get()
				->result();
	}

	function get_leaves_by_date($section, $date){
		return $this->db->select('l.*')
				->from('leaves l')
				->join('students s','l.student_id = s.id','left')
				->where(array('s.sections_id' => $section))
				->where('start_date <=', $date)
				->where('end_date >=', $date)
				->get()
				->result();
	}

	function get_class_leaves($token, $status){
		$where = "l.status is NOT NULL";
		
		$data = $this->db->select('c.class, s.sections, s.id as sec, l.* , st.student_name')
						->from('sections s')
						->join('class c','c.id = s.class_id','left')
						->join('teachers t','s.teachers_id = t.id','left')
						->join('users u','t.users_id = u.id','left')
						->join('tokens to','to.user_id = u.id','left')
						->join('students st','st.sections_id = s.id','left')
						->join('leaves l','l.student_id = st.id','left')
						->where(array('to.token' => $token))
						->where('l.id is NOT NULL',NULL, FALSE)
						->where($where, NULL, FALSE)
						->get()
						->result();
		log_message('debug','attendance ------------------ debug');
		log_message('debug',$this->db->last_query()); 
		log_message('debug',print_r($data, true));
		return $data;
	}

	function set_leave($token, $status, $leave_id, $remark){
		$target = array(
			'status' => $status,
			'remark' => $remark
			);
		$this->db->update('leaves',$target, array('id' => $leave_id));
		return $this->get_class_leaves($token, "all");
	}

}
?>
