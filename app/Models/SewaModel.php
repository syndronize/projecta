<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaModel extends Model
{
    protected $table = "sewa";
    protected $primaryKey = "id";
    protected $fillable =[
        'user_id',
        'barang_id',
        'jumlah',
        'lama_sewa',
        'tgl_kembali',
        'aktif',
    ];
}
