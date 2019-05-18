@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Đổi mật khẩu</h3>
    </div>

    <div class="panel-body">
        <form role="form" action="{{ url('/doimatkhau') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
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
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Mật khẩu hiện tại</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Mật khẩu mới</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="passwordnew"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Nhập lại mật khẩu mới</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="passwordnew1"/>
                </div>
            </div>
            <div class="form-group">
                <div></div>
                <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </form>
    </div>
@endsection