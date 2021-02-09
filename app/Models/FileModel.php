<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model {
  protected $table = 'file';

  protected $allowedFields = ['id', 'uploader', 'filename', 'properties', 'status'];

  public function new($data) {
    return $this->save($data);
  }

  public function getByAccount($account_id, $offset = 0) {
    return $this->where('uploader', $account_id)->findAll();
  }

  public function getById($file_id) {
    return $this->find($file_id);
  }
}