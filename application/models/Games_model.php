<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
	}

	public function loadGames($limit = 0) {
		return $this->db->get("tb_games", $limit)->result_array();
	}

	public function insert($game) {
		$this->db->insert("tb_games", $game);
	}

	public function get($id) {
		return $this->db->get_where("tb_games", array(
			"id" => $id
		))->row_array();
	}

	public function update($id, $game) {
		$this->db->where("id", $id);
		return $this->db->update("tb_games", $game);
	}

	public function delete($id) {
		$this->db->where("id", $id);
		return $this->db->delete("tb_games");
	}
}
