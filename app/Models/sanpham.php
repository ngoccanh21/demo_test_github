<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_ten', 'category_id', 'product_mota', 'product_giaban', 'product_anh', 'product_trangthai', 'product_size', 'product_soluong', 'product_soluongban', 'product_luotxem'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    public function category()
    {
        return $this->belongsTo('App\Models\loaisapham', 'category_id');
    }
}
