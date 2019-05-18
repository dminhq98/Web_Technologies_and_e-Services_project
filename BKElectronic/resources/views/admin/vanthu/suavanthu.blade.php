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
                <div class="panel-heading">Sửa văn thư</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <?php
                            $u="admin/vanthu/suavanthu/".$vanthu['id'];
                        ?>
                        <form role="form" action="{{ url($u) }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="hoten" value="{{$vanthu['ho_ten']}}">
                            </div>
                            <?php
                            $truong=\App\Truong::all();
                            ?>
                            <div class="form-group">
                                <label for="sel2">Chọn trường</label>
                                <select class="form-control" name="truong" id="sel2">
                                    @foreach($truong as $tr)
                                        @if($tr['id']==$vanthu['id_truong'])
                                            <option value="{{$tr['id']}}" selected>{{$tr['ten_truong']}}</option>
                                        @else
                                            <option value="{{$tr['id']}}">{{$tr['ten_truong']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="sel2">Giới tính</label>
                                @if($vanthu['gioi_tinh']=="Nam")
                                    <select class="form-control" name="gioitinh" id="sel2">
                                        <option value="Nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                @else
                                    <select class="form-control" name="gioitinh" id="sel2">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    </select>
                                @endif

                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" type="text" name="sdt" value="{{$vanthu['so_dien_thoai']}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{$vanthu['email']}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="diachi" value="{{$vanthu['dia_chi']}}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection