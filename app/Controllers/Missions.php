<?php

namespace App\Controllers;

use App\Models\MissionsModel;
use App\Models\VisionModel;

class Missions extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman vision
            $missionsModel = new MissionsModel();
            
            // Mengambil semua data vision
            $data['missions'] = $missionsModel->findAll();

            // Menampilkan view dengan data visions dan visionCount
            return view('vision/index_m', $data);  // Menampilkan halaman vision
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('vision/add_m');
        }
        return view('auth/login');
    }

    public function store()
    {
        $missionsModel = new MissionsModel();
        $data = [
            'description'=> $this->request->getPost('description'),
        ];
        $missionsModel->save($data);

        return redirect()->to('/missions')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_missions')->getWhere(['id_missions' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['missions'] = $query->getRow();
				return view('vision/edit_m', $data);
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
        $missionsModel = new MissionsModel();
        $data = [
            'description'=> $this->request->getPost('description'),
        ];
        $missionsModel->update($id, $data);

        return redirect()->to('/missions');
    }

    public function delete($id)
    {
        $missionsModel = new MissionsModel();
        $missionsModel->deleteMissions($id);

        return redirect()->to('/missions');
    }
}
