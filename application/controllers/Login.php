<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		if(checkLogin(false)) redirect("dashboard/");

		$info['title'] = "Dashboard :: Login"; 

		// load view
		$this->load->view('pages/login', $info);
	}

	public function check()
	{
		//load model
		$this->load->model('login_model');

		$user = $this->login_model->get($this->input->post('email'), md5($this->input->post('password')));
		if($user) {
			$this->session->set_userdata("logged_user", $user);
			redirect("dashboard/");
		}

		redirect("login/");
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_user");
		redirect("login/");
	}
}
