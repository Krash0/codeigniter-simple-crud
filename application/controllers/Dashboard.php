<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		checkLogin();
	}

	public function index()
	{
		//load model
		$this->load->model('games_model');

		//call model function
		$info['title'] = 'Dashboard :: Home';
		$info['games'] = $this->games_model->loadGames(5);

		//load view
		$this->load->view('templates/header', $info);
		$this->load->view('templates/nav-top');
		$this->load->view('pages/dashboard', $info);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');

		//get a parameter
		//$this->uri->segment(3);
	}

	/*public function test() {
		//load model
		$this->load->model('Faqs_model');

		//call model function
		$this->Faqs_model->loadFaqs();
	}*/
}
