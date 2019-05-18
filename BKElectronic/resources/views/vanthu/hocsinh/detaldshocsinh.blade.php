@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <div class="semyear-choice">
            <ul>
                <li>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <caption style="text-align: center; font-size: 15px; font-weight: bold;">Danh sách lớp {{$lop['ten_lop']}}</caption>
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Sửa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1
            ?>
            @foreach($hocsinh as $hs)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$hs['ho_ten']}}</td>
                    <td>{{$hs['dia_chi']}}</td>
                    <td><a href="vanthu/hocsinh/dshocsinh/sua/{{$hs['id']}}" style="color:#337AB7;">Sửa</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection