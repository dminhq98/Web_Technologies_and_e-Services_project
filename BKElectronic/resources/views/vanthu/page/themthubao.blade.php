@extends('vanthu.layout.index')
@section('content')
    <div id="page-wrapper" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thư báo
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form role="form" action="{{ url('vanthu/thubao/themthubao') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="tieude" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" name="tomtat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="ckeditor form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Chọn ảnh</label>
                            <input type="file" name="Hinh">
                        </div>
                        <button type="submit"  class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection