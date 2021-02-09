<?php namespace App\Controllers\Api;

  // use App\Models\AccountModel;
  use App\Libraries\FPDF;
  use CodeIgniter\RESTful\ResourceController;
  use CodeIgniter\API\ResponseTrait;

	class File extends ResourceController {
    use ResponseTrait;

		public function __construct() {
			// Load form helper
			helper('form');
			// load base_url
			helper('url');
			// start session
			$this->session = \Config\Services::session();
      $this->session->start();
    }
    
    public function extract() {

      $data = [
				'output' => $file_source
      ];

      return $this->respond($data, 200);
    }
	}
