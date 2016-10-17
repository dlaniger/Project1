<?php

/**
* 
*/
class Dashboard extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		//print_r($this->session->userdata());
		// $data['main_content'] = 'dashboard/landing';
		// $this->load->view('layout/db_layout', $data);
		$this->landing();
	}

	function landing() {
		$data['main_content'] = 'dashboard/landing';
		$this->load->view('layout/db_layout', $data);
	}
}