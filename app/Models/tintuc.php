<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'tintuc_tieude', 'tintuc_noidung', 'tintuc_anh', 'tintuc_ngaydang', 'tintuc_trangthai', 'tintuc_luotxem'
    ];
    protected $primaryKey = 'tintuc_id';
    protected $table = 'tbl_tintuc';
}
