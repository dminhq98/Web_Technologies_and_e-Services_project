
@extends('admin.layout.index')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"></li>
        </ol>
    </div><!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin trường</h1>
        </div>
    </div> -->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sửa quản trị</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if(session('thanhcong'))
                            <div class="alert alert-success">
                                {{session('thanhcong')}}
                            </div>
                        @endif
                            <?php
                            $u="admin/quantri/suaquantri/".$admin['id'];
                            ?>
                        <form role="form" action="{{ url($u) }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="hoten" value="{{$admin['ho_ten']}}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Level</label>
                                <select class="form-control" name="level" id="sel1">
                                    @if($admin['id_taikhoan']==1)
                                     <option>0</option>
                                    @else
                                    <option>1</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Giới tính</label>
                                <select class="form-control" name="gioitinh" id="sel1">
                                    @if($admin['gioi_tinh']=="Nam")
                                        <option value="Nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    @else
                                        <option value="Nam" >Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" type="text" name="sdt" value="{{$admin['so_dien_thoai']}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{$admin['email']}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="diachi" value="{{$admin['dia_chi']}}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" >
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input class="form-control" type="password" name="password1" >
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Lưu</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection