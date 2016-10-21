<?php

class User extends CI_Controller {
	
	function __construct() {
	    header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model("User_model");
	}

	function main() {
		echo "hello";
	}

	function authenticate_user() {
		
		$data = array(
				"email" => $this->input->post("email"),
				"pass_key" => $this->input->post("pass_key")
			);
		echo json_encode($this->User_model->get_user_auth($data));
	}

	function captcha() {
		$this->load->model("User_model");
		echo $this->User_model->gen_captcha();
	}

	function save_user() {
		$t = time();
		$ts = date("Y-m-d",$t);
		$data = array(
			'user_type' => $this->input->post('user_type'),
			'firstname' => $this->input->post('firstname'),
			'middlename' => $this->input->post('middlename'),
			'lastname' => $this->input->post('lastname'),
			'contact1' => $this->input->post('contact1'),
			'contact2' => $this->input->post('contact2'),
			'datecreated' => $ts,
			'email' => $this->input->post('email')
		);
		$this->load->model('User_model');
		$this->User_model->save_user_info($data);
	}

	function authenticate_fb_user(){
	// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook.php";
		
		// Facebook API Configuration
		$appId = '188464011596395';
		$appSecret = '841756007c239c14b3837ac0b8a0173b';
		$redirectUrl = base_url();
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
		
        if ($fbuser) {
			$userProfile = $facebook->api('/me?fields=id,hometown,first_name,last_name,email,middle_name,gender');
            // Preparing data for database insertion
            print_r($userProfile);
            die();
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
		
		$data['users'] = $userProfile;

		$this->User_model->save_user_info($data);
		 $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
		  $array = array(
        	"data"=> $userProfile,
        	"code"=> 1,
        	"fb" => $fbuser
        	);
           /* $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }*/
            echo json_encode($array);
        } else {
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
            $code = 0;
             $array = array(
        	"data"=> $data,
        	"code"=> $code,
        	"fb" => $fbuser
        	);

	       echo json_encode($array);
        }

	}
}