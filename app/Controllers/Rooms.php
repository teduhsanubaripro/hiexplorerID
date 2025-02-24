<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoomsModel;
use App\Models\HotelsModel;

class Rooms extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            // Jika sudah login, arahkan ke halaman rooms
            $roomsModel = new RoomsModel();
            
            // Mengambil data kamar dengan hotel menggunakan join
            $data['rooms'] = $roomsModel->getRoomsWithHotel(); // Memanggil method join

            // Menampilkan view dengan data rooms dan keyCount
            return view('back/rooms/index', $data);  // Menampilkan halaman rooms
        }
        
        // Jika belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function add()
    {
        if (session('id_user')) {
            // Ambil data dari model hotel, bukan rooms
            $hotelsModel = new HotelsModel(); // Pastikan ada model HotelsModel
            $data['hotels'] = $hotelsModel->findAll(); // Ambil semua data hotel

            // Kirimkan data hotel ke view
            return view('back/rooms/add', $data);
        }
        return view('auth/login');
    }

    public function edit($id = null)
    {
        // Cek apakah pengguna sudah login
        if (session('id_user')) {
            
            if ($id != null) {
                // Query untuk mengambil data dari tabel rooms berdasarkan ID
                $query = $this->db->table('tbl_rooms')->getWhere(['room_id' => $id]);
                
                // Cek apakah data ditemukan
                if ($query->resultID->num_rows > 0) {
                    // Ambil data room
                    $data['rooms'] = $query->getRow(); // Pastikan ini adalah objek, bukan array

                    // Query untuk mengambil data dari tabel hotel
                    $hotelQuery = $this->db->table('tbl_hotels')->get();
                    // Ambil semua data hotel
                    $data['hotels'] = $hotelQuery->getResult();  // ini adalah array objek

                    // Kirim data room dan hotel ke view
                    return view('back/rooms/edit', $data);
                } else {
                    // Jika data tidak ditemukan, lemparkan PageNotFoundException
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                // Jika ID tidak valid, lemparkan PageNotFoundException
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
        
        // Jika pengguna belum login, arahkan ke halaman login
        return view('auth/login');
    }

    public function store()
    {
        $roomsModel = new RoomsModel();

        // Ambil data dari form
        $hotel_id = $this->request->getPost('hotel_id');
        $room_type = $this->request->getPost('room_type');
        $amenities = $this->request->getPost('amenities');
        $price_per_night = $this->request->getPost('price_per_night');
        $status = $this->request->getPost('status');
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
                    $image->move(WRITEPATH . '../public/uploads/rooms', $newName);
                    
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
            'hotel_id' => $hotel_id,
            'room_type' => $room_type,
            'amenities' => $amenities,
            'price_per_night' => $price_per_night,
            'status' => $status,
            'description' => $description,
            'image_url' => $image_urls, // Simpan nama file gambar yang di-upload
            'created_at' => \CodeIgniter\I18n\Time::now(),
        ];

        // Simpan data ke database
        $roomsModel->save($data);

        // Redirect ke halaman /roomsModel setelah berhasil
        return redirect()->to('/rooms');
    }

    public function update($id)
    {
        $roomsModel = new RoomsModel();
        
        $hotel_id = $this->request->getPost('hotel_id');
        $room_type = $this->request->getPost('room_type');
        $amenities = $this->request->getPost('amenities');
        $price_per_night = $this->request->getPost('price_per_night');
        $status = $this->request->getPost('status');
        $description = $this->request->getPost('description');
        
        $existingData = $roomsModel->find($id);
        $existingImages = $existingData['image_url'] ?? '';
        
        $imageFiles = $this->request->getFiles();
        
        $uploadedImages = [];
        if (isset($imageFiles['image_url']) && $imageFiles['image_url']) {
            foreach ($imageFiles['image_url'] as $image) {
                if ($image->isValid() && ! $image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(WRITEPATH . '../public/uploads/rooms', $newName);

                    $uploadedImages[] = $newName;
                }
            }
        }

        $image_urls = implode(',', $uploadedImages);
        $amenities = implode(',', $amenities);

        if (!empty($existingImages)) {
            $oldImages = explode(',', $existingImages);
            foreach ($oldImages as $oldImage) {
                $imagePath = WRITEPATH . '../public/uploads/rooms/' . trim($oldImage);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
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
            'hotel_id' => $hotel_id,
            'room_type' => $room_type,
            'amenities' => $amenities,
            'price_per_night' => $price_per_night,
            'status' => $status,
            'description' => $description,
            'image_url' => $image_urls, // Simpan nama file gambar yang di-upload
            'updated' => \CodeIgniter\I18n\Time::now(),
        ];

        // Update data di database
        $roomsModel->update($id, $data);

        // Redirect ke halaman /rentcar setelah berhasil
        return redirect()->to('/rooms');
    }

    public function delete($id)
    {
        $roomsModel = new RoomsModel();
        $roomsModel->deleteKey($id);

        return redirect()->to('/rooms');
    }
}
