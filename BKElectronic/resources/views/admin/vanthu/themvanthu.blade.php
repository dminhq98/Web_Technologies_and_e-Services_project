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
            @if(session('thanhcong'))
                <div class="alert alert-success">
                    {{session('thanhcong')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Thêm văn thư</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="{{ url('admin/vanthu/themvanthu') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="hoten">
                            </div>
                            <?php
                            $truong=\App\Truong::all();
                            ?>
                            <div class="form-group">
                                <label for="sel2">Chọn trường</label>
                                <select class="form-control" name="truong" id="sel2">
                                    @foreach($truong as $tr)
                                        <option value="{{$tr['id']}}">{{$tr['ten_truong']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel2">Giới tính</label>
                                <select class="form-control" name="gioitinh" id="sel2">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" type="text" name="sdt">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" v>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="diachi" >
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