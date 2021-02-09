<?php namespace App\Controllers;

  use App\Models\FileModel;

  class Upload extends BaseController {

    public function __construct() {
      // Load form helper
      helper('form');
      // load base_url
      helper('url');
      // start session
      $this->session = \Config\Services::session();
      $this->uri = new \CodeIgniter\HTTP\URI();
    }

    public function index() {
      $file = new FileModel();
      $account_id = $this->session->get('account_id');
      if (!$account_id) {
        return redirect()->to('/');
      }
      $account_name = $this->session->get('account_name');
      $files = $file->getByAccount($account_id);
      $data = [
        'uri_param' => '/files',
        'account_id' => $account_id,
        'account_name' => $account_name,
        'files' => $files
      ];
      echo view('files', $data);
    }

    public function upload() {
      $account_id = $this->session->get('account_id');
      $account_name = $this->session->get('account_name');

      $error_form = null;
      
      if (!$account_id) {
        $this->session->setFlashdata('error_upload', 'Please provide account id');
      }

      if ($this->session->getFlashdata('error_upload')) {
        $error_form = $this->session->getFlashdata('error_upload');
      }
      
      $data = [
        'error' => $error_form,
        'uri_param' => '/upload',
        'account_id' => $account_id,
        'account_name' => $account_name
      ];
      
      echo view('upload', $data);
    }

    public function upload_course() {
      $course_file = $this->request->getFiles('coursefile');
      $account_id = $this->session->get('account_id');

      $file = new FileModel();

      if ($this->request->getMethod() !== 'post') {
        return redirect()->to(base_url('upload'));
      }

      $validated = $this->validate([
        'coursefile' => 'uploaded[coursefile]|mime_in[coursefile,application/pdf]|max_size[coursefile,100000000]'
      ]);

      if ($validated == FALSE) {
        $this->session->setFlashdata('error_upload', 'Please provide file with pdf data type');
        return redirect()->back();
      }

      if ($course_file && $account_id) {
        $coursefile = $this->request->getFile('coursefile');

        $file_property = [
          "filesize" => $coursefile->getSize(),
          "mimetype" => $coursefile->getMimeType()
        ];

        $data = [
          'uploader' => $account_id,
          'filename' => $coursefile->getName(),
          'properties' => json_encode($file_property),
          'status' => 'uploaded'
        ];
        $coursefile->move(ROOTPATH.'public/uploads');

        $file->new($data);
        return redirect()->to('/questions');
      } else {
        $this->session->setFlashdata('error_upload', 'Cannot process the file');
        return redirect()->back();
      }
    }

    public function editor() {
      $file = new FileModel();
      $account_id = $this->session->get('account_id');
      $account_name = $this->session->get('account_name');
      if (!$account_id) {
        return redirect()->to('/');
      }

      $file_id = $this->request->uri->getSegment(3);
      $files = $file->getById($file_id);
      $file_source = $files['filename'];

      $data = [
        'account_id' => $account_id,
        'account_name' => $account_name,
        'uri_param' => '/editor',
        'files' => $files,
        'file_source' => $file_source
      ];

      echo view('file-editor', $data);
    }
  }
