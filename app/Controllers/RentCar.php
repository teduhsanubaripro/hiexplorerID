<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RentCarModel;

class RentCar extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman key
            $rentCar = new RentCarModel();
            
            // Mengambil semua data key
            $data['rentcar'] = $rentCar->findAll();

            // Menampilkan view dengan data RentCar dan keyCount
            return view('back/rentcar/index', $data);  // Menampilkan halaman key
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) 
        {

            return view('back/rentcar/add');
        }
        return view('auth/login');
    }

    public function store()
    {
        $rentCar = new RentCarModel();

        // Ambil data dari form
        $car_name = $this->request->getPost('car_name');
        $car_brand = $this->request->getPost('car_brand');
        $car_model = $this->request->getPost('car_model');
        $price_per_day = $this->request->getPost('price_per_day');
        $license_plate = $this->request->getPost('license_plate');
        $description = $this->request->getPost('description');
        $is_availabe = $this->request->getPost('is_availabe');

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
                    $image->move(WRITEPATH . '../public/uploads/car', $newName);
                    
                    // Simpan nama file gambar (bukan URL penuh) dalam array
                    $uploadedImages[] = $newName;
                }
            }
        }

        // Gabungkan nama file gambar menjadi string yang dipisahkan koma
        $image_urls = implode(',', $uploadedImages);

        // Data yang akan disimpan
        $data = [
            'car_name' => $car_name,
            'car_brand' => $car_brand,
            'car_model' => $car_model,
            'price_per_day' => $price_per_day,
            'license_plate' => $license_plate,
            'description' => $description,
            'is_availabe' => $is_availabe,
            'image_url' => $image_urls, // Simpan nama file gambar yang di-upload
            'created_at' => \CodeIgniter\I18n\Time::now(),
        ];

        // Simpan data ke database
        $rentCar->save($data);

        // Redirect ke halaman /RentCar setelah berhasil
        return redirect()->to('/rentcar');
    }

    public function edit($id = null)
	{
        if (session('id_user')) 
        {
        
		if($id != null) {
			$query = $this->db->table('tbl_rent_car')->getWhere(['rent_car_id' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['rentcar'] = $query->getRow();
				return view('back/rentcar/edit', $data);
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
        $rentCar = new RentCarModel();
        
        // Ambil data dari form
        $car_name = $this->request->getPost('car_name');
        $car_brand = $this->request->getPost('car_brand');
        $car_model = $this->request->getPost('car_model');
        $license_plate = $this->request->getPost('license_plate');
        $description = $this->request->getPost('description');
        $is_availabe = $this->request->getPost('is_availabe');
        
        // Mendapatkan data yang sudah ada berdasarkan ID
        $existingData = $rentCar->find($id);
        $existingImages = $existingData['image_url'] ?? ''; // Ambil image_url yang lama
        
        // Mendapatkan gambar-gambar yang di-upload (Memeriksa apakah ada input dengan nama 'image_url')
        $imageFiles = $this->request->getFiles();
        
        // Pastikan bahwa 'image_url' ada dan di-upload
        $uploadedImages = [];
        if (isset($imageFiles['image_url']) && $imageFiles['image_url']) {
            foreach ($imageFiles['image_url'] as $image) {
                if ($image->isValid() && ! $image->hasMoved()) {
                    // Pindahkan gambar ke folder uploads
                    $newName = $image->getRandomName();
                    $image->move(WRITEPATH . '../public/uploads/car', $newName);

                    // Simpan nama file gambar dalam array
                    $uploadedImages[] = $newName;
                }
            }
        }

        // Jika ada gambar yang di-upload, gabungkan URL-nya
        $image_urls = implode(',', $uploadedImages);

        // Jika ada gambar lama, hapus gambar-gambar yang sudah tidak digunakan
        if (!empty($existingImages)) {
            $oldImages = explode(',', $existingImages);
            foreach ($oldImages as $oldImage) {
                $imagePath = WRITEPATH . '../public/uploads/' . trim($oldImage);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Hapus gambar lama
                }
            }
        }

        // Jika ada gambar baru, gabungkan dengan gambar lama yang masih ada
        if (!empty($image_urls)) {
            $image_urls = $image_urls; // Update dengan gambar baru
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $image_urls = $existingImages;
        }

        // Data yang akan diupdate
        $data = [
            'car_name' => $car_name,
            'car_brand' => $car_brand,
            'car_model' => $car_model,
            'license_plate' => $license_plate,
            'description' => $description,
            'is_availabe' => $is_availabe,
            'image_url' => $image_urls, // Simpan URL gambar yang di-upload
            'updated_at' => \CodeIgniter\I18n\Time::now(),
        ];

        // Update data di database
        $rentCar->update($id, $data);

        // Redirect ke halaman /rentcar setelah berhasil
        return redirect()->to('/rentcar');
    }

    public function delete($id)
    {
        $rentCar = new RentCarModel();
        $rentCar->deleteKey($id);

        return redirect()->to('/rentcar');
    }
}
