<?php

class Dashboard extends CI_Controller {

	function index() {
		//echo assets_url('css/bootstrap.min.css');
		$this->load->view("login");
	}

	function home() {
		$data["main_content"] = "dashboard/home";
		$this->load->view("layout/dashboard", $data);
	}

}