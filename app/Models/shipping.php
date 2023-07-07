<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class shipping extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'shipping_ten', 'shipping_email', 'shipping_sdt', 'shipping_diachi', 'shipping_ghichu', 'shipping_hinhthuc', 'shipping_tentp', 'shipping_tenqh', 'shipping_tenxa'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
    // public function shipping_matp()
    // {
    //     return $this->belongsTo('App\Models\thanhpho', 'matp');
    // }
    // public function shipping_maqh()
    // {
    //     return $this->belongsTo('App\Models\quanhuyen', 'maqh');
    // }
    // public function shipping_xaid()
    // {
    //     return $this->belongsTo('App\Models\xaphuong', 'xaid');
    // }
}
