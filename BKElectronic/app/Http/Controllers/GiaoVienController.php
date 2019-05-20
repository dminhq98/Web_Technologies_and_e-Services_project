<?php

namespace App\Http\Controllers;

use App\BangDiem;
use App\BangDiemC1;
use App\BangTongKet;
use App\CuoiKiC1;
use App\DanhSachBD;
use App\DanhSachGV;
use App\DanhSachHS;
use App\DiemPhay;
use App\GiaoVien;
use App\GiuaKiC1;
use App\HeSo1;
use App\HeSo2;
use App\HeSo3;
use App\HocKi;
use App\HocSinh;
use App\MonHoc;
use App\NangLuc;
use App\PhamChat;
use App\ThuBao;
use App\Truong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiaoVienController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }
    public function getindex(){
        $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->get();
        $giaovien=$giaovien[$giaovien->count()-1];
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $thubao=ThuBao::Where('id_truong',$dsgv['id_truong'])->orderBy('id', 'desc')->take(5)->get();
        return view('giaovien.index',['thubao'=>$thubao]);
    }
    public function getThuBao(){
    $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->get();
    $giaovien=$giaovien[$giaovien->count()-1];
    $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
    $thubao=ThuBao::Where('id_truong',$dsgv['id_truong'])->orderBy('id', 'desc')->paginate(5);
    return view('giaovien.page.thubao',['thubao'=>$thubao]);
    // echo "thu Bao";
    }
    public function getDetalThuBao($id_thubao){
        $thubao=ThuBao::find($id_thubao);
        return view('giaovien.page.detalthubao',['thubao'=>$thubao]);
    }
    public function getDSLop(){
        $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->orderBy('id', 'desc')->take(15)->get();
        $gvmax=$giaovien[$giaovien->count()-1];
        $dsgvmax=DanhSachGV::find($gvmax['id_danh_sach_gv']);
        $truong=Truong::find($dsgvmax['id_truong']);
        $dsgv=DanhSachGV::Where('id_truong',$dsgvmax['id_truong'])->where('id_hocki',$dsgvmax['id_hocki'])->get();
        $gvds=array();
        foreach ($dsgv as $ds){
            foreach ($giaovien as $gv){
                if($gv['id_danh_sach_gv']==$ds['id']){
                    array_push($gvds,$gv);
                }
            }
        }

        return view('giaovien.page.dslop',['gvds'=>$gvds,'id_hocki'=>$dsgvmax['id_hocki']]);
    }
    public function getDetalDSLop($id_lop,$id_giaovien){
        $giaovien=GiaoVien::find($id_giaovien);
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $dshs=DanhSachHS::Where('id_lop',$id_lop)->where('id_hocki',$dsgv['id_hocki'])->get();
        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs[0]['id'])->get();
        return view('giaovien.page.deltallop',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'$id_giaovien'=>$id_giaovien]);
    }
    public function getNhapDiem(){
        $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->orderBy('id', 'desc')->take(15)->get();
        $gvmax=$giaovien[$giaovien->count()-1];
        $dsgvmax=DanhSachGV::find($gvmax['id_danh_sach_gv']);
        $truong=Truong::find($dsgvmax['id_truong']);
        $dsgv=DanhSachGV::Where('id_truong',$dsgvmax['id_truong'])->where('id_hocki',$dsgvmax['id_hocki'])->get();
        $gvds=array();
        foreach ($dsgv as $ds){
            foreach ($giaovien as $gv){
                if($gv['id_danh_sach_gv']==$ds['id']){
                    array_push($gvds,$gv);
                }
            }
        }
        return view('giaovien.page.nhapdiem',['gvds'=>$gvds,'id_hocki'=>$dsgvmax['id_hocki']]);
    }

    public function getDetalNhapDiem($id_lop,$id_giaovien,Request $request){
        $giaovien=GiaoVien::find($id_giaovien);
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $truong=Truong::find($dsgv['id_truong']);
        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
        $hocsinh1=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->first();

        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
        if($truong['level']==1){
            if($request->has("diem1".$hocsinh1['id'])){
                foreach ($hocsinh as $hs) {
                    $bd1 = BangDiemC1::where('id_hocsinh',$hs['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->count();
                   if($bd1==0){
                       $bangdiemc1=new BangDiemC1();
                       $bangdiemc1->id_hocsinh=$hs['id'];
                       $bangdiemc1->id_giaovien=$giaovien['id'];
                       $bangdiemc1->id_mon=$giaovien['id_mon'];
                       $bangdiemc1->save();
                      // print_r('hello');
                   }
                   $t1="diem1".$hs['id'];
                   $t2="diem2".$hs['id'];
                   $t3="diem3".$hs['id'];
                   $t4="diem4".$hs['id'];
                   $t5="diem5".$hs['id'];
                   $t6="diem6".$hs['id'];
                    $bangdiemc1 = BangDiemC1::where('id_hocsinh',$hs['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->first();
                    GiuaKiC1::Where('id_bangdiemc1',$bangdiemc1['id'])->delete();
                    CuoiKiC1::where('id_bangdiemc1',$bangdiemc1['id'])->delete();
                    $giuaki=new GiuaKiC1();
                    $cuoiki=new CuoiKiC1();
                    $giuaki->id_bangdiemc1=$bangdiemc1['id'];
                    $giuaki->muc_do=$request["$t1"];
                    $giuaki->diem=$request["$t2"];
                    $giuaki->nhan_xet=$request["$t3"];
                    $giuaki->save();
                    $cuoiki->id_bangdiemc1=$bangdiemc1['id'];
                    $cuoiki->muc_do=$request["$t4"];
                    $cuoiki->diem=$request["$t5"];
                    $cuoiki->nhan_xet=$request["$t6"];
                    $cuoiki->save();
                }
                return view('giaovien.page.detalnhapdiemc1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
            }else{
                return view('giaovien.page.detalnhapdiemc1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
            }
        }else{
            $i=0;
            if($request->has("diem1".$hocsinh1['id'])){
                foreach ($hocsinh as $hs) {
                    //print_r($hs);
                    $tongket = BangTongKet::where('id_hocsinh',$hs['id'])->first();
                    $dsbd = DanhSachBD::where('id_tongket', $tongket['id'])->first();
                    // print_r($dsbd['id']);
                    $bd=BangDiem::Where('id_danh_sach_bd',$dsbd['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->count();
                    $i++;
                    $t1="diem1".$hs['id'];
                    $t2="diem2".$hs['id'];
                    $t3="diem3".$hs['id'];
                    $t4="diem4".$hs['id'];
                    $t5="diem5".$hs['id'];
                    $t6="diem6".$hs['id'];
                    $diem1=$request["$t1"];
                    $diem2=$request["$t2"];
                    $diem3=$request["$t3"];
                    $diem4=$request["$t4"];
                    $diem5=$request["$t5"];
                    $diem6=$request["$t6"];
                    $dem=0;
                    if($diem1!=null){
                        $dem++;
                    }
                    if ($diem2!=null){
                        $dem++;
                    }
                    if ($diem3!=null){
                        $dem++;
                    }
                    if ($diem4!=null){
                        $dem=$dem+2;
                    }
                    if ($diem5!=null){
                        $dem=$dem+2;
                    }
                    if ($diem6!=null){
                        $dem=$dem+3;
                    }
                    if ($dem==0){
                        $dem=1;
                    }
                    if($bd==0){
                        $bangdiem=new BangDiem();
                        $bangdiem->id_danh_sach_bd=$dsbd['id'];
                        $bangdiem->id_giaovien=$id_giaovien;
                        $bangdiem->id_mon=$giaovien['id_mon'];
                        $bangdiem->save();
                        $so1=new HeSo1();
                        $so2=new HeSo1();
                        $so3=new HeSo1();
                        $so4=new HeSo2();
                        $so5=new HeSo2();
                        $so6=new  HeSo3();
                        $so1->id_bangdiem=$bangdiem['id'];
                        $so1->diem=$diem1;
                        $so1->save();
                        $so2->id_bangdiem=$bangdiem['id'];
                        $so2->diem=$diem2;
                        $so2->save();
                        $so3->id_bangdiem=$bangdiem['id'];
                        $so3->diem=$diem3;
                        $so3->save();
                        $so4->id_bangdiem=$bangdiem['id'];
                        $so4->diem=$diem4;
                        $so4->save();
                        $so5->id_bangdiem=$bangdiem['id'];
                        $so5->diem=$diem5;
                        $so5->save();
                        $so6->id_bangdiem=$bangdiem['id'];
                        $so6->diem=$diem6;
                        $so6->save();
                        $diemphay=new DiemPhay();
                        $diemphay->id_bangdiem=$bangdiem['id'];
                        $diem=($diem1+$diem2+$diem3+$diem4+$diem4+$diem5+$diem5+$diem6+$diem6+$diem6)/$dem;
                        $diemphay->diem=round($diem, 2);
                        $diemphay->save();
                    }else{
                        $bangdiem=BangDiem::Where('id_danh_sach_bd',$dsbd['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->first();
                        HeSo1::Where('id_bangdiem',$bangdiem['id'])->delete();
                        HeSo2::Where('id_bangdiem',$bangdiem['id'])->delete();
                        HeSo3::Where('id_bangdiem',$bangdiem['id'])->delete();
                        DiemPhay::Where('id_bangdiem',$bangdiem['id'])->delete();
                        $so1=new HeSo1();
                        $so2=new HeSo1();
                        $so3=new HeSo1();
                        $so4=new HeSo2();
                        $so5=new HeSo2();
                        $so6=new  HeSo3();
                        $so1->id_bangdiem=$bangdiem['id'];
                        $so1->diem=$diem1;
                        $so1->save();
                        $so2->id_bangdiem=$bangdiem['id'];
                        $so2->diem=$diem2;
                        $so2->save();
                        $so3->id_bangdiem=$bangdiem['id'];
                        $so3->diem=$diem3;
                        $so3->save();
                        $so4->id_bangdiem=$bangdiem['id'];
                        $so4->diem=$diem4;
                        $so4->save();
                        $so5->id_bangdiem=$bangdiem['id'];
                        $so5->diem=$diem5;
                        $so5->save();
                        $so6->id_bangdiem=$bangdiem['id'];
                        $so6->diem=$diem6;
                        $so6->save();
                        $diemphay=new DiemPhay();
                        $diemphay->id_bangdiem=$bangdiem['id'];
                        $diem=($diem1+$diem2+$diem3+$diem4+$diem4+$diem5+$diem5+$diem6+$diem6+$diem6)/$dem;
                        $diemphay->diem=round($diem, 2);
                        $diemphay->save();
                    }
                    $bangdiem1 = BangDiem::where('id_danh_sach_bd', $dsbd['id'])->get();
                    $tong = 0;
                    $i = 0;
                    $gioi = 0;
                    $kha = 0;
                    $tb = 0;
                    $yeu = 0;
                    $temp1 = 0;
                    $temp2 = 0;
                    $temp3 = 0;
                    $temp4 = 0;
                    foreach ($bangdiem1 as $bd) {
                        $mon = MonHoc::find($bd['id_mon']);
                        if ($mon['ten_mon'] == "Toán" or $mon['ten_mon'] == "Văn") {
                            $diemphay = DiemPhay::where('id_bangdiem', $bd['id'])->first();
                            $tong += $diemphay['diem'];
                            $i++;
                            if ($diemphay['diem'] >= 8) {
                                if ($temp1 == 0) {
                                    $gioi = $gioi + 2;
                                    $temp1 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 6.5) {
                                if (temp2 == 0) {
                                    $kha = $kha + 2;
                                    $temp2 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 5.0) {

                                if (temp3 == 0) {
                                    $tb = $tb + 2;
                                    $temp3 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 3.5) {
                                if (temp4 == 0) {
                                    $yeu = $yeu + 2;
                                    $temp4 = 1;
                                }
                            }

                        } else {
                            $diemphay = DiemPhay::where('id_bangdiem', $bd['id'])->first();
                            $tong += $diemphay['diem'];
                            $i++;
                            if ($diemphay['diem'] >= 6.5) {
                                $gioi++;
                            } elseif ($diemphay['diem'] >= 5.0) {
                                $kha++;
                            } elseif ($diemphay['diem'] >= 3.5) {
                                $tb++;
                            } elseif ($diemphay['diem'] >= 2.0) {
                                $yeu++;
                            }
                        }
                    }

                        if ($i == 0) {
                            $tongket->diem_phay_cuoi = null;
                            $diem=null;
                        } else {
                            $diem = round($tong / $i, 1);
                            $tongket->diem_phay_cuoi = $diem;
                        }
                        if ($diem > 8) {
                            if ($gioi == $i) {
                                $tongket->hoc_luc = "Giỏi";
                            } elseif ($kha == $i) {
                                $tongket->hoc_luc = "Khá";
                            } elseif ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 6.5) {
                            if ($kha == $i) {
                                $tongket->hoc_luc = "Khá";
                            } elseif ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 5.0) {
                            if ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 3.5) {
                            if ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        }
                        if($diem==null){
                            $tongket->hoc_luc = null;
                        }
                        $tongket->save();


                }
                return view('giaovien.page.detalnhapdiem',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);

            }else{
                return view('giaovien.page.detalnhapdiem',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
            }
        }

    }
//    public function getDiemc1($id_lop,$id_giaovien){
//        $giaovien=GiaoVien::find($id_giaovien);
//        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
//        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
//        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
//        return view('giaovien.page.themdiemc1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien,'id_dshs'=>$dshs[0]['id']]);
//    }
    public function getDiem($id_lop,$id_giaovien){
        $giaovien=GiaoVien::find($id_giaovien);
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $truong=Truong::find($dsgv['id_truong']);
        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
        if($truong['level']==1){
            return view('giaovien.page.themdiemc1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien,'id_dshs'=>$dshs[0]['id']]);
        }else{
            return view('giaovien.page.themdiem',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien,'id_dshs'=>$dshs[0]['id']]);
        }
    }

    public function getDanhGia(){
        $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->orderBy('id', 'desc')->take(15)->get();
        $gvmax=$giaovien[$giaovien->count()-1];
        $dsgvmax=DanhSachGV::find($gvmax['id_danh_sach_gv']);
        $truong=Truong::find($dsgvmax['id_truong']);
        $dsgv=DanhSachGV::Where('id_truong',$dsgvmax['id_truong'])->where('id_hocki',$dsgvmax['id_hocki'])->get();
        $gvds=array();
        foreach ($dsgv as $ds){
            foreach ($giaovien as $gv){
                if($gv['id_danh_sach_gv']==$ds['id']){
                    array_push($gvds,$gv);
                }
            }
        }
        return view('giaovien.page.danhgia',['gvds'=>$gvds,'id_hocki'=>$dsgvmax['id_hocki']]);
    }
    public function getDetalDanhGia($id_lop,$id_giaovien,Request $request){
        $giaovien=GiaoVien::find($id_giaovien);
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $truong=Truong::find($dsgv['id_truong']);
        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
        $hocsinh1=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->first();
        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
        if($truong['level']==1){
            if($request->has("diem1".$hocsinh1['id'])){
                foreach ($hocsinh as $hs){
                    $t1="diem1".$hs['id'];
                    $t2="diem2".$hs['id'];
                    $t3="diem3".$hs['id'];
                    $t4="diem4".$hs['id'];
                    $t5="diem5".$hs['id'];
                    $t6="diem6".$hs['id'];
                    $t7="diem7".$hs['id'];
                    $t8="diem8".$hs['id'];
                    $t9="diem9".$hs['id'];
                    NangLuc::where('id_hocsinh',$hs['id'])->where('id_giaovien',$id_giaovien)->delete();
                    PhamChat::where('id_hocsinh',$hs['id'])->where('id_giaovien',$id_giaovien)->delete();
                    $nangluc=new NangLuc();
                    $phamchat=new  PhamChat();
                    $nangluc->id_hocsinh=$hs['id'];
                    $nangluc->id_giaovien=$id_giaovien;
                    $nangluc->muc_do1=$request["$t1"];
                    $nangluc->muc_do2=$request["$t2"];
                    $nangluc->muc_do3=$request["$t3"];
                    $nangluc->nhan_xet=$request["$t4"];
                    $nangluc->save();
                    $phamchat->id_hocsinh=$hs['id'];
                    $phamchat->id_giaovien=$id_giaovien;
                    $phamchat->muc_do1=$request["$t5"];
                    $phamchat->muc_do2=$request["$t6"];
                    $phamchat->muc_do3=$request["$t7"];
                    $phamchat->muc_do4=$request["$t8"];
                    $phamchat->nhan_xet=$request["$t9"];
                    $phamchat->save();
                }
            }
            return view('giaovien.page.detaldanhgiac1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
        }else{
            if($request->has("hanhkiem".$hocsinh1['id'])) {
                foreach ($hocsinh as $hs) {
                    $t1 = "hanhkiem" . $hs['id'];
                    $t2 = "nhanxet" . $hs['id'];
                    $tongket = BangTongKet::Where('id_hocsinh', $hs['id'])->first();
                    $tongket->hanh_kiem = $request["$t1"];
                    $tongket->nhan_xet = $request["$t2"];
                    $tongket->save();
                    $dsbd = DanhSachBD::Where('id_tongket', $tongket['id'])->first();
                    $bangdiem = BangDiem::where('id_danh_sach_bd', $dsbd['id'])->get();
                    $tong = 0;
                    $i = 0;
                    $gioi = 0;
                    $kha = 0;
                    $tb = 0;
                    $yeu = 0;
                    $temp1 = 0;
                    $temp2 = 0;
                    $temp3 = 0;
                    $temp4 = 0;
                    foreach ($bangdiem as $bd) {
                        $mon = MonHoc::find($bd['id_mon']);
                        if ($mon['ten_mon'] == "Toán" or $mon['ten_mon'] == "Văn") {
                            $diemphay = DiemPhay::where('id_bangdiem', $bd['id'])->first();
                            $tong += $diemphay['diem'];
                            $i++;
                            if ($diemphay['diem'] >= 8) {
                                if ($temp1 == 0) {
                                    $gioi = $gioi + 2;
                                    $temp1 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 6.5) {
                                if (temp2 == 0) {
                                    $kha = $kha + 2;
                                    $temp2 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 5.0) {

                                if (temp3 == 0) {
                                    $tb = $tb + 2;
                                    $temp3 = 1;
                                }
                            } elseif ($diemphay['diem'] >= 3.5) {
                                if (temp4 == 0) {
                                    $yeu = $yeu + 2;
                                    $temp4 = 1;
                                }
                            }

                        } else {
                            $diemphay = DiemPhay::where('id_bangdiem', $bd['id'])->first();
                            $tong += $diemphay['diem'];
                            $i++;
                            if ($diemphay['diem'] >= 6.5) {
                                $gioi++;
                            } elseif ($diemphay['diem'] >= 5.0) {
                                $kha++;
                            } elseif ($diemphay['diem'] >= 3.5) {
                                $tb++;
                            } elseif ($diemphay['diem'] >= 2.0) {
                                $yeu++;
                            }
                        }

                        if ($i == 0) {
                            $tongket->diem_phay_cuoi = null;
                            $diem=null;
                        } else {
                            $diem = round($tong / $i, 1);
                            $tongket->diem_phay_cuoi = $diem;
                        }
                        if ($diem > 8) {
                            if ($gioi == $i) {
                                $tongket->hoc_luc = "Giỏi";
                            } elseif ($kha == $i) {
                                $tongket->hoc_luc = "Khá";
                            } elseif ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 6.5) {
                            if ($kha == $i) {
                                $tongket->hoc_luc = "Khá";
                            } elseif ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 5.0) {
                            if ($tb == $i) {
                                $tongket->hoc_luc = "Trung Bình";
                            } elseif ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        } elseif ($diem > 3.5) {
                            if ($yeu == $i) {
                                $tongket->hoc_luc = "Yếu";
                            } else {
                                $tongket->hoc_luc = "Kém";
                            }
                        }
                        if($diem==null){
                            $tongket->hoc_luc = null;
                        }
                        $tongket->save();
                    }
                }
            }
            return view('giaovien.page.detaldanhgia',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
        }
    }
    public function getThemDanhGia($id_lop,$id_giaovien){
        $giaovien=GiaoVien::find($id_giaovien);
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $truong=Truong::find($dsgv['id_truong']);
        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
        if($truong['level']==1){
            return view('giaovien.page.nhapdanhgiac1',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
        }else{
            return view('giaovien.page.nhapdanhgia',['hocsinh'=>$hocsinh,'id_lop'=>$id_lop,'id_giaovien'=>$id_giaovien]);
        }
    }

//    public function postDiem($id_lop,$id_giaovien,Request $request){
//        print_r($request);
//        $giaovien=GiaoVien::find($id_giaovien);
//        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
//        $dshs=DanhSachHS::Where([['id_lop','=',$id_lop],['id_hocki','=', $dsgv['id_hocki']]])->first();
//        $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();
//      //  $mon=MonHoc::find($giaovien['id_mon']);
//       // print_r($hocsinh);
//
//       return redirect("giaovien/nhapdiem/$id_lop/$id_giaovien")->with('thanhcong',"Đã nhập điểm vào hệ thống");
//    }
    public function getTTTaiKhoan(){
        $giaovien=GiaoVien::Where('id_taikhoan',Auth::id())->orderBy('id', 'desc')->take(15)->get();
        $giaovien=$giaovien[$giaovien->count()-1];
        $dsgv=DanhSachGV::find($giaovien['id_danh_sach_gv']);
        $truong=Truong::find($dsgv['id_truong']);
        return view('giaovien.page.tttaikhoan',['giaovien'=>$giaovien,'truong'=>$truong]);
    }
    public function doiMatKhau(){
        return view('giaovien.page.doimatkhau');
        //echo "doi mat khau";
    }
}
