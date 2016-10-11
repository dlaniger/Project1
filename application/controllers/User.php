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
		echo strtoupper($this->User_model->gen_captcha());
	}	
}