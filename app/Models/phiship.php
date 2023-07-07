<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phiship extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'phiship_matp',  'phiship_maqh',  'phiship_xaid', 'phiship_phiship'
    ];
    protected $primaryKey = 'phiship_id';
    protected $table = 'tbl_phiship';
    public function thanhpho()
    {
        return $this->belongsTo('App\Models\thanhpho', 'phiship_matp');
    }
    public function quanhuyen()
    {
        return $this->belongsTo('App\Models\quanhuyen', 'phiship_maqh');
    }
    public function xaphuong()
    {
        return $this->belongsTo('App\Models\xaphuong', 'phiship_xaid');
    }
}
