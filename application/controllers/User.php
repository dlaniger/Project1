<?php

class User extends CI_Controller {
	
	function __construct() {
	    header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
	}

	function main() {
		echo "hello";
	}

	function authenticate_user() {
		$this->load->model("User_model");
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
}