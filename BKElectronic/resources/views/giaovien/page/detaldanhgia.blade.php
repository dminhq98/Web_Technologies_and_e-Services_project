@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp giảng dạy</h3>
    </div>

        <table class="table table-bordered table-striped">
       <?php
        $i=1;

        ?>

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
                    <td style="position: relative;">{{$tongket['hanh_kiem']}}</td>
                    <td style="position: relative;">{{$tongket['nhan_xet']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="giaovien/danhgia" class="btn btn-basic" style="float: right; margin-left: 5px;">Hủy bỏ</a>
        <a href="giaovien/danhgia/nhap/{{$id_lop}}/{{$id_giaovien}}" class="btn btn-primary" style="float: right; ">Cập nhật</a>
    </form>
    </div>
@endsection