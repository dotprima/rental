<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table      = 'tbl_notifikasi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['notifikasi','id_user','id_notif'];
    protected $createdField  = 'created_at';

}