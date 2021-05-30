<?php

namespace App\Models;

use CodeIgniter\Model;

class MerkModel extends Model
{
    protected $table      = 'tbl_merk';
    protected $primaryKey = 'id';

    protected $allowedFields = ['merk'];

}