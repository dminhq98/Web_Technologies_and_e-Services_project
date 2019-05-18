<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthController extends Controller
{
    //
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){

        $this->validate($request,[
           // 'Ten'=>'required',
            'password'=>'required',
        ],[
          //  'Ten.required'=>"Bạn chưa nhập Tên tài khoản",
            'password.required'=>"Bạn chưa nhập Password",
        ]);
        $username=$request['username'];
        $password=$request['password'];
        if( Auth::attempt(['name' => $username, 'password' =>$password])) {


            $user_login = Auth::user();
            if($user_login->level==2){
                return redirect('vanthu');
            }
            if($user_login->level==3){
                return redirect('giaovien');
            }
            if($user_login->level==4){
                return redirect('hocsinh');
            }
            if($user_login->level==1||$user_login->level==0){
                return redirect('admin');
            }
            return redirect('login')->with('thongbao', 'Đăng nhập thất bại');

        }else{
            return redirect('login')->with('thongbao', 'Đăng nhập thất bại');
        }
    }
    public function getLogout() {
        Auth::logout();
        return redirect('login');
    }
    public function postdoiMatKhau(Request $request){
        $this->validate($request,[
            // 'Ten'=>'required',
            'password'=>'required',
            'passwordnew'=>'required',
            'passwordnew1'=>'required',
        ],[
            //  'Ten.required'=>"Bạn chưa nhập Tên tài khoản",
            'password.required'=>"Bạn chưa nhập Password hiện tại",
            'passwordnew.required'=>"Bạn chưa nhập Password mới",
            'passwordnew1.required'=>"Bạn chưa nhập lại Password mới",
        ]);
        $password=$request['password'];
        $passwordnew=$request['passwordnew'];
        $passwordnew1=$request['passwordnew1'];
        $user_login = Auth::user();
        $username=$user_login['name'];
//        echo $password;
//        echo $passwordnew;
//        echo $passwordnew1;
        if($passwordnew!=$passwordnew1){
            if($user_login['level']==4){
                return redirect('hocsinh/taikhoan/doimatkhau')->with('thongbao', 'Mật khẩu mới không trùng khớp');
            }elseif($user_login['level']==3){
                return redirect('giaovien/taikhoan/doimatkhau')->with('thongbao', 'Mật khẩu mới không trùng khớp');
            }
        }elseif(Auth::attempt(['name' => $username, 'password' =>$password])){
            $user=User::find($user_login['id']);
            $user['password']=bcrypt($passwordnew);
            $user->save();
            if($user_login['level']==4){
                return redirect('hocsinh/taikhoan/doimatkhau')->with('thanhcong', 'Đã đổi mật khẩu thành công');
            }elseif($user_login['level']==3){
                return redirect('giaovien/taikhoan/doimatkhau')->with('thanhcong', 'Đã đổi mật khẩu thành công');
            }elseif($user_login['level']==2){
                return redirect('vanthu/taikhoan/doimatkhau')->with('thanhcong', 'Đã đổi mật khẩu thành công');
            }
        }else{
            if($user_login['level']==4){
                return redirect('hocsinh/taikhoan/doimatkhau')->with('thongbao', 'Mật khẩu hiện tại không chính xác');
            }elseif($user_login['level']==3){
                return redirect('giaovien/taikhoan/doimatkhau')->with('thongbao', 'Mật khẩu hiện tại không chính xác');
            }elseif($user_login['level']==3){
                return redirect('vanthu/taikhoan/doimatkhau')->with('thongbao', 'Mật khẩu hiện tại không chính xác');
            }
        }

    }
}
