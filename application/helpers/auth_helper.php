<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	// check login
	function checkLogin($redirect = TRUE) {
		$ci = get_instance();

		// check if exists logged user on session
		if($logged_user = $ci->session->userdata("logged_user")){
			$ci->load->model('login_model');

			// check if the email and password works
			if($confirm_user = $ci->login_model->get($logged_user['email'], $logged_user['password'])) {
				return TRUE;
			}
		}
		if($redirect){
			$ci->session->set_flashdata("danger", "Você precisa estar logado para acessar essa página.");
			redirect("login/");
		}
		return FALSE;
	}

	// get logged user
	function getLoggedUser() {
		$ci = get_instance();
		return $ci->session->userdata("logged_user");
	}
?>