
@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm lớp</div>
                <div class="panel-body">
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
                    <div class="col-md-12">
                        <form role="form" action="{{ url('admin/truong/themlop') }}" method="POST">
                            {!! csrf_field() !!}
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
                                <label for="sel1">Tên lớp</label>
                                <input class="form-control" type="text" name="lop" required="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
    </div>
    </div><!--/.row-->

    </div>  <!--/.main-->
@endsection

