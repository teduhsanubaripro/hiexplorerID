<?php

namespace App\Models;

use CodeIgniter\Model;

class MissionsModel extends Model
{
    protected $table      = 'tbl_missions';
    protected $primaryKey = 'id_missions';

    protected $allowedFields = ['description'];

    protected $useTimestamps = true; // Aktifkan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getMissionsData($id)
    {
        return $this->select('description')
                    ->where('id_missions', $id)
                    ->first();  // Ambil data pertama (karena mencari berdasarkan ID)
    }

    // Method untuk mengambil semua data Vision
    public function getMissions($id)
    {
        return $this->where('id_missions', $id)->first(); // Mengembalikan objek
    }

    // Method untuk menambahkan Vision baru
    public function addMissions($data)
    {
        return $this->insert($data); // Melakukan insert data baru
    }

    // Method untuk mengupdate Vision berdasarkan id
    public function updateMissions($id, $data)
    {
        return $this->update($id, $data); // Melakukan update data berdasarkan id
    }

    // Method untuk menghapus Vision berdasarkan id
    public function deleteMissions($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }

    public function countAll()
    {
        return $this->db->table($this->table)->countAllResults();
    }
}
