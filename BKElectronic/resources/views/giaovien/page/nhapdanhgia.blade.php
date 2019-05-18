@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp giảng dạy</h3>
    </div>

    <div class="panel-body">
        <?php
        $i=1;
        $u="giaovien/danhgia/$id_lop/$id_giaovien";
        ?>
        <form role="form" action="{{ url($u) }}" method="PUT" class="panel-body">
            {!! csrf_field() !!}
        <table class="table table-bordered table-striped">

            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Điểm TB</th>
                <th>Học lực</th>
                <th>Hạnh kiểm</th>
                <th>Nhận xét</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hocsinh as $hs)
                <?php
                $tongket = \App\BangTongKet::Where('id_hocsinh', $hs['id'])->first();
                ?>
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$hs['ho_ten']}}</td>
                    <td>{{$tongket['diem_phay_cuoi']}}</td>
                    <td>{{$tongket['hoc_luc']}}</td>
                    <td style="position: relative;"><input type="text" value="{{$tongket['hanh_kiem']}}"  name="hanhkiem{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                    <td style="position: relative;"><input type="text" value="{{$tongket['nhan_xet']}}" name="nhanxet{{$hs['id']}}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;width: 100%; border: none;" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="giaovien/danhgia/{{$id_lop}}/{{$id_giaovien}}" class="btn btn-basic" style="float: right; margin-left: 5px;">Hủy bỏ</a>
        <button type="submit" class="btn btn-primary" style="float: right; ">Lưu</button>
        </form>
    </div>
@endsection