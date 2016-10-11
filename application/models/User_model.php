<?php

/**
* 
*/
class User_model extends CI_Model{ 
	
	function __construct()
	{
		parent::__construct();
	}

	function sayHello($email, $auth_key) {
		$this->db->from('user_auth');
		$this->db->where("email = '" . $email . "' and auth_key = '" . md5($auth_key) . "'");
		$result = $this->db->get();
		$data = array();
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data["user"] = $row;
			}
		}
		return $data;
	}

	function get_user_auth($login_data) {
		$this->db->from("user_auth");
		$this->db->where("email = '" . $login_data['email'] . "' and pass_key = '" . md5($login_data['pass_key']) . "'");
		$query = $this->db->get();
		$data = array();
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data['response'] = array('code' => 1, 'msg' => 'User authentication found');
				$data['user_auth'] = $row;
				$data['user_info'] = $this->get_user_info($row->user_id);
			}
		}
		else {
			$data['response'] = array('code' => 0, 'msg' => 'User authentication not found');
		}
		return $data;
	}

	function get_user_info($id) {
		$this->db->from('user_info');
		$this->db->where('id = ' . $id);
		$query = $this->db->get();
		$data = array();
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = $row;
			}
		}
		return $data;
	}

	function gen_captcha($length = 5) {
	    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $charactersLength = strlen($characters);
	    $randomString = null;
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $data = str_replace("\"", "", $randomString);
	}	
}