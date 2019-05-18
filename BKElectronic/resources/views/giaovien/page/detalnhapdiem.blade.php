@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <div class="semyear-choice">
            <ul>
                <li>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
    </div>
    @if(session('thanhcong'))
        <div class="alert alert-success">
            {{session('thanhcong')}}
        </div>
    @endif
    @if(session('thongbao'))
        <div class="alert alert-danger">
            {{session('thongbao')}}
        </div>
    @endif
    <?php
            $u="giaovien/nhapdiem/$id_lop/$id_giaovien";
    ?>

    <div class="panel-body">
            <table class="table table-bordered">
                <caption style="text-align: center; font-size: 15px; font-weight: bold;">Môn Toán</caption>
                <thead>
                <tr class="info">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th colspan="3">Hệ số 1</th>
                    <th colspan="2">Hệ số 2</th>
                    <th>Hệ số 3</th>
                    <th>Điểm phẩy</th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $i=1;
                $giaovien=\App\GiaoVien::find($id_giaovien);

                ?>
                @foreach($hocsinh as $hs)
                    <?php
                    $tongket = \App\BangTongKet::where('id_hocsinh',$hs['id'])->first();
                    $dsbd = \App\DanhSachBD::where('id_tongket', $tongket['id'])->first();
                    $bd=\App\BangDiem::Where('id_danh_sach_bd',$dsbd['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->count();
                    ?>
                    @if($bd==0)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$hs['ho_ten']}}</td>
                            <td style="position: relative;"></td>
                            <td style="position: relative;"></td>
                            <td style="position: relative;"></td>
                            <td style="position: relative;"></td>
                            <td style="position: relative;"></td>
                            <td style="position: relative;"></td>
                        </tr>
                    @else
                        <?php
                        $bangdiem=\App\BangDiem::Where('id_danh_sach_bd',$dsbd['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->first();
                        $heso1=\App\HeSo1::Where('id_bangdiem',$bangdiem['id'])->get();
                        $heso2=\App\HeSo2::Where('id_bangdiem',$bangdiem['id'])->get();
                        $heso3=\App\HeSo3::Where('id_bangdiem',$bangdiem['id'])->first();
                        $diemphay=\App\DiemPhay::Where('id_bangdiem',$bangdiem['id'])->first();
                        ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$hs['ho_ten']}}</td>
                            @foreach($heso1 as $hs1)
                                <td style="position: relative;">{{$hs1['diem']}}</td>
                            @endforeach
                            @foreach($heso2 as $hs2)
                                <td style="position: relative;">{{$hs2['diem']}}</td>
                            @endforeach
                            <td style="position: relative;">{{$heso3['diem']}}</td>
                            <td style="position: relative;">{{$diemphay['diem']}}</td>
                        </tr>
                    @endif
                 @endforeach
                </tbody>
            </table>
            <a href="giaovien/nhapdiem" class="btn btn-basic" style="float: right; margin-left: 5px;">Hủy bỏ</a>
            <a href="giaovien/nhapdiem/nhap/{{$id_lop}}/{{$id_giaovien}}" class="btn btn-primary" style="float: right; ">Cập nhật</a>
    </div>
@endsection