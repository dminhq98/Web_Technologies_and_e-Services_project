<div class="row main-left">
    <div class="col-md-3 ">
        <ul class="list-group" id="menu">
            <?php
            //$hk=\Illuminate\Support\Facades\DB::table('hoc_ki')->max('id');
            $user=\Illuminate\Support\Facades\Auth::user();
            $hocsinh=App\HocSinh::where('id_taikhoan',$user['id'])->get();
            $dshocsinh=App\DanhSachHS::where('id',$hocsinh[$hocsinh->count()-1]['id_danh_sach_hs'])->get();
            $hk=App\HocKi::find($dshocsinh[0]['id_hocki']);
            $namhoc=\App\NamHoc::find($hk['id_namhoc']);
            ?>
            <li href="#" class="list-group-item menu1 active">Menu</li>
            <li href="" class="list-group-item menu1"><a href="hocsinh/thongbao">Thông báo</a></li>
            <li href="#" class="list-group-item menu1">
                <a href="hocsinh/kqhoctap/diem/{{$hk['id']}}">Kết quả học tập</a>
            </li>

            <li href="#" class="list-group-item menu1">
                <a href="hocsinh/dslop/{{$hk['id']}}">Danh sách lớp</a>
            </li>

            <li href="#" class="list-group-item menu1">
                <a href="hocsinh/dsgiaovien/{{$hk['id']}}">Giáo viên giảng dạy</a>
            </li>

            <li href="#" class="list-group-item menu1">
                Quản lý tài khoản
            </li>
            <ul>
                <li class="list-group-item">
                    <a href="hocsinh/taikhoan/tttaikhoan">Thông tin cá nhân</a>
                </li>
                <li class="list-group-item">
                    <a href="hocsinh/taikhoan/doimatkhau">Đổi mật khẩu</a>
                </li>

            </ul>

            <li href="#" class="list-group-item menu1">
                <a href="logout">Đăng xuất</a>
            </li>
        </ul>
    </div>