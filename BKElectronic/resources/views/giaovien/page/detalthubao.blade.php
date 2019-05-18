@extends('giaovien.layout.index')
@section('content')
    <!-- Title -->
    <h1>{{$thubao['tieu_de']}}</h1>
    <!-- Author -->
    <p>
    <p>by {{\App\VanThu::find($thubao['id_vanthu'])['ho_ten']}}</p>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> {{$thubao['created_at']}}</p>
    <hr>

    <!-- Post Content -->
    <p class="lead">{{$thubao['tom_tat']}}</p>
    <img class="img-responsive" src="image/{{$thubao['image']}}" alt="">
    <hr>
    <hr>
    {!!$thubao['noi_dung'] !!}

    <hr>
@endsection