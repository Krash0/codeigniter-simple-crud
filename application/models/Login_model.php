<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	public function get($email, $password) {
		return $this->db->get_where("tb_users", array(
			"email" => $email,
			"password" => $password
		))->row_array();
	}
}
