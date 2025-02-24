<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomsModel extends Model
{
    protected $table            = 'tbl_rooms';
    protected $primaryKey       = 'room_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['hotel_id','room_type','price_per_night','status','description','image_url','amenities','created_at','updated_at'];

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

    // Menambahkan join untuk mengambil data rooms dan hotel
    public function getRoomsWithHotel()
    {
        return $this->select('tbl_rooms.*, tbl_hotels.rating, tbl_hotels.name AS hotels') // Memilih kolom yang diinginkan
                    ->join('tbl_hotels', 'tbl_hotels.hotel_id = tbl_rooms.hotel_id') // Join dengan tbl_hotels
                    ->findAll();
    }

    public function getRoomsByHotel($hotelId, $perPage, $currentPage)
    {
        return $this->select('tbl_rooms.room_id, tbl_rooms.room_type, tbl_rooms.price_per_night, tbl_rooms.image_url AS img, tbl_rooms.amenities AS extra, tbl_hotels.name as hotel_name')
                    ->join('tbl_hotels', 'tbl_rooms.hotel_id = tbl_hotels.hotel_id')
                    ->where('tbl_rooms.hotel_id', $hotelId)
                    ->where('status', 'Available')
                    ->paginate($perPage, 'default', $currentPage); // Apply pagination
    }

    public function deleteKey($id)
    {
        return $this->delete($id); // Melakukan delete data berdasarkan id
    }
}
