@extends('admin.layout.index')
@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý văn thư</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            @if(session('thanhcong'))
                <div class="alert alert-success">
                    {{session('thanhcong')}}
                </div>
            @endif
            <?php
                $vanthu=\App\VanThu::where('trang_thai',1)->get();
                $i=1;
            ?>
            <div class="panel panel-default">

                <div class="panel-body" style="position: relative;">
                    {{--<div class="dropdown">--}}
                        {{--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Trường Tiểu học Hoa Phượng--}}
                            {{--<span class="caret"></span></button>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">Trường THCS Vĩnh Hưng</a></li>--}}
                            {{--<li><a href="#">Trường THPT Phạm Ngọc Thạch</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <a href="admin/vanthu/danhsachxoavanthu" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Danh sách văn thư đã xóa</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">STT</th>
                            <th data-sortable="true">Trường</th>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Họ tên</th>
                            <th data-sortable="true">Giới tính</th>
                            <th data-sortable="true">SĐT</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vanthu as $vt)
                        <tr style="height: 300px;">
                            <td data-checkbox="true">{{$i++}}</td>
                            <td data-checkbox="true">{{\App\Truong::find($vt['id_truong'])['ten_truong']}}</td>
                            <td data-checkbox="true">{{$vt['id_taikhoan']}}</td>
                            <td data-checkbox="true">{{$vt['ho_ten']}}</td>
                            <td data-checkbox="true">{{$vt['gioi_tinh']}}</td>
                            <td data-checkbox="true">{{$vt['so_dien_thoai']}}</td>
                            <td data-checkbox="true">{{$vt['email']}}</td>
                            <td data-checkbox="true">{{$vt['dia_chi']}}</td>
                            <td>
                                <a href="admin/vanthu/suavanthu/{{$vt['id']}}"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoaSanPham();" href="admin/vanthu/xoavanthu/{{$vt['id']}}"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right;">
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/.row-->
@endsection