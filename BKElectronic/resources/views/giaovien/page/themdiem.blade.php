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
        <form role="form" action="{{ url($u) }}" method="PUT">
            {!! csrf_field() !!}
            <table class="table table-bordered">
                <caption style="text-align: center; font-size: 15px; font-weight: bold;">Môn Toán</caption>
                <thead>
                <tr class="info">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th colspan="3">Hệ số 1</th>
                    <th colspan="2">Hệ số 2</th>
                    <th>Hệ số 3</th>
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
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="" name="diem1{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="" name="diem2{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value=""  name="diem3{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value=""  name="diem4{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value=""  name="diem5{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="" name="diem6{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                        </tr>
                    @else
                        <?php
                        $bangdiem=\App\BangDiem::Where('id_danh_sach_bd',$dsbd['id'])->where('id_giaovien', $giaovien['id'])->where('id_mon', $giaovien['id_mon'])->first();
                        $heso1=\App\HeSo1::Where('id_bangdiem',$bangdiem['id'])->get();
                        $heso2=\App\HeSo2::Where('id_bangdiem',$bangdiem['id'])->get();
                        $heso3=\App\HeSo3::Where('id_bangdiem',$bangdiem['id'])->first();
                       // $diemphay=\App\DiemPhay::Where('id_bangdiem',$bangdiem['id'])->first();
                        ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$hs['ho_ten']}}</td>
                            <?php
                                $j=1;
                            ?>
                            @foreach($heso1 as $hs1)
                                <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="{{$hs1['diem']}}" name="diem{{$j++}}{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            @endforeach
                            @foreach($heso2 as $hs2)
                                <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="{{$hs2['diem']}}"  name="diem{{$j++}}{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                            @endforeach
                            <td style="position: relative;"><input type=number step=0.1 min="0" max="10" value="{{$heso3['diem']}}" name="diem6{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <a href="giaovien/nhapdiem" class="btn btn-basic" style="float: right; margin-left: 5px;">Hủy bỏ</a>
            <button type="submit" class="btn btn-primary" style="float: right; ">Lưu</button>
        </form>
    </div>
@endsection