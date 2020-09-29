<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$info['title'] = 'Dashboard :: Signup';

		//load view
		$this->load->view('pages/signup', $info);
	}

	public function store()
	{
		//load model
		$this->load->model('users_model');

		$user = array(
			'name' 	   => $this->input->post('name'),
			'country'  => $this->input->post('country'),
			'email'    => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		);

		// verify the values...

		$this->users_model->insert($user);

		redirect("login/");
	}
}
