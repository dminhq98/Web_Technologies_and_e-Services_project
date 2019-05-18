<?php

namespace App\Http\Controllers;

use App\BangDiemC1;
use App\BangTongKet;
use App\DanhSachHS;
use App\GiaoVien;
use App\HocSinh;
use App\LopDay;
use App\LopHoc;
use App\MonHoc;
use App\NangLuc;
use App\PhamChat;
use App\Truong;
use App\User;
use App\VanThu;
use Illuminate\Http\Request;
use App\ThongBao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HocSinhController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //public $quantri=Auth::quantri();
    public function getindex(){
        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        $hs=$hocsinh[$hocsinh->count()-1];
        $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
        $lop=LopHoc::find($dshs['id_lop']);
        //  $truong=Truong::find($lop['id_truong']);
        $thongbao=ThongBao::Where('id_truong',$lop['id_truong'])->orderBy('id', 'desc')->take(5)->get();
        return view('hocsinh.index',['thongbao'=>$thongbao]);
    }
    public function getThongBao(){
        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        $hs=$hocsinh[$hocsinh->count()-1];
        $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
        $lop=LopHoc::find($dshs['id_lop']);
      //  $truong=Truong::find($lop['id_truong']);
        $thongbao=ThongBao::Where('id_truong',$lop['id_truong'])->orderBy('id', 'desc')->paginate(5);
       return view('hocsinh.page.thongbao',['thongbao'=>$thongbao]);
    }
    public function getDetalThongBao($id_thongbao){
        $thongbao=ThongBao::find($id_thongbao);
        return view('hocsinh.page.detalthongbao',['thongbao'=>$thongbao]);
    }
    public function getDSLop($id_hk){
        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        foreach ($hocsinh as $hs){
            $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
            if($dshs['id_hocki']==$id_hk) break;
        }
        $dslophs=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
        return view('hocsinh.page.dslop',['dslophs'=>$dslophs]);
    }
    public function getDSGiaoVien($id_hk){
        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        $hsinh=null;
        foreach ($hocsinh as $hs){
            $hsinh=$hs;
            $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
            if($dshs['id_hocki']==$id_hk) break;
        }
        $gvcn=GiaoVien::find($dshs['id_giaovien']);
//        $mon=MonHoc::find($gvcn['id_mon']);
        $lop=LopHoc::find($dshs['id_lop']);
        $truong=Truong::find($lop['id_truong']);
        $lopday=LopDay::where('id_hocki',$id_hk)->where('id_lop',$lop['id'])->get();
//        if($truong['level']==2){
//            $tongket=BangTongKet::Where('id_hocsinh',$hsinh['id'])->get();
//            if(count($tongket)){
//                $tongket=$tongket[0];
//                $dsbd=\App\DanhSachBD::Where('id_tongket',$tongket['id'])->get();
//                $bangdiem=\App\BangDiem::Where('id_danh_sach_bd',$dsbd[0]['id'])->get();
//            }else{
//                $bangdiem=[];
//            }
//
//        }else{
//            $bangdiem=BangDiemC1::Where('id_hocsinh',$hsinh['id'])->get();
//        }
        return view('hocsinh.page.dsgiaovien',['lopday'=>$lopday,'gvcn'=>$gvcn]);

    }
    public function getPhieuDanhGia(){
        return view('hocsinh.page.phieudanhgia');
    }
    public function getDiem($id_hk){
        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        $hsinh=null;
        foreach ($hocsinh as $hs){
            $hsinh=$hs;
            $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
            if($dshs['id_hocki']==$id_hk) break;
        }
        $lop=LopHoc::find($dshs['id_lop']);
        $truong=Truong::find($lop['id_truong']);
        $tongket=BangTongKet::Where('id_hocsinh',$hsinh['id'])->get();
        $bangdiemc1=BangDiemC1::Where('id_hocsinh',$hsinh['id'])->get();
        if(count($tongket))
        {
            $tongket=$tongket[0];
         //   print_r($tongket);
        }else{
            $tongket=array("hoc_luc"=>"0","diem_phay_cuoi"=>0,"hanh_kiem"=>"0");
         //   print_r($tongket);
        }
        if($truong['level']==2){
            return view('hocsinh.page.bangdiemtrunghoc',['tongket'=>$tongket,'lop'=>$lop]);
        }else{
           return view('hocsinh.page.bangdiemtieuhoc',['bangdiemc1'=>$bangdiemc1,'lop'=>$lop,'hsinh'=>$hsinh]);
        }
    }
    public function getTTTaiKhoan(){
        //$hocsinh=Auth::quantri()->hocsinh()->toArray();

        $hocsinh=HocSinh::Where('id_taikhoan',Auth::id())->get();
        $hs=$hocsinh[$hocsinh->count()-1];
        $dshs=DanhSachHS::find($hs['id_danh_sach_hs']);
        $lop=LopHoc::find($dshs['id_lop']);
        $truong=Truong::find($lop['id_truong']);
        //var_dump($hs['id_danh_sach_hs']);
        return view('hocsinh.page.tttaikhoan',['hs'=>$hs,'lop'=>$lop,'truong'=>$truong]);
    }
    public function doiMatKhau(){
        return view('hocsinh.page.doimatkhau');
    }


}
