<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HotelsModel;

class Hotels extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman key
            $hotelModels = new HotelsModel();
            
            // Mengambil semua data key
            $data['hotels'] = $hotelModels->findAll();

            // Menampilkan view dengan data hotels dan keyCount
            return view('back/hotels/index', $data);  // Menampilkan halaman key
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('back/hotels/add');
        }
        return view('auth/login');
    }

    public function store()
    {
        $hotelModels = new HotelsModel();

        // Ambil data dari form
        $name = $this->request->getPost('name');
        $address = $this->request->getPost('address');
        $amenities = $this->request->getPost('amenities');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $rating = $this->request->getPost('rating');
        $description = $this->request->getPost('description');

        // Mendapatkan file gambar yang di-upload
        $imageFiles = $this->request->getFiles();
        
        // Menyimpan nama file gambar yang di-upload
        $uploadedImages = [];
        if (isset($imageFiles['image_url']) && $imageFiles['image_url']) {
            foreach ($imageFiles['image_url'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    // Membuat nama file random berupa integer
                    $newName = random_int(100000000000, 999999999999) . '.' . $image->getExtension();
                    
                    // Pindahkan gambar ke folder uploads dengan nama baru
                    $image->move(WRITEPATH . '../public/uploads/hotel', $newName);
                    
                    // Simpan nama file gambar (bukan URL penuh) dalam array
                    $uploadedImages[] = $newName;
                }
            }
        }

        // Gabungkan nama file gambar menjadi string yang dipisahkan koma
        $image_urls = implode(',', $uploadedImages);
        $amenities = implode(',', $amenities);

        // Data yang akan disimpan
        $data = [
            'name' => $name,
            'address' => $address,
            'amenities' => $amenities,
            'phone' => $phone,
            'email' => $email,
            'rating' => $rating,
            'description' => $description,
            'image_url' => $image_urls, // Simpan nama file gambar yang di-upload
            'created_at' => \CodeIgniter\I18n\Time::now(),
        ];

        // Simpan data ke database
        $hotelModels->save($data);

        // Redirect ke halaman /roomsModel setelah berhasil
        return redirect()->to('/hotels');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_hotels')->getWhere(['hotel_id' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['hotels'] = $query->getRow();
				return view('back/hotels/edit', $data);
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
        $hotelModels = new HotelsModel();
        
        // Ambil data dari form
        $name = $this->request->getPost('name');
        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $rating = $this->request->getPost('rating');

        // Data yang akan diupdate
        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'rating' => $rating,
            'updated_at' => \CodeIgniter\I18n\Time::now(),
        ];

        // Update data di database
        $hotelModels->update($id, $data);

        // Redirect ke halaman /hotels setelah berhasil
        return redirect()->to('/hotels');
    }

    public function delete($id)
    {
        $keyModel = new KeyModel();
        $keyModel->deleteKey($id);

        return redirect()->to('/hotels');
    }
}
