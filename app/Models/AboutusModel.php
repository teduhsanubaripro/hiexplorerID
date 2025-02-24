<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutusModel extends Model
{
    protected $table      = 'tbl_aboutus';  // Nama tabel
    protected $primaryKey = 'id_aboutus';  // Primary key

    protected $allowedFields = ['title', 'description'];  // Field yang dapat diubah

    protected $useTimestamps = true;  // Gunakan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';  // Nama kolom created_at
    protected $updatedField  = 'updated_at';  // Nama kolom updated_at

    public function deleteAboutus($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }
}
