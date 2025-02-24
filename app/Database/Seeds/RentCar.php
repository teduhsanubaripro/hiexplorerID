<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RentCar extends Seeder
{
    public function run()
    {
        $data = [
            [
                'car_name'      => 'Avanza',
                'car_brand'     => 'Toyota',
                'car_model'     => 'G 1.5',
                'license_plate' => 'B 1234 XYZ',
                'price_per_day' => 300000,
                'is_available'  => 1,
                'description'   => 'Mobil keluarga dengan kapasitas 7 penumpang.',
                'image_url'     => 'https://example.com/images/avanza.jpg',
                'created_at' => \CodeIgniter\I18n\Time::now(),
				'updated_at' => \CodeIgniter\I18n\Time::now(),
            ],
            [
                'car_name'      => 'Jazz',
                'car_brand'     => 'Honda',
                'car_model'     => 'RS',
                'license_plate' => 'D 5678 ABC',
                'price_per_day' => 350000,
                'is_available'  => 1,
                'description'   => 'Mobil hatchback yang stylish dan hemat bahan bakar.',
                'image_url'     => 'https://example.com/images/jazz.jpg',
                'created_at' => \CodeIgniter\I18n\Time::now(),
				'updated_at' => \CodeIgniter\I18n\Time::now(),
            ],
        ];

        // Insert data ke tabel rent_car
        $this->db->table('tbl_rent_car')->insertBatch($data);
    }
}
