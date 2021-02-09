<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model {
  protected $table = 'account';

  protected $allowedFields = ['id', 'name', 'created_at'];
}