<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH . 'libraries/REST_Controller.php'); 

require APPPATH . 'libraries/Format.php';

class Email extends CI_Controller {

    use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct($config = 'rest')
    {
	parent::__construct($config);
	$this->__resTraitConstruct();
    	header ("Access-Control-Allow-Origin: *");
    	header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
    	header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    	header ("Access-Control-Allow-Headers: *"); 
    	
    	$method = $_SERVER['REQUEST_METHOD'];
    	if ($method == "OPTIONS") {
    	    die();
    	}
    }

    function send($to,$subject,$msg) {
        $this->load->config('email');
        $this->load->library('email');
        
        $from = 'no-reply@mmi.com';
        $to = $to;
        $subject = $subject;
        $message = $msg;

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            log_message('debug', 'Your Email has successfully been sent.');
        } else {
            log_message('debug',$this->email->print_debugger());
        }
    }

	function send_otp_post(){
		$this->load->model('m_login');
        $post_data = file_get_contents("php://input");
        $request = json_decode($post_data,true);
        
        $user = $request['username'];
		$otp = rand(1000,9999);
		$result = $this->m_login->update_otp($user, $otp);
		if($result){

			$subject = "OTP to reset your password";
			$msg = "Your OTP for resetting your password is " . $otp ."\n\n
					Regards \n Team Disha";
			$this->send($user, $subject, $msg);
			$this->response(array(
				'msg'=> "OTP sent to the email",
				'status'=> true
			));
		}else{
			$this->response(array(
				'msg' => "Email id is not registered",
				'status'=> false
			));
		}
	}
}
