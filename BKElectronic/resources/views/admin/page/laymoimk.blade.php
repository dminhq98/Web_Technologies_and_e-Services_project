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
                <div class="panel-heading">Lấy mới mật khẩu</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="{{ url('admin/lammoimatkhau') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>ID tài khoản</label>
                                <input class="form-control" type="number" min="2" max="{{\App\User::max('id')}}" name="id" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" >
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input class="form-control" type="password" name="password1" >
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Gửi</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection
