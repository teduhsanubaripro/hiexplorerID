<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Membuat data contoh untuk tbl_rooms
        $data = [
            [
                'hotel_id'      => 1, // ID hotel yang sudah ada, misalnya hotel_id = 1
                'room_type'     => 'Single',
                'price_per_night' => 300000.00,
                'status'        => 'Available',
                'amenities'     => 'AC, WiFi, TV, Kamar Mandi Pribadi',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'hotel_id'      => 1, // ID hotel yang sudah ada
                'room_type'     => 'Double',
                'price_per_night' => 500000.00,
                'status'        => 'Booked',
                'amenities'     => 'AC, WiFi, TV, Kamar Mandi Pribadi, Mini Bar',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'hotel_id'      => 2, // ID hotel lain
                'room_type'     => 'Suite',
                'price_per_night' => 800000.00,
                'status'        => 'Available',
                'amenities'     => 'AC, WiFi, TV, Kamar Mandi Pribadi, Jacuzzi, Mini Bar',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        // Menambahkan data ke tabel tbl_rooms
        $this->db->table('tbl_rooms')->insertBatch($data);
    }
}
