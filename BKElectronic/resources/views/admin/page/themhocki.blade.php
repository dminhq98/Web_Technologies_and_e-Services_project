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
            <div class="panel panel-default">
                <div class="panel-heading">Thêm học kì</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="sel2">Năm học</label>
                                <select class="form-control" id="sel2">
                                    <option>2017-2018</option>
                                    <option>2018-2019</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Học kỳ: </label>
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
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