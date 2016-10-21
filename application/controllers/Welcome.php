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
		$data = array("data" => $this->fb_check());
		
		$this->load->view('dashboard/login',$data);
		// $this->load->model("User_model");
		// echo json_encode($this->User_model->sayHello('deng.coco@icloud.com', 'password'));
	}

	public function main() {
		$this->load->model("User_model");
		echo json_encode($this->User_model->get_user_auth('deng.coco@icloud.com', 'password'));
	}
	public function fb_check(){
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
		$data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
		
		return $data;
	}
}
