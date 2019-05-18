<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    //
    protected $table = "hoc_sinh";
    public $timestamps = false;
//    public function lophoc(){
//
//        return $this->hasManyThrough('App\LopHoc','App\DanhSachHS','id_lop','id_danh_sach_hs','id');
//    }
    public function tongket(){
        return $this->hasOne('App\TongKet','id_hocsinh','id');
    }
}
