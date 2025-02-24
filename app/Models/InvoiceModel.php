<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table      = 'tbl_invoice';
    protected $primaryKey = 'invoice_id';

    protected $allowedFields = ['invoice_id', 'id_user', 'room_id', 'booking_id', 'created_at', 'updated_at'];

    protected $useTimestamps = true; // Aktifkan timestamp untuk created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
