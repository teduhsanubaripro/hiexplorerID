<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman Product
            $productModel = new ProductModel();
            
            // Mengambil semua data Product
            $data['product'] = $productModel->findAll();

            // Menampilkan view dengan data Products dan ProductCount
            return view('product/index', $data);  // Menampilkan halaman Product
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('product/add');
        }
        return view('auth/login');
    }

    public function store()
    {
        $ProductModel = new ProductModel();
        $data = [
            'company'    => $this->request->getPost('company'),
            'tagline'    => $this->request->getPost('tagline'),
            'description'=> $this->request->getPost('description'),
            'address'    => $this->request->getPost('address'),
            'phone'      => $this->request->getPost('phone'),
            'email'      => $this->request->getPost('email'),
        ];
        $ProductModel->save($data);

        return redirect()->to('/product');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_product')->getWhere(['id_product' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['product'] = $query->getRow();
				return view('product/edit', $data);
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
        $ProductModel = new ProductModel();
        $data = [
            'company'    => $this->request->getPost('company'),
            'tagline'    => $this->request->getPost('tagline'),
            'description'=> $this->request->getPost('description'),
            'address'    => $this->request->getPost('address'),
            'phone'      => $this->request->getPost('phone'),
            'email'      => $this->request->getPost('email'),
        ];
        $ProductModel->update($id, $data);

        return redirect()->to('/product');
    }

    public function delete($id)
    {
        $ProductModel = new ProductModel();
        $ProductModel->deleteProduct($id);

        return redirect()->to('/product');
    }
}
