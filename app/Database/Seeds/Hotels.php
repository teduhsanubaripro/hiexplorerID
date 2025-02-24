<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Hotels extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Hotel Nusantara',
                'address' => 'Jalan Merdeka No. 1',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'country' => 'Indonesia',
                'postal_code' => '10110',
                'phone' => '0211234567',
                'email' => 'info@nusantarahotel.com',
                'website' => 'https://nusantarahotel.com',
                'rating' => 4.5,
                'facilities' => 'WiFi, Kolam Renang, Restoran',
                'price_per_night' => 750000.00,
				'created_at' => \CodeIgniter\I18n\Time::now(),
				'updated_at' => \CodeIgniter\I18n\Time::now(),
            ],
            [
                'name' => 'Hotel Bintang 5',
                'address' => 'Jalan Sudirman No. 99',
                'city' => 'Surabaya',
                'state' => 'Jawa Timur',
                'country' => 'Indonesia',
                'postal_code' => '60256',
                'phone' => '0317654321',
                'email' => 'contact@bintang5hotel.com',
                'website' => 'https://bintang5hotel.com',
                'rating' => 5.0,
                'facilities' => 'WiFi, Gym, Spa, Parkir Gratis',
                'price_per_night' => 1250000.00,
				'created_at' => \CodeIgniter\I18n\Time::now(),
				'updated_at' => \CodeIgniter\I18n\Time::now(),
            ],
        ];

        // Insert data to tbl_hotels
        $this->db->table('tbl_hotels')->insertBatch($data);
    }
}
