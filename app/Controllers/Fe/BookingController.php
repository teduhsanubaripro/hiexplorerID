<?php

namespace App\Controllers\Fe;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoomsModel;
use App\Models\BookingModel;
use App\Models\InvoiceModel;

class BookingController extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('id_user')) {
            return redirect()->to(site_url('login'))->with('error', 'Anda harus login untuk melihat booking Anda.');
        }

        $userId = session()->get('id_user'); // Mendapatkan ID user dari session
        $bookingModel = new BookingModel();

        // Ambil data booking berdasarkan user yang login
        $bookings = $bookingModel->getBookingsByUser($userId);

        // Kirim data booking ke view
        return view('front/booking_list', [
            'bookings' => $bookings,
        ]);
    }

    // Fungsi untuk menampilkan halaman pembayaran
    public function payment($booking_id)
    {
        // Ambil ID pengguna dari session (sesuaikan jika menggunakan metode lain untuk otentikasi)
        $userId = session()->get('id_user');
        
        // Pastikan userId ada dalam session, jika tidak, redirect ke halaman login
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please log in to view your bookings');
        }

        // Load model BookingModel untuk mengambil data booking
        $bookingModel = new BookingModel();

        // Ambil data booking berdasarkan booking_id dan user_id
        $booking = $bookingModel->getBookingPayment($userId, $booking_id); // Sesuaikan dengan method getBookingByUser di model

        // Cek jika booking tidak ditemukan
        if (!$booking) {
            // Redirect ke halaman error atau tampilkan pesan jika tidak ada data booking
            return redirect()->to('/')->with('error', 'Booking not found!');
        }

        // Pass data booking ke view pembayaran
        return view('front/payment', ['booking' => $booking]);
    }

    public function confirmPayment()
    {
        $bookingsModel = new BookingModel();
        $roomsModel = new RoomsModel();
        $invoiceModel = new InvoiceModel(); // Tambahkan model untuk tbl_invoice

        $idUser = $this->request->getPost('id_user');
        $paymentMethod = $this->request->getPost('payment_method');

        if (!$idUser || !$paymentMethod) {
            return redirect()->back()->with('error', 'Invalid request. Please try again.');
        }

        // Ambil data booking berdasarkan user_id dan status pending
        $booking = $bookingsModel->where('id_user', $idUser)
                                ->where('status_booking', 'pending')
                                ->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'No pending booking found.');
        }

        // Update status booking menjadi confirmed
        $bookingsModel->update($booking['booking_id'], [
            'payment_method' => $paymentMethod,
            'status_booking' => 'confirmed', 
            'updated_at' => date('Y-m-d H:i:s') 
        ]);

        // Ubah status room menjadi "Booked"
        $roomId = $booking['room_id'];
        $roomsModel->update($roomId, ['status' => 'Booked']);

        // Generate random invoice_id (kombinasi string dan angka)
        $invoiceId = 'INV-' . strtoupper(bin2hex(random_bytes(4))) . rand(1000, 9999);

        // Insert data ke tabel invoice
        $invoiceData = [
            'invoice_id' => $invoiceId,
            'id_user' => $idUser,
            'room_id' => $roomId,
            'booking_id' => $booking['booking_id'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        $invoiceModel->insert($invoiceData);

        return redirect()->to('/booking')->with('success', 'Payment successfully confirmed and invoice created.');
    }

    public function invoice($bookingId)
    {
        $bookingModel = new BookingModel();

        // Ambil data booking dan pembayaran
        $booking = $bookingModel->getBookingInvoice($bookingId);

        if (!$booking) {
            return redirect()->to('/booking')->with('error', 'Booking tidak ditemukan.');
        }

        return view('front/invoice', ['booking' => $booking]);
    }
}
