@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Thêm giảng dạy</h3>
    </div>
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
    <div class="panel-body">
        <form role="form" action="{{ url('vanthu/giangday/themgiangday') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Mã số giáo viên</label>
                <div class="col-sm-6">
                    <input type="number" min="1" max="{{\App\User::max('id')}}" name="msgv" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Lớp</label>
                <div class="col-sm-6">
                    <input type="text" name="lop" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4"> Môn giảng dạy</label>
                <div class="col-sm-6">
                    <input type="text" name="mon" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Chủ nhiệm</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="chunhiem" />
                    </label>
                </div>
            </div>

    </div>
    <div class="form-group">
        <div></div>
        <div class="col-sm-offset-4 col-sm-6">
            <button class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        </div>
    </div>
    </form>
    </div>
@endsection