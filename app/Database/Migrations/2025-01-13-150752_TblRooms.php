<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblRooms extends Migration
{
    public function up()
    {
        // Membuat tabel tbl_rooms
        $this->forge->addField([
            'room_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'hotel_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'room_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'price_per_night' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Available', 'Booked', 'Out of Service'],
                'default' => 'Available',
            ],
            'amenities' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
        ]);

        // Menambahkan foreign key
        $this->forge->addKey('room_id', true); // Primary key
        $this->forge->addForeignKey('hotel_id', 'tbl_hotels', 'hotel_id', 'CASCADE', 'CASCADE'); // Foreign key ke tabel tbl_hotels

        // Membuat tabel
        $this->forge->createTable('tbl_rooms');
    }

    public function down()
    {
        // Menghapus tabel tbl_rooms
        $this->forge->dropTable('tbl_rooms');
    }
}
