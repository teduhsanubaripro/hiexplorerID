<?php

namespace App\Controllers\Fe;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HotelsModel;
use App\Models\RoomsModel;
use App\Models\BookingModel;

class Offers extends BaseController
{
    public function index()
    {
        $hotelsModel = new HotelsModel();

        // Menentukan jumlah data per halaman
        $perPage = 3;

        // Mendapatkan nomor halaman saat ini, default halaman 1
        $currentPage = $this->request->getVar('page') ?: 1;

        // Mengambil data hotel dengan pagination
        $data['hotels'] = $hotelsModel->paginate($perPage, 'default', $currentPage);

        // Menggunakan template pagination kustom
        $data['pager'] = $hotelsModel->pager;
        $data['pager']->setPath('offers'); // Sesuaikan dengan route Anda

        // Kirim data ke view
        return view('front/offers', $data);
    }

    // Fungsi detail untuk menampilkan data detail hotel
    public function detail($name)
    {
        $hotelsModel = new HotelsModel();
        $roomsModel = new RoomsModel();

        // Mendapatkan data hotel berdasarkan nama
        $hotel = $hotelsModel->where('name', urldecode($name))->first();

        if (!$hotel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Mendapatkan data kamar berdasarkan hotel_id dengan pagination
        $perPage = 3; // Tentukan jumlah data per halaman
        $currentPage = $this->request->getVar('page') ?: 1; // Mendapatkan nomor halaman saat ini, default halaman 1

        // Mengambil data kamar berdasarkan hotel_id dan mengaplikasikan pagination
        $rooms = $roomsModel->getRoomsByHotel($hotel['hotel_id'], $perPage, $currentPage);
        
        // Menambahkan pagination untuk kamar
        $pager = $roomsModel->pager; // Dapatkan objek pager dari model

        // Kirim data ke view
        return view('front/single_listing', ['hotel' => $hotel, 'rooms' => $rooms, 'pager' => $pager]);
    }

    public function checkout($roomId)
    {
        $roomsModel = new RoomsModel();
        $bookingModel = new BookingModel();

        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(site_url('login'))->with('error', 'Anda harus login untuk melakukan checkout.');
        }

        // Ambil data kamar berdasarkan room_id
        $room = $roomsModel->where('room_id', $roomId)->first();

        if (!$room) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil jumlah booking user yang sedang login
        $id_user = session()->get('id_user');
        $booking_count = $bookingModel->where('id_user', $id_user)->countAllResults();

        // Kirim data kamar dan jumlah booking ke view
        return view('front/checkout', [
            'room' => $room,
            'user' => session()->get(),
            'booking_count' => $booking_count, // Kirim jumlah booking
        ]);
    }

    public function confirm()
    {
        $post = $this->request->getPost();
        $bookingModel = new BookingModel();
        $roomsModel = new RoomsModel();

        // Validasi input checkout
        if (!$this->validate([
            'room_id' => 'required|integer',
            'check_in_date' => 'required|valid_date',
            'check_out_date' => 'required|valid_date',
            'total_amount' => 'required|numeric' // Pastikan total_amount adalah angka
        ])) {
            return redirect()->back()->with('error', 'Harap isi semua data dengan benar.');
        }

        $room = $roomsModel->where('room_id', $post['room_id'])->first();
        if (!$room) {
            return redirect()->back()->with('error', 'Kamar tidak ditemukan.');
        }

        // Ambil total harga dari form, bukan hitung ulang!
        $totalPrice = floatval(str_replace(',', '', $post['total_amount'])); // Pastikan angka bersih

        // Simpan ke database
        $bookingModel->save([
            'id_user' => session()->get('id_user'),
            'room_id' => $post['room_id'],
            'number_of_guests' => $post['number_of_guests'],
            'check_in_date' => $post['check_in_date'],
            'check_out_date' => $post['check_out_date'],
            'description' => $post['description'],
            'status_booking' => 'pending', 
            'total_amount' => $totalPrice, // Gunakan harga dari input!
        ]);

        return redirect()->to(site_url('booking'))->with('success', 'Pemesanan berhasil, silakan lanjutkan pembayaran.');
    }
}
