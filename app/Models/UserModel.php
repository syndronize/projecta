<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $fillable =[
        'username',
        'role',
        'password',
    ];
}
