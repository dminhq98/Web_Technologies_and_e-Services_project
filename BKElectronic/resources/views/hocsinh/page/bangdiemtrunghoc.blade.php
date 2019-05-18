@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
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
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="hocsinh/kqhoctap/diem/{{$hk['id']}}">Năm học:{{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <?php
            if($tongket['hoc_luc']=="Giỏi"){
                if($tongket['hanh_kiem']=='Tốt'){
                    $danhhieu="Học Sinh Giỏi";
                }elseif($tongket['hanh_kiem']=='Khá'){
                    $danhhieu="Học Sinh Tiên Tiến";
                }
            }elseif($tongket['hoc_luc']=="Khá"){
                if($tongket['hanh_kiem']=='Tốt' or $tongket['hanh_kiem']=='Khá'){
                    $danhhieu="Học Sinh Tiên Tiến";
                }else{
                    $danhhieu="Không";
                }
            }else{
                $danhhieu="Không";
            }
    ?>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="kqht">
            <caption>Kết quả học tập :Lớp {{$lop['ten_lop']}}</caption>
            <tr>
                <td>Danh hiệu</td>
                <td>{{$danhhieu}}</td>
            </tr>
            <tr>
                <td>Điểm TB</td>
                <td>{{$tongket['diem_phay_cuoi']}}</td>
            </tr>
            <tr>
                <td>Hạnh kiểm</td>
                <td>{{$tongket['hanh_kiem']}}</td>
            </tr>
            <tr>
                <td>Học lực</td>
                <td>{{$tongket['hoc_luc']}}</td>
            </tr>
        </table>
        <br>
            @if ($tongket['hanh_kiem']=='0')
            <h4>Bảng điểm môn học</h4>
                <p>Chưa có dữ liệu</p>
            @else
            <table class="table table-bordered table-striped">
                <caption><h4>Bảng điểm môn học</h4></caption>
                <?php
                $dsbd=\App\DanhSachBD::Where('id_tongket',$tongket['id'])->get();
                $bangdiem=\App\BangDiem::Where('id_danh_sach_bd',$dsbd[0]['id'])->get();
                $i=1;
                ?>
                @foreach($bangdiem as $bd)
                    <?php
                    $diemphay=\App\DiemPhay::Where('id_bangdiem',$bd['id'])->get();
                    $diemphay=$diemphay[0]['diem'];
                    $heso1=\App\HeSo1::Where('id_bangdiem',$bd['id'])->get();
                    $heso2=\App\HeSo2::Where('id_bangdiem',$bd['id'])->get();
                    $heso3=\App\HeSo3::Where('id_bangdiem',$bd['id'])->get();
                    ?>
                    @if($i)
                        <thead>
                        <tr class="info">
                            <th>Môn học</th>
                            <th colspan="{{count($heso1)}}">Hệ số 1</th>
                            <th colspan="{{count($heso2)}}">Hệ số 2</th>
                            <th>Hệ số 3</th>
                            <th>TBM</th>
                        </tr>
                        </thead>
                        <?php
                        $i=0;
                        ?>
                    @endif
                    <tbody>
                    <tr>
                        <td>{{\App\MonHoc::find($bd['id_mon'])['ten_mon']}}</td>
                        @foreach($heso1 as $hs1)
                            <td>{{$hs1['diem']}}</td>
                        @endforeach
                        @foreach($heso2 as $hs2)
                            <td>{{$hs2['diem']}}</td>
                        @endforeach
                        <td>{{$heso3[0]['diem']}}</td>
                        <td>{{$diemphay}}</td>
                    </tr>
                    <tbody>
                @endforeach
                </table>
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h3>Nhận xét</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        {{$tongket['nhan_xet']}}
                    </ul>
                </div>
                 </div>
            @endif


@endsection