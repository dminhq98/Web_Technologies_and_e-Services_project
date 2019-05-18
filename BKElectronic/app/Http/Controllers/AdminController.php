<?php

namespace App\Http\Controllers;

use App\Admin;
use App\HocKi;
use App\LopHoc;
use App\MonHoc;
use App\NamHoc;
use App\Truong;
use App\User;
use App\VanThu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }

    public function getIndex(){
        return view('admin.index');
    }

    public function getThemTruong(){
        return view('admin.truong.themtruong');

    }
    public function postThemTruong(Request $request){
        $this->validate($request,[
            'tentruong'=>'required',
            'diachi'=>'required',
        ],[
            'tentruong.required'=>"Bạn chưa nhập tên trường",
            'diachi.required'=>"Bạn chưa nhập địa chỉ",
        ]);
        $ten=$request['tentruong'];
        $diachi=$request['diachi'];
        $level=$request['level'];
        $truong=new Truong();
        $truong->ten_truong=$ten;
        $truong->dia_chi=$diachi;
        $truong->level=$level;
        $truong->save();
        return redirect('admin/truong/themtruong')->with('thanhcong',"Đã thêm thành công");
    }
    public function getSuaTruong($id_truong){
        $truong=Truong::find($id_truong);
        return view('admin.truong.suatruong',['truong'=>$truong]);

    }
    public function postSuaTruong(Request $request,$id_truong){

        $ten=$request['tentruong'];
        $diachi=$request['diachi'];
        $level=$request['level'];
        $truong=Truong::find($id_truong);
        $truong->ten_truong=$ten;
        $truong->dia_chi=$diachi;
        $truong->level=$level;
        $truong->save();
        return redirect("admin/truong/suatruong/$id_truong")->with('thanhcong',"Đã sửa thành công");
    }
    public function xoaTruong($id_truong){
        $truong=Truong::find($id_truong);
        $truong->trang_thai=0;
        $truong->save();
        return redirect('admin/truong/danhsachtruong')->with('thanhcong',"Đã xóa thành công");

    }
    public function getDanhSachXoaTruong(){
        $truong=Truong::where('trang_thai',0)->get();
        return view('admin.truong.dsxoatruong',['truong'=>$truong]);
    }
    public function getDanhSachTruong(){
        $truong=Truong::where('trang_thai',1)->get();
        return view('admin.truong.dstruong',['truong'=>$truong]);
    }
    public function getThemLop(){
        return view('admin.truong.themlop');

    }
    public function getDanhSachLop($id_truong){
        $truong=Truong::find($id_truong);
        $lophoc=LopHoc::where('id_truong',$id_truong)->get();
        return view('admin.truong.danhsachlop',['lophoc'=>$lophoc,'truong'=>$truong]);
    }
    public function postThemLop(Request $request){
        $id_truong=$request['truong'];
        $ten_lop=$request['lop'];
        $lophoc=LopHoc::where('ten_lop',$ten_lop)->where('id_truong',$id_truong)->count();
        if($lophoc!=0){
            return redirect('admin/truong/themlop')->with('thongbao',"Lớp đã tồn tại");

        }
        $lop=new LopHoc();
        $lop->ten_lop=$ten_lop;
        $lop->id_truong=$id_truong;
        $lop->save();
        return redirect('admin/truong/themlop')->with('thanhcong',"Thêm lớp thành công");

    }
    public function xoaLop($id_truong,$id_lop){
        LopHoc::find($id_lop)->delete();
        return redirect("admin/truong/danhsachlop/$id_truong")->with('thanhcong',"Đã xóa thành công");
    }
    public function getThemVanThu(){
        return view('admin.vanthu.themvanthu');

    }
    public function postThemVanThu(Request $request){
        $vanthu=new VanThu();
        $vanthu->id_truong=$request['truong'];
        $vanthu->ho_ten=$request['hoten'];
        $vanthu->gioi_tinh=$request['gioitinh'];
        $vanthu->so_dien_thoai=$request['sdt'];
        $vanthu->email=$request['email'];
        $vanthu->dia_chi=$request['diachi'];

        $user=new User();
        $id=User::count()+1;
        $name="VT".$id;
        $user->name=$name;
        $user->email=$request['email'];
        $user->level=2;
        $user->password=bcrypt($name);
        $user->save();
        $name="VT".$user['id'];
        $user->password=bcrypt($name);
        $user->save();
        $vanthu->id_taikhoan=$user['id'];
        $vanthu->save();
        return redirect('admin/vanthu/themvanthu')->with('thanhcong',"Đã thêm thành công");
    }
    public function getSuaVanThu($id_vanthu){
        $vanthu=VanThu::find($id_vanthu);
        return view('admin.vanthu.suavanthu',['vanthu'=>$vanthu]);

    }
    public function postSuaVanThu(Request $request,$id_vanthu){
        $vanthu=VanThu::find($id_vanthu);
        $vanthu->id_truong=$request['truong'];
        $vanthu->ho_ten=$request['hoten'];
        $vanthu->gioi_tinh=$request['gioitinh'];
        $vanthu->so_dien_thoai=$request['sdt'];
        $vanthu->email=$request['email'];
        $vanthu->dia_chi=$request['diachi'];

        $vanthu->save();
        return redirect("admin/vanthu/suavanthu/$id_vanthu")->with('thanhcong',"Đã sửa thành công");
    }
    public function getDanhSachVanThu(){
        return view('admin.vanthu.dsvanthu');
    }
    public function getDanhSachXoaVanThu(){
        return view('admin.vanthu.dsxoavanthu');
    }
    public function getThemMon(){
        return view('admin.page.themmon');
    }
    public function xoavanthu($id_vanthu){
        $vanthu=VanThu::find($id_vanthu);
        $vanthu->trang_thai=0;
        $user=User::find($vanthu['id_taikhoan']);
        $user->level=11;
        $user->save();
        $vanthu->save();
        return redirect("admin/vanthu/danhsachvanthu")->with('thanhcong','Đã xóa thành công');
    }
    public function postThemMon(Request $request){
        $monhoc=new MonHoc();
        $monhoc->ten_mon=$request['tenmon'];
        $monhoc->save();
        return redirect("admin/monhoc/themmon")->with('thanhcong',"Đã thêm thành công");

    }
    public function getSuaMon($id_mon){
        $mon=MonHoc::find($id_mon);
        return view('admin.page.suamon',['mon'=>$mon]);
    }
    public function postSuaMon(Request $request,$id_mon){
        $monhoc=MonHoc::find($id_mon);
        $monhoc->ten_mon=$request['tenmon'];
        $monhoc->save();
        return redirect("admin/monhoc/suamon/$id_mon")->with('thanhcong',"Đã sửa thành công");
    }
    public function getDanhSachMon(){
        $monhoc=MonHoc::orderBy('ten_mon', 'asc')->paginate(10);
        return view('admin.page.dsmon',['monhoc'=>$monhoc]);
    }

    public function getThemQuanTri(){
        return view('admin.quantri.themquantri');
    }
    public function postThemQuanTri(Request $request){
        $this->validate($request,[
            'password'=>'min:6',
        ],[
            'password.min'=>"Password phải có tối thiểu 6 kí tự",
        ]);

        $password=$request['password'];
        $password1=$request['password1'];
        if($password!=$password1){
            return redirect('admin/quantri/themquantri')->with('thongbao','Password không trùng khớp.');
        }
        $admin=new Admin();
        $admin->ho_ten=$request['hoten'];
        $admin->gioi_tinh=$request['gioitinh'];
        $admin->so_dien_thoai=$request['sdt'];
        $admin->email=$request['email'];
        $admin->dia_chi=$request['diachi'];
        $user=new User();
        $user->name=$request['email'];
        $user->password=bcrypt($password);
        $user->email=$request['email'];
        $user->level=1;
        $user->save();
        $admin->id_taikhoan=$user['id'];
        $admin->save();
        return redirect('admin/quantri/themquantri')->with('thanhcong','Thêm thành công');

    }

    public function getSuaQuanTri($id_admin){
        $admin=Admin::find($id_admin);
        return view('admin.quantri.suaquantri',['admin'=>$admin]);
    }
    public function xoaQuanTri($id_admin){
        $admin=Admin::find($id_admin);
        $admin->trang_thai=0;
        $user=User::find($admin['id_taikhoan']);
        $user->level=10;
        $user->save();
        $admin->save();
        return redirect("admin/quantri/dsquantri")->with('thanhcong','Đã xóa thành công');
    }
    public function khoiPhucQuanTri($id_admin){
        $admin=Admin::find($id_admin);
        $admin->trang_thai=1;
        $user=User::find($admin['id_taikhoan']);
        $user->level=1;
        $user->save();
        $admin->save();
        return redirect("admin/quantri/dsxoaquantri")->with('thanhcong','Đã khôi phục thành công');
    }
    public function getDSXoaQuantri(){
        return view('admin.quantri.dsxoaquantri');
    }
    public function postSuaQuanTri(Request $request,$id_admin){
        $this->validate($request,[
            'password'=>'min:6',
        ],[
            'password.min'=>"Password phải có tối thiểu 6 kí tự",
        ]);

        $password=$request['password'];
        $password1=$request['password1'];
        if($password!=$password1){
            return redirect("admin/quantri/suaquantri/$id_admin")->with('thongbao','Password không trùng khớp.');
        }
        $admin=Admin::find($id_admin);
        $admin->ho_ten=$request['hoten'];
        $admin->gioi_tinh=$request['gioitinh'];
        $admin->so_dien_thoai=$request['sdt'];
        $admin->email=$request['email'];
        $admin->dia_chi=$request['diachi'];
        $user=User::find($admin['id_taikhoan']);
        if($admin['id_taikhoan']!=1){
            $user->name=$request['email'];
        }
        $user->password=bcrypt($password);
        $user->email=$request['email'];
        $user->level=$request['level'];
        $user->save();
        $admin->id_taikhoan=$user['id'];
        $admin->save();
        return redirect("admin/quantri/suaquantri/$id_admin")->with('thanhcong','Lưu thành công');
    }
    public function getDSQuantri(){
        return view('admin.quantri.dsquantri');
    }
//    public function getThemHocKi(){
//        return view('admin.page.themhocki');
//
//    }
    public function getThemHocKi(){
        $hk=HocKi::max('id');
        $hocki=HocKi::find($hk);
        if($hocki['hoc_ki']==1){
            $hoc=new HocKi();
            $hoc->hoc_ki=2;
            $hoc->id_namhoc=$hocki['id_namhoc'];
            $hoc->save();
        }else{
            $nam=NamHoc::find($hocki['id_namhoc'])['nam_hoc'];
            $namcuoi=substr($nam,5,4);
            $namhoc=new NamHoc();
            $namhoc->nam_hoc=$namcuoi."-".($namcuoi+1);
            $namhoc->save();
            $hoc=new HocKi();
            $hoc->hoc_ki=1;
            $hoc->id_namhoc=$namhoc['id'];
            $hoc->save();
        }
        return redirect("admin/hocki/danhsachhocki")->with('thanhcong','Thêm thành công');

    }

    public function getDSHocKi(){
        $hocki=HocKi::orderBy('id', 'desc')->paginate(10);
        return view('admin.page.dshocki',['hocki'=>$hocki]);

    }
//    public function postThemHocKi(Request $request){
//
//    }
    public function getLayMK(){
        return view('admin.page.laymoimk');
    }

    public function postLayMK(Request $request){
        $this->validate($request,[
            'password'=>'min:6',
        ],[
            'password.min'=>"Password phải có tối thiểu 6 kí tự",
        ]);
        $id=$request['id'];
        $password=$request['password'];
        $password1=$request['password1'];
        if($password!=$password1){
            return redirect("admin/lammoimatkhau")->with('thongbao','Password không trùng khớp.');
        }
        $user=User::find($id);
        if($user['level']!=2 and $user['level']!=3 and $user['level']!=4){
            return redirect("admin/lammoimatkhau")->with('thongbao','ID không đúng của Giáo viên,Văn thư,Học Sinh');
        }
        $user->password=bcrypt($password);
        $user->save();
        return redirect("admin/lammoimatkhau")->with('thanhcong','Đã đổi lại mật khẩu thành công');


    }

    public function getttTaiKhoan(){
        //$quantri=Auth::quantri();
        $admin=Admin::where('id_taikhoan',Auth::id())->first();
        return view('admin.page.tttaikhoan',['admin'=>$admin]);
    }

}
