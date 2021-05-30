<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'id';

    protected $allowedFields = ["pesan_id",	"total_bayar","tanggalbayar"];

}