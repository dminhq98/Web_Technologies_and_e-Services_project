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
            <h1 class="page-header">Quản lý môn học</h1>
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
                    <a href="admin/monhoc/themmon" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm môn học mới</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Môn</th>
                            <th data-sortable="true">Sửa</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($monhoc as $mon)
                            <tr style="height: 300px;">
                                <td data-checkbox="true">{{$mon['id']}}</td>
                                <td data-checkbox="true">{{$mon['ten_mon']}}</td>
                            <!-- <td data-sortable="true"></td>
                                        <td data-sortable="true"></td> -->
                                <td>
                                    <a href="admin/monhoc/suamon/{{$mon['id']}}"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right;">
                        {!! $monhoc->links() !!}
                    </ul>
                </div>
            </div>
        </div><!--/.row-->

    </div>  <!--/.main-->
@endsection