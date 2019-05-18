@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Thêm giáo viên</h3>
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
    <?php
            $id=$giaovien['id'];
            $u="vanthu/giaovien/sua/$id";
            $mon=\App\MonHoc::find($giaovien['id_mon']);
    ?>
    <div class="panel-body">
        <form role="form" action="{{ url($u) }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Họ tên</label>
                <div class="col-sm-6">
                    <input type="text" name="hoten" value="{{$giaovien['ho_ten']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="text" name="ngaysinh" value="{{$giaovien['ngay_sinh']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Giới tính</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="nam" />Nam
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="nu" />Nữ
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Mã số giáo viên(Nếu có)</label>
                <div class="col-sm-6">
                    <input type="number" min="1" max="{{\App\User::max('id')}}" name="msgv" value="{{$giaovien['id_taikhoan']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">SĐT</label>
                <div class="col-sm-6">
                    <input type="text" name="sdt" value="{{$giaovien['so_dien_thoai']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" value="{{$giaovien['email']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4"> Môn giảng dạy</label>
                <div class="col-sm-6">
                    <input type="text" name="mon" value="{{$mon['ten_mon']}}" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-sm-4">Địa chỉ</label>
                <div class="col-sm-6">
                    <input type="text" name="diachi" value="{{$giaovien['dia_chi']}}" class="form-control" />
                </div>
            </div>
    </div>
    <div class="form-group">
        <div></div>
        <div class="col-sm-offset-4 col-sm-6">
            <button class="btn btn-primary">Sửa</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
            <a href="vanthu/giaovien/dsgiaovien" class="btn btn-default">Hủy bỏ</a>
        </div>
    </div>
    </form>
    </div>
@endsection