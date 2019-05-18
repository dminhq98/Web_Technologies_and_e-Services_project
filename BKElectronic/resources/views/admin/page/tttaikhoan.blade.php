@extends('admin.layout.index')
@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-heading" style="background-color:#f3e97a; color:white;" >
                <h3>Thông tin cơ bản</h3>
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Họ tên</th>
                        <td>{{$admin['ho_ten']}}</td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td>{{$admin['gioi_tinh']}}</td>
                    </tr>
                    <tr>
                        <th>SĐT</th>
                        <td>{{$admin['so_dien_thoai']}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$admin['email']}}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{$admin['dia_chi']}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection