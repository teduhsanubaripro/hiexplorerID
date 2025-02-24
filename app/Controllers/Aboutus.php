<?php

namespace App\Controllers;

use App\Models\AboutusModel;

class Aboutus extends BaseController
{
    public function index()
    {
        if (session('id_user')) {

        // Jika sudah login, lanjutkan untuk mengambil data Aboutus
        $AboutusModel = new AboutusModel();

        // Mengambil semua data Aboutus
        $data['aboutus'] = $AboutusModel->findAll();

        // Menampilkan view dengan data Aboutus
        return view('aboutus/index', $data);
    }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) {
        
        return view('aboutus/add');
    }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function store()
    {
        $AboutusModel = new AboutusModel();
        $data = [
            'title'    => $this->request->getPost('title'),
            'description'=> $this->request->getPost('description'),
        ];
        $AboutusModel->save($data);

        return redirect()->to('/aboutus');
    }

    public function edit($id = null)
	{
        if (session('id_user')) {

		if($id != null) {
			$query = $this->db->table('tbl_aboutus')->getWhere(['id_aboutus' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['aboutus'] = $query->getRow();
				return view('aboutus/edit', $data);
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
        $AboutusModel = new AboutusModel();
        $data = [
            'title'    => $this->request->getPost('title'),
            'description'=> $this->request->getPost('description'),
        ];
        $AboutusModel->update($id, $data);

        return redirect()->to('/aboutus');
    }

    public function delete($id)
    {
        $AboutusModel = new AboutusModel();
        $AboutusModel->deleteAboutus($id);

        return redirect()->to('/aboutus');
    }
}
