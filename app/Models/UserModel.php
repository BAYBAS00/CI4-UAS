<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * table name
     */
    protected $table = "user";

    /**
     * allow field
     */
    protected $allowedFields = [
        'username', 'password', 'email', 'hak_akses', 'name', 'no_telp', 'alamat','status','kode'
    ];
    protected $primaryKey       = 'id_user';
}
