<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'size_ten', 'size_trangthai'
    ];
    protected $primaryKey = 'size_id';
    protected $table = 'tbl_size';
}
