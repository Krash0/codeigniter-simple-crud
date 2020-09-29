<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	function __construct() {
		parent::__construct();
		checkLogin();
	}

	public function index()
	{
		// page title
		$info['title'] = 'Dashboard :: Games';

		//load model
		$this->load->model('games_model');

		//call model function
		$info['games'] = $this->games_model->loadGames();

		//load view
		$this->load->view('templates/header', $info);
		$this->load->view('templates/nav-top');
		$this->load->view('pages/games', $info);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}

	public function new()
	{
		// page title
		$info['title'] = 'Dashboard :: New Game';
		
		//load model
		$this->load->model('games_model');

		//load view
		$this->load->view('templates/header', $info);
		$this->load->view('templates/nav-top');
		$this->load->view('pages/form-games', $info);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}

	public function store()
	{
		//load model
		$this->load->model('games_model');

		$game = array(
			'user_id'      => 1,
			'name' 	       => $_POST['name'] ?? '',
			'description'  => $_POST['description'] ?? '',
			'price'        => $_POST['price'] ?? '',
			'developer'    => $_POST['developer'] ?? '',
			'release_date' => $_POST['release_date'] ?? ''
		);

		$this->games_model->insert($game);

		redirect("games/");
	}

	public function edit($id)
	{
		// page title
		$info['title'] = 'Dashboard :: Edit Game';

		//load model
		$this->load->model('games_model');

		//call model function
		$info['game'] = $this->games_model->get($id);

		if(empty($info['game'])) redirect("games/");

		//load view
		$this->load->view('templates/header', $info);
		$this->load->view('templates/nav-top');
		$this->load->view('pages/form-games', $info);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}

	/*public function test() {
		//load model
		$this->load->model('Faqs_model');

		//call model function
		$this->Faqs_model->loadFaqs();

		//get a parameter
		$this->uri->segment(3);
	}*/

	public function update($id)
	{
		//load model
		$this->load->model('games_model');

		$game = array(
			'user_id'      => 1,
			'name' 	       => $_POST['name'] ?? '',
			'description'  => $_POST['description'] ?? '',
			'price'        => $_POST['price'] ?? '',
			'developer'    => $_POST['developer'] ?? '',
			'release_date' => $_POST['release_date'] ?? ''
		);

		$this->games_model->update($id, $game);

		redirect("games/");
	}

	public function delete($id)
	{
		//load model
		$this->load->model('games_model');
		$this->games_model->delete($id);

		redirect("games/");
	}
}