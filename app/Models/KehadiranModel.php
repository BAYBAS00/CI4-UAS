<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    /**
     * table name
     */
    protected $table = "kehadiran";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_user', 'id_matkul', 'tgl_hadir', 'absensi', 'catatan'
    ];
    protected $primaryKey       = 'id_hadir';
}
