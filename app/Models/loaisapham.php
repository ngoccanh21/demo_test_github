<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisapham extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'category_ten', 'category_mota', 'category_trangthai'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';

    public function product()
    {
        return $this->hasMany('App\Models\sanpham');
    }
}
