<?php

namespace App\Controllers;

use App\Models\VisionModel;

class Vision extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman vision
            $visionModel = new VisionModel();
            
            // Mengambil semua data vision
            $data['vision'] = $visionModel->findAll();

            // Menghitung jumlah data vision
            $data['visionCount'] = $visionModel->countAll();

            // Menampilkan view dengan data visions dan visionCount
            return view('vision/index_v', $data);  // Menampilkan halaman vision
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('vision/add_v');
        }
        return view('auth/login');
    }

    public function store()
    {
        $visionModel = new VisionModel();
        $data = [
            'description'=> $this->request->getPost('description'),
        ];
        $visionModel->save($data);

        return redirect()->to('/vision');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_vision')->getWhere(['id_vision' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['vision'] = $query->getRow();
				return view('vision/edit_v', $data);
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
        $visionModel = new VisionModel();
        $data = [
            'description'=> $this->request->getPost('description'),
        ];
        $visionModel->update($id, $data);

        return redirect()->to('/vision');
    }

    public function delete($id)
    {
        $visionModel = new VisionModel();
        $visionModel->deleteVision($id);

        return redirect()->to('/vision');
    }
}
