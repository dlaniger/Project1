<?php

class Dashboard extends CI_Controller {

	function index() {
		//echo assets_url('css/bootstrap.min.css');
		$this->load->view("login");
	}

	function home() {
		echo "HOME";
	}

}