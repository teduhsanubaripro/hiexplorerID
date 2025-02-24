<?php

namespace App\Controllers;

use App\Models\KeyModel;

class Keyfeatures extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman key
            $keyModel = new KeyModel();
            
            // Mengambil semua data key
            $data['keys'] = $keyModel->findAll();

            // Menampilkan view dengan data keys dan keyCount
            return view('key/index', $data);  // Menampilkan halaman key
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('key/add');
        }
        return view('auth/login');
    }

    public function store()
    {
        $keyModel = new KeyModel();
        
        // Ambil data dari form
        $description = $this->request->getPost('description');
        $icon = $this->request->getPost('icon');
        
        // Pastikan icon diawali dengan 'fa fa-'
        $icon = 'fa fa-' . $icon;

        // Data yang akan disimpan
        $data = [
            'description' => $description,
            'icon' => $icon,
        ];

        // Simpan data ke database
        $keyModel->save($data);

        // Redirect ke halaman /keyfeatures setelah berhasil
        return redirect()->to('/keyfeatures');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_key')->getWhere(['id_key' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['keys'] = $query->getRow();
				return view('key/edit', $data);
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
        return view('auth/login');
    }

    public function update($id)
    {
        $keyModel = new KeyModel();
        
        // Ambil data dari form
        $description = $this->request->getPost('description');
        $icon = $this->request->getPost('icon');
        
        // Pastikan icon diawali dengan 'fa fa-'
        $icon = 'fa fa-' . $icon;

        // Data yang akan diupdate
        $data = [
            'description' => $description,
            'icon' => $icon,
        ];

        // Update data di database
        $keyModel->update($id, $data);

        // Redirect ke halaman /keyfeatures setelah berhasil
        return redirect()->to('/keyfeatures');
    }

    public function delete($id)
    {
        $keyModel = new KeyModel();
        $keyModel->deleteKey($id);

        return redirect()->to('/keyfeatures');
    }
}
