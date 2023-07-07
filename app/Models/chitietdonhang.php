<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'don_hang_code', 'product_id', 'product_ten', 'product_anh', 'product_size', 'productsize_id', 'product_giaban', 'product_quantity', 'product_magiamgia', 'product_phiship'
    ];
    protected $primaryKey = 'chitiet_don_hang_id';
    protected $table = 'tbl_chitiet_don_hang';

    //không dùng nữa
    public function product()
    {
        return $this->belongsTo('App\Models\sanpham', 'product_id');
    }
    public function productsize_id_soluong()
    {
        return $this->belongsTo('App\Models\productsize', 'productsize_id');
    }
}
