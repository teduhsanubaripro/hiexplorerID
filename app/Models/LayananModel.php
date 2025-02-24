<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'tbl_layanan_isp';  // Nama tabel
    protected $primaryKey = 'id_layanan_isp';  // Primary key

    protected $allowedFields = ['title', 'id_ktg', 'description', 'speed', 'price', 'features'];  // Field yang dapat diubah

    protected $useTimestamps = true;  // Gunakan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';  // Nama kolom created_at
    protected $updatedField  = 'updated_at';  // Nama kolom updated_at

    public function deleteLayanan($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }
}
