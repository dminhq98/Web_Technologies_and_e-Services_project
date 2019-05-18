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
            <h1 class="page-header">Quản lý trường</h1>
        </div>
    </div><!--/.row-->

    <?php

    ?>
    <div class="row">
        <div class="col-lg-12">
            @if(session('thanhcong'))
                <div class="alert alert-success">
                    {{session('thanhcong')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body" style="position: relative;">
                    <a href="admin/truong/danhsachtruong" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Danh sách trường</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên trường</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Loại Trường</th>
                            <!--       <th data-sortable="true">Nhà cung cấp</th>
                              <th data-sortable="true">Ảnh mô tả</th> -->

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($truong as $tr)
                            <tr style="height: 300px;">
                                <td data-checkbox="true">{{$tr['id']}}</td>
                                <td data-checkbox="true">{{$tr['ten_truong']}}</td>
                                <td data-checkbox="true">{{$tr['dia_chi']}}</td>
                                @if($tr['level']==1)
                                    <td data-checkbox="true">Tiểu Học</td>
                                @else
                                    <td data-checkbox="true">Trung Học</td>
                            @endif
                            <!-- <td data-sortable="true"></td>
                                        <td data-sortable="true"></td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right;">
                    </ul>
                </div>
            </div>
        </div><!--/.row-->

    </div>  <!--/.main-->
@endsection