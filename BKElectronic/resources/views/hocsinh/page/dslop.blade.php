@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp</h3>
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
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="hocsinh/dslop/{{$hk['id']}}">Năm học:{{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}</a></li>
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
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    $i=1;
            ?>
            @foreach($dslophs as $ds)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$ds['ho_ten']}}</td>
                <td>{{$ds['ngay_sinh']}}</td>
                <td>{{$ds['gioi_tinh']}}</td>
                <td>{{$ds['dia_chi']}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection