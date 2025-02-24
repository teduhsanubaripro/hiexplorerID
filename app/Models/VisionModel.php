<?php

namespace App\Models;

use CodeIgniter\Model;

class VisionModel extends Model
{
    protected $table      = 'tbl_vision';
    protected $primaryKey = 'id_vision';

    protected $allowedFields = ['description'];

    protected $useTimestamps = true; // Aktifkan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getVisionData($id)
    {
        return $this->select('description')
                    ->where('id_vision', $id)
                    ->first();  // Ambil data pertama (karena mencari berdasarkan ID)
    }

    // Method untuk mengambil semua data Vision
    public function getVision($id)
    {
        return $this->where('id_vision', $id)->first(); // Mengembalikan objek
    }

    // Method untuk menambahkan Vision baru
    public function addVision($data)
    {
        return $this->insert($data); // Melakukan insert data baru
    }

    // Method untuk mengupdate Vision berdasarkan id
    public function updateVision($id, $data)
    {
        return $this->update($id, $data); // Melakukan update data berdasarkan id
    }

    // Method untuk menghapus Vision berdasarkan id
    public function deleteVision($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }

    public function countAll()
    {
        return $this->db->table($this->table)->countAllResults();
    }
}
