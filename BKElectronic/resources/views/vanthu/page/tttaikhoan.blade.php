@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Thông tin cơ bản</h3>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Họ tên</th>
                <td>{{$vanthu['ho_ten']}}</td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>{{$vanthu['gioi_tinh']}}</td>
            </tr>
            <tr>
                <th>SĐT</th>
                <td>{{$vanthu['so_dien_thoai']}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$vanthu['email']}}</td>
            </tr>
            <tr>
                <th>Trường học</th>
                <td>{{\App\Truong::find($vanthu['id_truong'])['ten_truong']}}</td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>{{$vanthu['dia_chi']}}</td>
            </tr>
        </table>
    </div>
@endsection