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
            <div class="panel panel-default">
                <div class="panel-heading">Thêm trường</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="{{ url('admin/truong/themtruong')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Tên trường</label>
                                <input class="form-control" type="text" name="tentruong"required="">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="diachi" required="">
                            </div>
                            <div class="form-group">
                                <label for="sel2">Loại trường</label>
                                <select class="form-control" name="level" id="sel2">
                                    <option value="1">Tiểu học</option>
                                    <option value="2">Trung học</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection