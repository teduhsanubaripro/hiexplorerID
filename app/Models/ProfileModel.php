<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'tbl_profile';
    protected $primaryKey = 'id_profile';

    protected $allowedFields = ['company', 'tagline', 'description', 'address', 'phone', 'email'];

    protected $useTimestamps = true; // Aktifkan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProfileData($id)
    {
        return $this->select('company', 'tagline', 'description', 'address', 'phone', 'email')
                    ->where('id_profile', $id)
                    ->first();  // Ambil data pertama (karena mencari berdasarkan ID)
    }

    // Method untuk mengambil semua data profile
    public function getProfile($id)
    {
        return $this->where('id_profile', $id)->first(); // Mengembalikan objek
    }

    // Method untuk menambahkan profile baru
    public function addProfile($data)
    {
        return $this->insert($data); // Melakukan insert data baru
    }

    // Method untuk mengupdate profile berdasarkan id
    public function updateProfile($id, $data)
    {
        return $this->update($id, $data); // Melakukan update data berdasarkan id
    }

    // Method untuk menghapus profile berdasarkan id
    public function deleteProfile($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }

    public function countAll()
    {
        return $this->db->table($this->table)->countAllResults();
    }
}
