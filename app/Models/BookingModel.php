<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'tbl_bookings';
    protected $primaryKey = 'booking_id';
    protected $allowedFields = [
        'id_user', 'room_id', 'number_of_guests', 'check_in_date', 'check_out_date', 'description', 'total_amount', 'payment_method', 'status_booking', 'created_at', 'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getBookingCount($id_user)
    {
        return $this->where('id_user', $id_user)->countAllResults();
    }

    public function getBookingsByUser($userId)
    {
        return $this->select('tbl_bookings.*, tbl_rooms.room_type, tbl_rooms.price_per_night, users.name_user, tbl_hotels.name')
                    ->join('tbl_rooms', 'tbl_rooms.room_id = tbl_bookings.room_id')
                    ->join('tbl_hotels', 'tbl_hotels.hotel_id = tbl_rooms.hotel_id')
                    ->join('users', 'users.id_user = tbl_bookings.id_user')
                    ->where('tbl_bookings.id_user', $userId)
                    ->findAll();
    }

    // Di dalam BookingModel
    public function getBookingPayment($userId, $bookingId)
    {
        // Lakukan JOIN dengan tabel tbl_rooms, users, dan tbl_hotels
        return $this->db->table('tbl_bookings')
                        ->select('tbl_bookings.booking_id, tbl_bookings.number_of_guests, tbl_bookings.check_in_date, tbl_bookings.check_out_date, tbl_bookings.total_amount, tbl_rooms.room_type, 
                                users.name_user AS user_name, tbl_bookings.description, 
                                tbl_hotels.name AS hotel_name, tbl_hotels.address AS hotel_address')
                        ->join('tbl_rooms', 'tbl_rooms.room_id = tbl_bookings.room_id') // Join dengan tabel tbl_rooms
                        ->join('users', 'users.id_user = tbl_bookings.id_user') // Join dengan tabel users
                        ->join('tbl_hotels', 'tbl_hotels.hotel_id = tbl_rooms.hotel_id') // Join dengan tabel tbl_hotels
                        ->where('tbl_bookings.id_user', $userId)  // Pastikan kolom user_id ada di tabel booking
                        ->where('tbl_bookings.booking_id', $bookingId)  // Menambahkan kondisi booking_id
                        ->get()
                        ->getRowArray();  // Mengambil satu data dalam bentuk array
    }

    public function getBookingInvoice($bookingId)
    {
        return $this->select('tbl_bookings.*, tbl_rooms.room_type as room_name, tbl_rooms.price_per_night, 
                                tbl_hotels.name as hotel_name, tbl_hotels.address, users.name_user as user_name,
                                tbl_bookings.number_of_guests, users.email_user, tbl_invoice.invoice_id')
                    ->join('tbl_rooms', 'tbl_rooms.room_id = tbl_bookings.room_id')
                    ->join('tbl_hotels', 'tbl_hotels.hotel_id = tbl_rooms.hotel_id')
                    ->join('tbl_invoice', 'tbl_invoice.booking_id = tbl_bookings.booking_id')
                    ->join('users', 'users.id_user = tbl_bookings.id_user')
                    ->where('tbl_bookings.booking_id', $bookingId)
                    ->first();
    }
}
