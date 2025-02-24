<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'tbl_kategori';  // Nama tabel
    protected $primaryKey = 'id_kategori';  // Primary key

    protected $allowedFields = ['title', 'description', 'icon'];  // Field yang dapat diubah

    protected $useTimestamps = true;  // Gunakan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';  // Nama kolom created_at
    protected $updatedField  = 'updated_at';  // Nama kolom updated_at

    public function deleteKategori($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }

    public function getAllCategories()
    {
        return $this->findAll();
    }

    public function getKategoriWithLayanan()
    {
        // Melakukan join dengan tabel tbl_layanan_isp berdasarkan id_kategori
        return $this->select('tbl_kategori.*, tbl_layanan_isp.id_layanan_isp AS id_layanan_isp, tbl_layanan_isp.title AS layanan_title, tbl_layanan_isp.description AS layanan_description')
                    ->join('tbl_layanan_isp', 'tbl_kategori.id_kategori = tbl_layanan_isp.id_ktg', 'left') // Join dengan left agar kategori yang tidak memiliki layanan tetap ditampilkan
                    ->findAll(); // Mengambil semua hasil join
    }
}
