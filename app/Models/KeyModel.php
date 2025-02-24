<?php

namespace App\Models;

use CodeIgniter\Model;

class KeyModel extends Model
{
    protected $table      = 'tbl_key';
    protected $primaryKey = 'id_key';

    protected $allowedFields = ['description','icon'];

    protected $useTimestamps = true; // Aktifkan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKeyData($id)
    {
        return $this->select('description','icon')
                    ->where('id_key', $id)
                    ->first();  // Ambil data pertama (karena mencari berdasarkan ID)
    }

    // Method untuk mengambil semua data key
    public function getKey($id)
    {
        return $this->where('id_key', $id)->first(); // Mengembalikan objek
    }

    // Method untuk menambahkan key baru
    public function addKey($data)
    {
        return $this->insert($data); // Melakukan insert data baru
    }

    // Method untuk mengupdate key berdasarkan id
    public function updateKey($id, $data)
    {
        return $this->update($id, $data); // Melakukan update data berdasarkan id
    }

    // Method untuk menghapus key berdasarkan id
    public function deleteKey($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }

    public function countAll()
    {
        return $this->db->table($this->table)->countAllResults();
    }
}
