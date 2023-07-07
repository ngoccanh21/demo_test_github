<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongke extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'donhang_ngaydat', 'sales', 'profit', 'quantity', 'total_order'
    ];
    protected $primaryKey = 'id_statistical';
    protected $table = 'tbl_statistical';
}
