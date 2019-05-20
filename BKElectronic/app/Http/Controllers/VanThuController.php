<?php

namespace App\Http\Controllers;

use App\BangTongKet;
use App\DanhSachBD;
use App\DanhSachGV;
use App\DanhSachHS;
use App\GiaoVien;
use App\GiuaKiC1;
use App\HocKi;
use App\HocSinh;
use App\LopDay;
use App\LopHoc;
use App\MonHoc;
use App\ThongBao;
use App\ThuBao;
use App\User;
use App\VanThu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VanThuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex(){
        return view('vanthu.index');
    }

    public function getdsThongbao(){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thongbao=ThongBao::where('id_truong',$vanthu['id_truong'])->orderBy('id', 'desc')->paginate(5);
        return view('vanthu.page.dsthongbao',['thongbao'=>$thongbao]);
    }
    public function getdetalThongbao($id_thongbao){
        $thongbao=ThongBao::find($id_thongbao);
        return view('vanthu.page.detalthongbao',['thongbao'=>$thongbao]);
    }
    public function themThongBao(){
        return view('vanthu.page.themthongbao');
    }
    public function postthemThongBao(Request $request){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
        ],[
            'tieude.required'=>"Bạn chưa nhập tiêu đề",
            'tomtat.required'=>"Bạn chưa nhập tóm tắt",
            'noidung.required'=>"Bạn chưa nhập nội dung",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thongbao=new ThongBao();
        $thongbao->tieu_de=$request['tieude'];
        $thongbao->tom_tat=$request['tomtat'];
        $thongbao->noi_dung=$request['noidung'];
        $thongbao->id_vanthu=$vanthu['id'];
        $thongbao->id_truong=$vanthu['id_truong'];
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="png" and $duoi!="jpg" and $duoi!="jpeg"){
                return redirect('vanthu/thongbao/themthongbao')->with('thongbao',"Ảnh chỉ được chọn đuôi jpg,png,jpeg");
            }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_">$name;
            while (file_exists("image/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("image",$hinh);
            $thongbao->image=$hinh;
        }
        $thongbao->save();
        return redirect('vanthu/thongbao/themthongbao')->with('thanhcong',"Đã thêm thành công");
    }
    public function suaThongBao($id_thongbao){
        $thongbao=ThongBao::find($id_thongbao);
        return view('vanthu.page.suathongbao',['thongbao'=>$thongbao]);
    }
    public function postsuaThongBao(Request $request,$id_thongbao){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
        ],[
            'tieude.required'=>"Bạn chưa nhập tiêu đề",
            'tomtat.required'=>"Bạn chưa nhập tóm tắt",
            'noidung.required'=>"Bạn chưa nhập nội dung",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thongbao=ThongBao::find($id_thongbao);
        $thongbao->tieu_de=$request['tieude'];
        $thongbao->tom_tat=$request['tomtat'];
        $thongbao->noi_dung=$request['noidung'];
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="png" and $duoi!="jpg" and $duoi!="jpeg"){
                return redirect("vanthu/thongbao/suathongbao/$id_thongbao")->with('thongbao',"Ảnh chỉ được chọn đuôi jpg,png,jpeg");
            }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_">$name;
            while (file_exists("image/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("image",$hinh);
            $thongbao->image=$hinh;
        }
        $thongbao->save();
        return redirect("vanthu/thongbao/suathongbao/$id_thongbao")->with('thanhcong',"Đã sửa thành công");
    }
    public function getdsThubao(){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thubao=ThuBao::where('id_truong',$vanthu['id_truong'])->orderBy('id', 'desc')->paginate(5);
        return view('vanthu.page.dsthubao',['thubao'=>$thubao]);
    }
    public function getdetalThubao($id_thubao){
        $thubao=ThuBao::find($id_thubao);
        return view('vanthu.page.detalthubao',['thubao'=>$thubao]);
    }
    public function themThuBao(){

        return view('vanthu.page.themthubao');
    }
    public function postthemThuBao(Request $request){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
        ],[
            'tieude.required'=>"Bạn chưa nhập tiêu đề",
            'tomtat.required'=>"Bạn chưa nhập tóm tắt",
            'noidung.required'=>"Bạn chưa nhập nội dung",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thubao=new ThuBao();
        $thubao->tieu_de=$request['tieude'];
        $thubao->tom_tat=$request['tomtat'];
        $thubao->noi_dung=$request['noidung'];
        $thubao->id_vanthu=$vanthu['id'];
        $thubao->id_truong=$vanthu['id_truong'];
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="png" and $duoi!="jpg" and $duoi!="jpeg"){
                return redirect('vanthu/thubao/themthubao')->with('thongbao',"Ảnh chỉ được chọn đuôi jpg,png,jpeg");
            }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_">$name;
            while (file_exists("image/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("image",$hinh);
            $thubao->image=$hinh;
        }
        $thubao->save();
        return redirect('vanthu/thubao/themthubao')->with('thanhcong',"Đã thêm thành công");
    }
    public function suaThuBao($id_thubao){
        $thubao=ThuBao::find($id_thubao);
        return view('vanthu.page.suathubao',['thubao'=>$thubao]);
    }

    public function postsuaThuBao(Request $request,$id_thubao){
        $this->validate($request,[
            'tieude'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
        ],[
            'tieude.required'=>"Bạn chưa nhập tiêu đề",
            'tomtat.required'=>"Bạn chưa nhập tóm tắt",
            'noidung.required'=>"Bạn chưa nhập nội dung",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        $thubao=ThuBao::find($id_thubao);
        $thubao->tieu_de=$request['tieude'];
        $thubao->tom_tat=$request['tomtat'];
        $thubao->noi_dung=$request['noidung'];
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="png" and $duoi!="jpg" and $duoi!="jpeg"){
                return redirect("vanthu/thubao/suathubao/$id_thubao")->with('thongbao',"Ảnh chỉ được chọn đuôi jpg,png,jpeg");
            }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_">$name;
            while (file_exists("image/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("image",$hinh);
            $thubao->image=$hinh;
        }
        $thubao->save();
        return redirect("vanthu/thubao/suathubao/$id_thubao")->with('thanhcong',"Đã sửa thành công");
    }

    public function getdsgiaovien(){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->count();
        if($dsgv==0){
            $ds=new DanhSachGV();
            $ds->id_truong=$vanthu['id_truong'];
            $ds->id_hocki=$hk;
            $ds->save();
        }
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->first();
        //print_r($dsgv);
        $giaovien=GiaoVien::where('id_danh_sach_gv',$dsgv['id'])->paginate(10);
        return view('vanthu.giaovien.dsgiaovien',['giaovien'=>$giaovien]);
    }
    public function themgiaovien(){
        return view('vanthu.giaovien.themgiaovien');
    }
    public function postthemgiaovien(Request $request){
        $this->validate($request,[
            'hoten'=>'required',
            'ngaysinh'=>'required',
            'sdt'=>'required',
            'email'=>'required',
            'mon'=>'required',
            'diachi'=>'required',
        ],[
            'hoten.required'=>"Bạn chưa nhập Họ Tên",
            'ngaysinh.required'=>"Bạn chưa nhập Ngày sinh",
            'sdt.required'=>"Bạn chưa nhập SĐT",
            'email.required'=>"Bạn chưa nhập Email",
            'mon.required'=>"Bạn chưa nhập Môn học",
            'diachi.required'=>"Bạn chưa nhập Địa chỉ",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->count();
        if($dsgv==0){
            $ds=new DanhSachGV();
            $ds->id_truong=$vanthu['id_truong'];
            $ds->id_hocki=$hk;
            $ds->save();
        }
        $mon=MonHoc::where('ten_mon',$request['mon'])->count();
        if($mon==0){
            return redirect('vanthu/giaovien/themgiaovien')->with('thongbao',"Môn học chưa chính xác");
        }
        $mon=MonHoc::where('ten_mon',$request['mon'])->first();
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->first();
        $gv=new GiaoVien();
        $gv->id_danh_sach_gv=$dsgv['id'];
        $gv->id_mon=$mon['id'];
        $gv->ho_ten=$request['hoten'];
        $gv->ngay_sinh=$request['ngaysinh'];
        if($request['msgv']){
            $gv->id_taikhoan=$request['msgv'];
        }else{
            $usergv=new User();
            $id=(User::count()+1);
            $name="GV".$id;
            $usergv->name=$name;
            $usergv->password=bcrypt($name);
            $usergv->email=$request['email'];
            $usergv->level=3;
            $usergv->save();
            $gv->id_taikhoan=$usergv['id'];
        }

        if($request['nam']){
            $gv->gioi_tinh="Nam";
        }else{
            $gv->gioi_tinh="Nữ";
        }

        $gv->so_dien_thoai=$request['sdt'];
        $gv->email=$request['email'];
        $gv->dia_chi=$request['diachi'];
        $gv->save();
        return redirect('vanthu/giaovien/themgiaovien')->with('thanhcong',"Đã thêm thành công");
    }
    public function getdshocsinh(){
        return view('vanthu.hocsinh.dshocsinh');
    }
    public function getdetaldshocsinh($id_lop){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dshs=DanhSachHS::where('id_lop',$id_lop)->where('id_hocki',$hk)->count();
        if($dshs==0){
            $hocsinh=array();
        }else{
            $dshs=DanhSachHS::where('id_lop',$id_lop)->where('id_hocki',$hk)->first();
            $hocsinh=HocSinh::Where('id_danh_sach_hs',$dshs['id'])->get();

        }
        return view('vanthu.hocsinh.detaldshocsinh',['hocsinh'=>$hocsinh,'lop'=>LopHoc::find($id_lop)]);
    }
    public  function suagiaovien($id_giaovien){
        $giaovien=GiaoVien::find($id_giaovien);
        return view('vanthu.giaovien.suagiaovien',['giaovien'=>$giaovien]);
    }

    public function postsuagiaovien(Request $request,$id_giaovien){
        $this->validate($request,[
            'hoten'=>'required',
            'ngaysinh'=>'required',
            'sdt'=>'required',
            'email'=>'required',
            'mon'=>'required',
            'diachi'=>'required',
        ],[
            'hoten.required'=>"Bạn chưa nhập Họ Tên",
            'ngaysinh.required'=>"Bạn chưa nhập Ngày sinh",
            'sdt.required'=>"Bạn chưa nhập SĐT",
            'email.required'=>"Bạn chưa nhập Email",
            'mon.required'=>"Bạn chưa nhập Môn học",
            'diachi.required'=>"Bạn chưa nhập Địa chỉ",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->count();
        if($dsgv==0){
            $ds=new DanhSachGV();
            $ds->id_truong=$vanthu['id_truong'];
            $ds->id_hocki=$hk;
            $ds->save();
        }
        $mon=MonHoc::where('ten_mon',$request['mon'])->count();
        if($mon==0){
            return redirect("vanthu/giaovien/sua/$id_giaovien")->with('thongbao',"Môn học chưa chính xác");
        }
        $mon=MonHoc::where('ten_mon',$request['mon'])->first();
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->first();
        $gv=GiaoVien::find($id_giaovien);
        $gv->id_danh_sach_gv=$dsgv['id'];
        $gv->id_mon=$mon['id'];
        $gv->ho_ten=$request['hoten'];
        $gv->ngay_sinh=$request['ngaysinh'];
        if($request['msgv']){
            $gv->id_taikhoan=$request['msgv'];
        }else{
            $usergv=new User();
            $id=(User::count()+1);
            $name="GV".$id;
            $usergv->name=$name;
            $usergv->password=bcrypt($name);
            $usergv->email=$request['email'];
            $usergv->level=3;
            $usergv->save();
            $name="GV".$usergv['id'];
            $usergv->name="GV".$usergv['id'];
            $usergv->password=bcrypt($name);
            $usergv->save();
            $gv->id_taikhoan=$usergv['id'];
        }

        if($request['nam']){
            $gv->gioi_tinh="Nam";
        }else{
            $gv->gioi_tinh="Nữ";
        }

        $gv->so_dien_thoai=$request['sdt'];
        $gv->email=$request['email'];
        $gv->dia_chi=$request['diachi'];
        $gv->save();
        return redirect("vanthu/giaovien/sua/$id_giaovien")->with('thanhcong',"Đã sửa thành công");
    }
    public function postthemhocsinh(Request $request){
        $this->validate($request,[
            'hoten'=>'required',
            'ngaysinh'=>'required',
            'diachi'=>'required',
            'lop'=>'required',
        ],[
            'hoten.required'=>"Bạn chưa nhập Họ Tên",
            'ngaysinh.required'=>"Bạn chưa nhập Ngày sinh",
            'diachi.required'=>"Bạn chưa nhập Địa chỉ",
            'lop.required'=>"Bạn chưa nhập Lớp",
        ]);
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');

        $lop=LopHoc::where('id_truong',$vanthu['id_truong'])->where('ten_lop',$request['lop'])->count();
        if($lop==0){
            return redirect('vanthu/hocsinh/themhocsinh')->with('thongbao',"Lớp không tồn tại");
        }else{
            $lop=LopHoc::where('id_truong',$vanthu['id_truong'])->where('ten_lop',$request['lop'])->first();
            $dshs=DanhSachHS::where('id_lop',$lop['id'])->where('id_hocki',$hk)->count();
            if($dshs==0){
                $ds=new DanhSachHS();
                $ds->id_lop=$lop['id'];
                $ds->id_hocki=$hk;
                $ds->save();
            }
        }
        $dshs=DanhSachHS::where('id_lop',$lop['id'])->where('id_hocki',$hk)->first();
        $hocsinh=new HocSinh();
        $hocsinh->id_danh_sach_hs=$dshs['id'];
        $hocsinh->ho_ten=$request['hoten'];
        if($request['nam']){
            $hocsinh->gioi_tinh="Nam";
        }else{
            $hocsinh->gioi_tinh="Nữ";
        }
        $hocsinh->ngay_sinh=$request['ngaysinh'];
        $hocsinh->dia_chi=$request['diachi'];
        if($request['mshs']){
            $hocsinh->id_taikhoan=$request['mshs'];
        }else{
            $user=new User();
            $id=User::count()+1;
            $name="HS".$id;
            $user->name=$name;
            $user->email="0";
            $user->level=4;
            $user->password=bcrypt($name);
            $user->save();
            $name="HS".$user['id'];
            $user->password=bcrypt($name);
            $user->save();
            $hocsinh->id_taikhoan=$user['id'];
        }
        $hocsinh->save();
        $tongket=new BangTongKet();
        $tongket->id_hocsinh=$hocsinh['id'];
        $tongket->save();
        $dsbd=new DanhSachBD();
        $dsbd->id_tongket=$tongket['id'];
        $dsbd->id_hocki=$hk;
        $dsbd->save();
        return redirect('vanthu/hocsinh/themhocsinh')->with('thanhcong',"Đã thêm thành công");
    }
    public function suashocsinh($id_hs){
        $hocsinh=HocSinh::find($id_hs);
        return view('vanthu.hocsinh.suahocsinh',['hocsinh'=>$hocsinh]);
    }
    public function postsuashocsinh(Request $request,$id_hs){
    $user=Auth::user();
    $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
    $hk=HocKi::max('id');
    $lop=LopHoc::where('id_truong',$vanthu['id_truong'])->where('ten_lop',$request['lop'])->count();
        $this->validate($request,[
            'hoten'=>'required',
            'ngaysinh'=>'required',
            'diachi'=>'required',
            'lop'=>'required',
        ],[
            'hoten.required'=>"Bạn chưa nhập Họ Tên",
            'ngaysinh.required'=>"Bạn chưa nhập Ngày sinh",
            'diachi.required'=>"Bạn chưa nhập Địa chỉ",
            'lop.required'=>"Bạn chưa nhập Lớp",
        ]);
    if($lop==0){
        return redirect("vanthu/hocsinh/dshocsinh/sua/$id_hs")->with('thongbao',"Lớp không tồn tại");
    }else{
        $lop=LopHoc::where('id_truong',$vanthu['id_truong'])->where('ten_lop',$request['lop'])->first();
        $dshs=DanhSachHS::where('id_lop',$lop['id'])->where('id_hocki',$hk)->count();
        if($dshs==0){
            $ds=new DanhSachHS();
            $ds->id_lop=$lop['id'];
            $ds->id_hocki=$hk;
            $ds->save();        }
    }
        $dshs=DanhSachHS::where('id_lop',$lop['id'])->where('id_hocki',$hk)->first();
        $hocsinh=HocSinh::find($id_hs);
    $hocsinh->id_danh_sach_hs=$dshs['id'];
    $hocsinh->ho_ten=$request['hoten'];
    if($request['nam']){
        $hocsinh->gioi_tinh="Nam";
    }else{
        $hocsinh->gioi_tinh="Nữ";
    }
    $hocsinh->ngay_sinh=$request['ngaysinh'];
    $hocsinh->dia_chi=$request['diachi'];
    if($request['mshs']){
        $hocsinh->id_taikhoan=$request['mshs'];
    }else{
        $user=new User();
        $id=User::count()+1;
        $name="HS".$id;
        $user->name=$name;
        $user->email="0";
        $user->level=4;
        $user->password=bcrypt($name);
        $user->save();
        $hocsinh->id_taikhoan=$user['id'];
    }
    $hocsinh->save();
    return redirect("vanthu/hocsinh/dshocsinh/sua/$id_hs")->with('thanhcong',"Đã thêm thành công");
    }
    public function themhocsinh(){
        return view('vanthu.hocsinh.themhocsinh');
    }
    public function getdsgiangday(){
        return view('vanthu.giangday.dsgiangday');
    }
    public function getdetalgiangday($id_lop){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->first();
        $lopday=LopDay::where('id_lop',$id_lop)->where('id_hocki',$hk)->get();
        return view('vanthu.giangday.detaldsgiangday',['lopday'=>$lopday,'id_lop'=>$id_lop]);
    }
    public function themgiangday(){
        return view('vanthu.giangday.themgiangday');
    }
    public function postthemgiangday(Request $request){
        $this->validate($request,[
            'lop'=>'required',
            'mon'=>'required',
            'msgv'=>'required',
        ],[
            'lop.required'=>"Bạn chưa nhập Lớp học",
            'mon.required'=>"Bạn chưa nhập Môn học",
            'msgv.required'=>"Bạn chưa nhập Mã số giáo viên",
        ]);
        $mon=$request['mon'];
        $lop=$request['lop'];
        $msgv=$request['msgv'];
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        $dsgv=DanhSachGV::where('id_truong',$vanthu['id_truong'])->where('id_hocki',$hk)->first();
        $m=MonHoc::where('ten_mon',$mon)->count();
        if($m==0){
            return redirect('vanthu/giangday/themgiangday')->with('thongbao',"Môn học không chính xác");
        }
        $monhoc=MonHoc::where('ten_mon',$mon)->first();
        $l=LopHoc::where('ten_lop',$lop)->where('id_truong',$vanthu['id_truong'])->count();
        if($l==0){
            return redirect('vanthu/giangday/themgiangday')->with('thongbao',"Lớp học không tồn tại trong trường");

        }
        $lophoc=LopHoc::where('ten_lop',$lop)->where('id_truong',$vanthu['id_truong'])->first();
        $gv=GiaoVien::where('id_danh_sach_gv',$dsgv['id'])->where('id_mon',$monhoc['id'])->where('id_taikhoan',$msgv)->count();
        if($gv==0){
            return redirect('vanthu/giangday/themgiangday')->with('thongbao',"Mã số giáo viên lỗi");

        }
        $giaovien=GiaoVien::where('id_danh_sach_gv',$dsgv['id'])->where('id_mon',$monhoc['id'])->where('id_taikhoan',$msgv)->first();
        $ld=LopDay::where('id_lop',$lophoc['id'])->where('id_hocki',$hk)->count();
        if($ld!=0){
            $ld=LopDay::where('id_lop',$lophoc['id'])->where('id_hocki',$hk)->get();
            foreach ($ld as $l){
                $gv=GiaoVien::find($l['id_giaovien']);
                if($gv['id_mon']==$monhoc['id']){
                    return redirect('vanthu/giangday/themgiangday')->with('thongbao',"Lớp học đã toàn tại giáo viên dạy môn học");
                }
            }
        }
        $lopday=new LopDay();
        $lopday->id_giaovien=$giaovien['id'];
        $lopday->id_lop=$lophoc['id'];
        $lopday->id_hocki=$hk;
        $lopday->save();
        if($request['chunhiem']){
            $dshs1=DanhSachHS::where('id_lop',$lophoc['id'])->where('id_hocki',$hk)->count();
            if($dshs1==0){
                $dshs=new DanhSachHS();
                $dshs->id_giaovien=$giaovien['id'];
                $dshs->id_lop=$lophoc['id'];
                $dshs->id_hocki=$hk;
                $dshs->save();
            }else{
                $dshs=DanhSachHS::where('id_lop',$lophoc['id'])->where('id_hocki',$hk)->first();
                if($dshs['id_giaovien']==null){
                    $dshs->id_giaovien=$giaovien['id'];
                    $dshs->save();
                }else{
                    return redirect('vanthu/giangday/themgiangday')->with('thongbao',"Lớp học đã có giáo viên chủ nhiệm");
                }
            }
        }
        return redirect('vanthu/giangday/themgiangday')->with('thanhcong',"Thêm thành công");

    }
    public function xoagiangday($id_giaovien,$id_lop){
        $user=Auth::user();
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->first();
        $hk=HocKi::max('id');
        LopDay::where('id_giaovien',$id_giaovien)->where('id_lop',$id_lop)->where('id_hocki',$hk)->delete();
        $dshs1=DanhSachHS::where('id_giaovien',$id_giaovien)->where('id_lop',$id_lop)->where('id_hocki',$hk)->count();
        if($dshs1!=0){
            $dshs=DanhSachHS::where('id_giaovien',$id_giaovien)->where('id_lop',$id_lop)->where('id_hocki',$hk)->first();
            $dshs->id_giaovien=null;
            $dshs->save();
        }
        return redirect("vanthu/giangday/dsgiangday/$id_lop")->with('thanhcong',"Đã xóa thành công");

    }
    public function getTTTaiKhoan(){
        $user=Auth::user();
        //print_r($quantri);
        $vanthu=VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
        return view('vanthu.page.tttaikhoan',['vanthu'=>$vanthu]);
    }
    public function doiMatKhau(){
        return view('vanthu.page.doimatkhau');
    }
}
