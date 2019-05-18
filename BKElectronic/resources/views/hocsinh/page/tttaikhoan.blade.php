@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Thông tin cơ bản</h3>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Họ tên</th>
                <td>{{$hs['ho_ten']}}</td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>{{$hs['gioi_tinh']}}</td>
            </tr>
            <tr>
                <th>Mã học sinh</th>
                <td>HS{{\Illuminate\Support\Facades\Auth::id()}}</td>
            </tr>
            <tr>
                <th>Lớp</th>
                <td>{{$lop['ten_lop']}}</td>
            </tr>
            <tr>
                <th>Trường học</th>
                <td>{{$truong['ten_truong']}}</td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>{{$hs['dia_chi']}}</td>
            </tr>
        </table>
    </div>

@endsection