<?php

namespace App\Models;

use CodeIgniter\Model;

class DeveloperModel extends Model
{
    protected $table            = 'tbl_developer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id',
        'nama_dev',
        'alamat_dev',
        'no_telp_dev',
        'status_dev',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
