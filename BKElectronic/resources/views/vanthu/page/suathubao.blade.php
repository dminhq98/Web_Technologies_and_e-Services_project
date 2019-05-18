@extends('vanthu.layout.index')
@section('content')
    <div id="page-wrapper" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thư báo
                        <small>Sửa</small>
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
                    <?php
                    $u="vanthu/thubao/suathubao/".$thubao['id'];
                    ?>
                    <form role="form" action="{{ url($u) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="tieude" value="{{$thubao['tieu_de']}}" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" name="tomtat">{{$thubao['tom_tat']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="ckeditor form-control" rows="3" name="noidung">{{$thubao['noi_dung']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Chọn ảnh</label>
                            <input type="file" name="Hinh">
                        </div>
                        <button type="submit"  class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection