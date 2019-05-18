@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Thông tin cơ bản</h3>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Họ tên</th>
                <td>{{$giaovien['ho_ten']}}</td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>{{$giaovien['gioi_tinh']}}</td>
            </tr>
            <tr>
                <th>Mã Giáo Viên</th>
                <td>GV{{\Illuminate\Support\Facades\Auth::id()}}</td>
            </tr>
            <tr>
                <th>Trường học</th>
                <td>{{$truong['ten_truong']}}</td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>{{$giaovien['dia_chi']}}</td>
            </tr>
        </table>
    </div>

@endsection