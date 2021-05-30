<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table      = 'tbl_mobil';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'warna', 'harga', 'no_polisi', 'jumlah_kursi', 'tahun_beli', 'image', 'id_merk'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
}