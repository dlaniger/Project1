<?

/**
* 
*/
class Dashboard extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$data['main_content'] = 'dashboard/landing';
		$this->load->view('layout/db_layout', $data);
	}

	function landing() {
		$data['main_content'] = 'dashboard/landing';
		$this->load->view('layout/db_layout', $data);
	}
}