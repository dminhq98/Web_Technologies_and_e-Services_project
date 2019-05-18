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
            <h1 class="page-header">Quản lý người dùng</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            @if(session('thanhcong'))
                <div class="alert alert-success">
                    {{session('thanhcong')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body" style="position: relative;">
                    <a href="admin/quantri/dsquantri" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Danh sách quản trị</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">STT</th>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên</th>
                            <th data-sortable="true">Level</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Khôi phục</th>
                        </tr>
                        </thead>
                        <?php
                        $admin=\App\Admin::where('trang_thai',0)->get();
                        $i=1;
                        ?>
                        <tbody>
                        @foreach($admin as $ad)
                            <tr style="height: 300px;">
                                <td data-checkbox="true">{{$i++}}</td>
                                <td data-checkbox="true">{{$ad['id_taikhoan']}}</td>
                                <td data-checkbox="true">{{$ad['ho_ten']}}</td>
                                @if($ad['id_taikhoan']==1)
                                    <td data-checkbox="true">0</td>
                                @else
                                    <td data-checkbox="true">1</td>
                                @endif
                                <td data-checkbox="true">{{$ad['email']}}</td>
                                <td data-checkbox="true">{{$ad['dia_chi']}}</td>
                                    <td>
                                        <a onclick="return khoiPhucSanPham();" href="admin/quantri/khoiphucquantri/{{$ad['id']}}"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-hourglass"/></svg></span></a>
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