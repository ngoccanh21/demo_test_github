<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'khachhang_id', 'shipping_id', 'don_hang_trangthai', 'don_hang_code', 'donhang_ngaydat', 'created_at', 'donhang_lydohuy'
    ];
    protected $primaryKey = 'don_hang_id';
    protected $table = 'tbl_don_hang';
    public function donhang_kh()
    {
        return $this->belongsTo('App\Models\khachhang', 'khachhang_id');
    }
}
