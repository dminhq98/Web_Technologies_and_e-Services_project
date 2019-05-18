<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhSachHS extends Model
{
    //
    protected $table = "danh_sach_hs";
    public $timestamps = false;
    public function hocsinh(){
        return $this->hasOne('App\HocSinh','id_danh_sach_hs','id');

    }
//    public function tongket(){
//        return $this->hasManyThrough('App\HocSinh','App\BangTongKet','id_danh_sach_hs','id_tongket','id');
//
//    }
}
