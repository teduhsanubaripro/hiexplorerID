<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\AboutusModel;
use App\Models\VisionModel;
use App\Models\MissionsModel;
use App\Models\KeyModel;
use App\Models\LayananModel;
use App\Models\KategoriModel;

class Welcome extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function detail_service($id)
    {
        $layananModel = new LayananModel();
        $profileModel = new ProfileModel();
        $kategoriModel = new KategoriModel(); // Model untuk kategori

        // Mencari layanan berdasarkan ID
        $layanan = $layananModel->find($id);

        // Mengecek apakah layanan ditemukan
        if (!$layanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Layanan tidak ditemukan');
        }

        // Mengambil data profil
        $data['profiles'] = $profileModel->findAll();

        // Mengambil kategori layanan
        $kategori = $kategoriModel->find($layanan['id_ktg']); // Asumsikan 'id_ktg' ada di tabel layanan

        if ($kategori && $kategori['title'] == 'Internet Service Provider') {
            // Jika kategori adalah 'Internet Service Provider', tampilkan data layanan ISP
            $data['layanan'] = $layananModel->where('id_ktg', $layanan['id_ktg'])->findAll();
        } else {
            // Jika kategori bukan 'Internet Service Provider', tampilkan layanan lainnya berdasarkan ID
            $data['layanan_other'] = $layananModel->where('id_layanan_isp', $id)->findAll(); // Ambil layanan lain yang sesuai ID
        }

        // Menampilkan view dengan data
        return view('front/detail_service', $data);
    }
}
