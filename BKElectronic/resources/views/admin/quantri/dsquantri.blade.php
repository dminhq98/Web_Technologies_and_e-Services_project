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
            <h1 class="page-header">Quản lý quản trị</h1>
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
                    <a href="admin/quantri/dsxoaquantri" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Danh sách quản trị đã xóa</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">STT</th>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên</th>
                            <th data-sortable="true">Level</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                        </thead>
                        <?php
                         $admin=\App\Admin::where('trang_thai',1)->get();
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
                            @if($ad['id_taikhoan']==1)
                                <td>
                                @if(\Illuminate\Support\Facades\Auth::id()==1)
                                    <a href="admin/quantri/suaquantri/{{$ad['id']}}"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                @else
                                    <span><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></span>
                                @endif

                                </td>
                                <td>
                                    <span ><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></span>
                                </td>
                            @else
                                <td>
                                    <a href="admin/quantri/suaquantri/{{$ad['id']}}"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                </td>
                                <td>
                                    <a onclick="return xoaSanPham();" href="admin/quantri/xoaquantri/{{$ad['id']}}"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                </td>
                            @endif

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