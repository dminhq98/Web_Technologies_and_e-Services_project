@extends('hocsinh.layout.index')
@section('content')
    <!-- Title -->
    <h1>{{$thongbao['tieu_de']}}</h1>
    <!-- Author -->
    <p>
    <p>by {{\App\VanThu::find($thongbao['id_vanthu'])['ho_ten']}}</p>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> {{$thongbao['created_at']}}</p>
    <hr>

    <!-- Post Content -->
    <p class="lead">{{$thongbao['tom_tat']}}</p>
    <img class="img-responsive" src="image/{{$thongbao['image']}}" alt="">
    <hr>
    <hr>
    {!!$thongbao['noi_dung'] !!}

    <hr>
@endsection