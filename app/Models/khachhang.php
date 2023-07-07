<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'khachhang_ten', 'khachhang_email', 'khachhang_matkhau', 'khachhang_sdt', 'khachhang_vip', 'khachhang_token'
    ];
    protected $primaryKey = 'khachhang_id';
    protected $table = 'tbl_khachhang';
}
