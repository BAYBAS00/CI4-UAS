<?php

namespace App\Models;

use CodeIgniter\Model;

class MatkulModel extends Model
{
    /**
     * table name
     */
    protected $table = "matkul";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_user', 'nama_matkul', 'sks', 'semester'
    ];
    protected $primaryKey       = 'id_matkul';
}
