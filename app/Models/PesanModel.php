<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table      = 'tbl_pesanan';

    protected $allowedFields = ['id','nama_pemesan','jk','id_mobil','supir','alamat','tujuan',
    'tglmulai','tglakhir','jammulai','jamakhir','image','user_id' ,'status'];
}