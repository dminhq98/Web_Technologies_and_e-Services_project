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
            <h1 class="page-header">Danh sách học kì</h1>
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
                    <a href="admin/hocki/themhocki" onclick="return themSanPham();" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm học kì tiếp theo</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Năm học</th>
                            <th data-sortable="true">Học kì</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hocki as $hk)
                            <tr style="height: 300px;">
                                <td data-checkbox="true">{{$hk['id']}}</td>
                                <td data-checkbox="true">{{\App\NamHoc::find($hk['id_namhoc'])['nam_hoc']}}</td>
                                <td data-checkbox="true">{{$hk['hoc_ki']}}</td>

                            <!-- <td data-sortable="true"></td>
                                        <td data-sortable="true"></td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right;">
                        {!! $hocki->links() !!}

                    </ul>
                </div>
            </div>
        </div><!--/.row-->

    </div>  <!--/.main-->
@endsection
