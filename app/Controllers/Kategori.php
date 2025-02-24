<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        if (session('id_user')) {

        $KategoriModel = new KategoriModel();
        
        // Mengambil semua data kategori
        $data['categories'] = $KategoriModel->findAll();

        // Menampilkan view dengan data kategoris dan kategoriCount
        return view('kategori/index', $data);
    }
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) {

        return view('kategori/add');
    }
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function store()
    {
        $KategoriModel = new KategoriModel();
        
        // Ambil data dari request
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $icon = $this->request->getPost('icon');

        // Validasi ikon agar selalu memiliki prefix 'fa fa-'
        if (!empty($icon)) {
            if (strpos($icon, 'fa fa-') !== 0) {
                $icon = 'fa fa-' . trim($icon);
            }
        } else {
            $icon = 'fa fa-default'; // Default ikon jika kosong
        }

        // Siapkan data untuk disimpan
        $data = [
            'title'       => $title,
            'description' => $description,
            'icon'        => $icon,
        ];

        // Simpan data ke database
        if (!$KategoriModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $KategoriModel->errors());
        }

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('/kategori')->with('success', 'Data kategori berhasil disimpan!');
    }

    public function edit($id = null)
	{
        if (session('id_user')) {
        
		if($id != null) {
			$query = $this->db->table('tbl_kategori')->getWhere(['id_kategori' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['kategori'] = $query->getRow();
				return view('kategori/edit', $data);
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function update($id)
    {
        $KategoriModel = new KategoriModel();

        // Ambil data dari request
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $icon = $this->request->getPost('icon');

        // Validasi ikon agar selalu memiliki prefix 'fa fa-'
        if (!empty($icon)) {
            if (strpos($icon, 'fa fa-') !== 0) {
                $icon = 'fa fa-' . trim($icon);
            }
        } else {
            $icon = 'fa fa-default'; // Default ikon jika kosong
        }

        // Siapkan data yang akan diperbarui
        $data = [
            'title'       => $title,
            'description' => $description,
            'icon'        => $icon,
        ];

        // Update data kategori berdasarkan ID
        if (!$KategoriModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $KategoriModel->errors());
        }

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('/kategori')->with('success', 'Data kategori berhasil diperbarui!');
    }

    public function delete($id)
    {
        $KategoriModel = new KategoriModel();
        $KategoriModel->deleteKategori($id);

        return redirect()->to('/kategori');
    }
}
