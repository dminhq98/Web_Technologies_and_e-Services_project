@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Giáo viên giảng dạy</h3>
        <div class="semyear-choice">
            <ul>
                <?php
                //$hk=\Illuminate\Support\Facades\DB::table('hoc_ki')->max('id');
                $user=\Illuminate\Support\Facades\Auth::user();
                $hocsinh=App\HocSinh::where('id_taikhoan',$user['id'])->get();
                $dshocsinh=App\DanhSachHS::where('id',$hocsinh[$hocsinh->count()-1]['id_danh_sach_hs'])->get();
                $hk=App\HocKi::find($dshocsinh[0]['id_hocki']);
                $namhoc=\App\NamHoc::find($hk['id_namhoc']);
                ?>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            Năm học: {{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            @foreach($hocsinh as $ds)
                                <?php
                                $dshocsinh=App\DanhSachHS::where('id',$ds['id_danh_sach_hs'])->get();
                                $hk=App\HocKi::find($dshocsinh[0]['id_hocki']);
                                $namhoc=\App\NamHoc::find($hk['id_namhoc']);
                                ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="hocsinh/dsgiaovien/{{$hk['id']}}">Năm học:{{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Môn học</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Điện thoại</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lopday as $lop)
                <?php
                $gv=\App\GiaoVien::find($lop['id_giaovien']);
                $monhoc=\App\MonHoc::find($gv['id_mon']);
                $i=1;
                ?>
                @if($gv['id']==$gvcn['id'])
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$monhoc['ten_mon']}}</td>
                        <td>{{$gv['ho_ten']}}<span class="label label-success" style="float: right; height: 22px; line-height: 19px;">Chủ nhiệm</span></td>
                        <td>{{$gv['gioi_tinh']}}</td>
                        <td>{{$gv['so_dien_thoai']}}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$monhoc['ten_mon']}}</td>
                        <td>{{$gv['ho_ten']}}</td>
                        <td>{{$gv['gioi_tinh']}}</td>
                        <td>{{$gv['so_dien_thoai']}}</td>
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>
    </div>
@endsection