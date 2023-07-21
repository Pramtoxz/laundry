<?php

namespace App\Models;

use CodeIgniter\Model;

class mlogin extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['iduser', 'namauser', 'username', 'password', 'level'];
}
