<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    protected $table = "penilaian";
    protected $primaryKey = "id";
    protected $fillable =[
        'user_id',
        'barang_id',
        'peforma',
        'kualitas',
        'pelayanan',
        'nilai_akhir'
    ];
}
