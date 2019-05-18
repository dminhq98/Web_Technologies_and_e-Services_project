<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BKElectronic</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="front_asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="front_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="front_asset/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-image: url(front_asset/image/login-bg.jpg);">


<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder" style="display: flex;">
        <div class="col-sm-5" style="margin: auto;">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white; text-align: center;" >
                    <h3>Đăng nhập hệ thống</h3>
                </div>

                <div class="panel-body">
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
                    <form role="form" action="{{ url('/login') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="pwd" class="control-label col-sm-3">Tài khoản</label>
                            <div class="col-sm-8">
                                <input type="text"  placeholder="username" name="username" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="control-label col-sm-3">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-8">
                                <a href="#" style="color: #3f72be;">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->


<!-- end Footer -->
<!-- jQuery -->
<script src="front_asset/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="front_asset/js/bootstrap.min.js"></script>
<script src="front_asset/js/my.js"></script>

</body>

</html>
