@extends('giaovien.layout.index')
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
            <caption style="text-align: center; font-size: 15px; font-weight: bold;">Danh sách lớp</caption>
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection