<?php namespace App\Controllers;

	use App\Models\AccountModel;

	class Home extends BaseController {

		public function __construct() {
			// Load form helper
			helper('form');
			// load base_url
			helper('url');
			// start session
			$this->session = \Config\Services::session();
      $this->session->start();
		}

		public function index() {
			echo view('home', $data);
			
		}
	}
