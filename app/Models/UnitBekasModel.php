<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitBekasModel extends Model
{
    protected $table            = 'tbl_unit_bekas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'foto', 'nama_kontak', 'no_wa', 'alamat', 'catatan', 'longitude', 'latitude', 'ins_by', 'status', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
