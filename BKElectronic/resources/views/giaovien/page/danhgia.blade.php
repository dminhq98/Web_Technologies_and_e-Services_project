@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp chủ nhiệm</h3>
    </div>
    <?php
        $i=1;
    ?>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Tên lớp</th>
                <th>Môn</th>
                <th>Đánh giá</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gvds as $gv)
                <?php
                $mon=\App\MonHoc::find($gv['id_mon']);
                $sldshs=\App\DanhSachHS::Where('id_giaovien',$gv['id'])->count();
                $dshs=\App\DanhSachHS::Where('id_giaovien',$gv['id'])->first();
                ?>
                @if($sldshs!=0)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{\App\LopHoc::find($dshs['id_lop'])['ten_lop']}}<span class="label label-success" style="float: right; height: 22px; line-height: 19px;">Chủ nhiệm</span></td>
                    <td>{{$mon['ten_mon']}}</td>
                    <td><a href="giaovien/danhgia/{{$dshs['id_lop']}}/{{$gv['id']}}" style="color:#337AB7;">Thêm</a> </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection