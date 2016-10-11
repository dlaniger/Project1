<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('dashboard/login');
		// $this->load->model("User_model");
		// echo json_encode($this->User_model->sayHello('deng.coco@icloud.com', 'password'));
	}

	public function main() {
		$this->load->model("User_model");
		echo json_encode($this->User_model->get_user_auth('deng.coco@icloud.com', 'password'));
	}
}
