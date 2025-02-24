<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman profile
            $profileModel = new ProfileModel();
            
            // Mengambil semua data profile
            $data['profiles'] = $profileModel->findAll();

            // Menghitung jumlah data profile
            $data['profileCount'] = $profileModel->countAll();

            // Menampilkan view dengan data profiles dan profileCount
            return view('profile/index', $data);  // Menampilkan halaman profile
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('profile/add');
        }
        return view('auth/login');
    }

    public function store()
    {
        $profileModel = new ProfileModel();
        $data = [
            'company'    => $this->request->getPost('company'),
            'tagline'    => $this->request->getPost('tagline'),
            'description'=> $this->request->getPost('description'),
            'address'    => $this->request->getPost('address'),
            'phone'      => $this->request->getPost('phone'),
            'email'      => $this->request->getPost('email'),
        ];
        $profileModel->save($data);

        return redirect()->to('/profile');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_profile')->getWhere(['id_profile' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['profile'] = $query->getRow();
				return view('profile/edit', $data);
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
        $profileModel = new ProfileModel();
        $data = [
            'company'    => $this->request->getPost('company'),
            'tagline'    => $this->request->getPost('tagline'),
            'description'=> $this->request->getPost('description'),
            'address'    => $this->request->getPost('address'),
            'phone'      => $this->request->getPost('phone'),
            'email'      => $this->request->getPost('email'),
        ];
        $profileModel->update($id, $data);

        return redirect()->to('/profile');
    }

    public function delete($id)
    {
        $profileModel = new ProfileModel();
        $profileModel->deleteProfile($id);

        return redirect()->to('/profile');
    }
}
