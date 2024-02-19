<?php

namespace App\Models;

use CodeIgniter\Model;

class PerumahanModel extends Model
{
    protected $table            = 'tbl_perumahan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_dev', 'nama', 'alamat', 'no_telp', 'latitude', 'longitude', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
