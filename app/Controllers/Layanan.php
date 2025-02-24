<?php

namespace App\Controllers;

use App\Models\layananModel;
use App\Models\KategoriModel;

class layanan extends BaseController
{
    public function index()
    {
        if (session('id_user')) {

        $layananModel = new LayananModel();  // Model untuk layanan
        $kategoriModel = new KategoriModel(); // Model untuk kategori

        // Mengambil semua data layanan
        $layananData = $layananModel->findAll();

        // Menambahkan deskripsi kategori ke setiap layanan
        foreach ($layananData as &$layanan) {
            // Mengambil kategori berdasarkan id_ktg yang ada di layanan
            $kategori = $kategoriModel->find($layanan['id_ktg']);
            
            // Menambahkan 'desc' dengan value dari description kategori
            $layanan['desc'] = $kategori ? $kategori['title'] : 'Kategori Tidak Ditemukan';
        }

        // Mengirim data layanan ke view
        return view('layanan/index', ['layanan' => $layananData]);
    }
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) {

        // Membuat objek model kategori
        $kategoriModel = new KategoriModel();

        // Mengambil semua kategori dari tabel
        $data['kategori'] = $kategoriModel->findAll();

        // Mengirimkan data kategori ke view 'layanan/add'
        return view('layanan/add', $data);
    }
        return view('auth/login');
    }

    public function store()
    {
        $layananModel = new LayananModel();
        $kategoriModel = new KategoriModel();

        // Mengambil data dari request
        $featuresInput = $this->request->getPost('features'); // Ambil input features dari textarea
        $id_kategori = $this->request->getPost('id_kategori'); // Ambil id_kategori yang dipilih

        // Validasi input untuk 'features'
        if (!empty($featuresInput)) {
            // Pecah string berdasarkan koma dan hilangkan spasi di sekitar nilai
            $features = array_map('trim', explode(',', $featuresInput));
        } else {
            // Jika tidak ada fitur, set sebagai array kosong
            $features = [];
        }

        // Mengonversi array ke JSON
        $featuresJson = json_encode($features);

        // Validasi input
        $validation = \Config\Services::validation();

        // Validasi kategori
        if (empty($id_kategori)) {
            return redirect()->back()->withInput()->with('error', 'Kategori harus dipilih.');
        }

        // Validasi data lain
        if (!$this->validate([
            'title'       => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'speed'       => 'permit_empty|numeric', // Permit empty for speed
            'price'       => 'permit_empty|numeric', // Permit empty for price
        ])) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data kategori berdasarkan ID yang dipilih
        $kategori = $kategoriModel->find($id_kategori);

        if (!$kategori) {
            return redirect()->back()->withInput()->with('error', 'Kategori tidak valid.');
        }

        // Siapkan data untuk disimpan
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'features'    => $featuresJson, // Simpan sebagai JSON
            'id_ktg'      => $id_kategori,  // Menyimpan kategori yang dipilih ke kolom id_ktg
        ];

        // Jika 'speed' atau 'price' kosong, set sebagai null
        $speed = $this->request->getPost('speed');
        $price = $this->request->getPost('price');

        if (!empty($speed)) {
            $data['speed'] = $speed;
        } else {
            $data['speed'] = null;
        }

        if (!empty($price)) {
            $data['price'] = $price;
        } else {
            $data['price'] = null;
        }

        // Validasi sebelum menyimpan data
        if (!$layananModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $layananModel->errors());
        }

        return redirect()->to('/layanan')->with('success', 'Data berhasil disimpan!');
    }


    public function edit($id = null)
    {
        if (session('id_user')) {
        
        // Membuat objek model kategori
        $kategoriModel = new KategoriModel();

        // Mengambil semua kategori dari tabel
        $data['kategori'] = $kategoriModel->findAll();

        if ($id != null) {
            // Mengambil data layanan berdasarkan id
            $query = $this->db->table('tbl_layanan_isp')->getWhere(['id_layanan_isp' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                // Mendapatkan data layanan
                $data['layanan'] = $query->getRow();

                // Mengonversi features (jika berupa JSON) menjadi string
                $features = json_decode($data['layanan']->features, true);
                if (is_array($features)) {
                    // Menggabungkan array menjadi string yang bisa dibaca, misalnya dengan koma
                    $data['layanan']->features = implode(", ", $features);
                }

                // Menampilkan view dengan data layanan dan kategori
                return view('layanan/edit', $data);
            } else {
                // Jika data tidak ditemukan, tampilkan error
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            // Jika ID tidak valid, tampilkan error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
        return view('auth/login');
    }

    public function update($id)
    {
        $layananModel = new LayananModel();
        $kategoriModel = new KategoriModel();

        // Mengambil data dari request
        $featuresInput = $this->request->getPost('features'); // Ambil input features dari textarea
        $id_kategori = $this->request->getPost('id_kategori'); // Ambil id_kategori yang dipilih

        // Validasi input untuk 'features'
        if (!empty($featuresInput)) {
            // Pecah string berdasarkan koma dan hilangkan spasi di sekitar nilai
            $features = array_map('trim', explode(',', $featuresInput));
        } else {
            // Jika tidak ada fitur, set sebagai array kosong
            $features = [];
        }

        // Mengonversi array ke JSON
        $featuresJson = json_encode($features);

        // Validasi input
        $validation = \Config\Services::validation();

        // Validasi kategori
        if (empty($id_kategori)) {
            return redirect()->back()->withInput()->with('error', 'Kategori harus dipilih.');
        }

        // Validasi data lain
        if (!$this->validate([
            'title'       => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'speed'       => 'permit_empty|numeric', // Permit empty for speed
            'price'       => 'permit_empty|numeric', // Permit empty for price
        ])) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data kategori berdasarkan ID yang dipilih
        $kategori = $kategoriModel->find($id_kategori);

        if (!$kategori) {
            return redirect()->back()->withInput()->with('error', 'Kategori tidak valid.');
        }

        // Siapkan data yang akan diperbarui
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'features'    => $featuresJson, // Simpan sebagai JSON
            'id_ktg'      => $id_kategori,  // Menyimpan kategori yang dipilih ke kolom id_ktg
        ];

        // Jika 'speed' atau 'price' kosong, set sebagai null
        $speed = $this->request->getPost('speed');
        $price = $this->request->getPost('price');

        if (!empty($speed)) {
            $data['speed'] = $speed;
        } else {
            $data['speed'] = null;
        }

        if (!empty($price)) {
            $data['price'] = $price;
        } else {
            $data['price'] = null;
        }

        // Update data layanan
        if (!$layananModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $layananModel->errors());
        }

        return redirect()->to('/layanan')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $layananModel = new layananModel();
        $layananModel->deletelayanan($id);

        return redirect()->to('/layanan');
    }
}
