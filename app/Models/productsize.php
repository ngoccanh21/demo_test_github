<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class productsize extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_id', 'size_id', 'quantity', 'soluongban'
    ];
    protected $primaryKey = 'productsize_id';
    protected $table = 'tbl_product_size';
    public function productsize()
    {
        return $this->belongsTo('App\Models\size', 'size_id');
    }
    public function productsanpham()
    {
        return $this->belongsTo('App\Models\sanpham', 'product_id');
    }
}
