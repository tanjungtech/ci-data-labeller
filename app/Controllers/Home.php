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
			$accounts = new AccountModel();

			$data = [
				'error' => '',
				'uri_param' => '/',
				'accounts' => $accounts->findAll()
			];

			$selected_account = $this->request->getPost('selected_account');

			if($selected_account) {
				$get_account_session = $this->select($selected_account);
				if(!$get_account_session) {
					$data['error'] = 'Cannot find this account';
					echo view('home', $data);
					return;
				}

				$this->session->set('account_id', $get_account_session['id']); // setting session data
				$this->session->set('account_name', $get_account_session['name']); // setting session data
				$this->session->set('account_created', $get_account_session['created_at']); // setting session data
				
				return redirect()->to('/upload');
			}

			echo view('home', $data);
			
		}

		private function select($selected_account) {
			$accounts = new AccountModel();
			$account_session = $accounts->find($selected_account);

			return $account_session;
		}
	}
