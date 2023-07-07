<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magiamgia extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'magiamgia_ten',  'magiamgia_code',  'magiamgia_soluong', 'magiamgia_loaigiamgia', 'magiamgia_sotiengiam', 'magiamgia_ngaybatdau', 'magiamgia_ngayketthuc', 'magiamgia_trangthai', 'magiamgia_user_id'
    ];
    protected $primaryKey = 'magiamgia_id';
    protected $table = 'tbl_magiamgia';
}
