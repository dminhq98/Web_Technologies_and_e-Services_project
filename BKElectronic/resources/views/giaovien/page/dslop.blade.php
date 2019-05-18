@extends('giaovien.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp giảng dạy</h3>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Tên lớp</th>
                <th>Môn giảng dạy</th>
                <th>Danh sách HS</th>

            </tr>
            </thead>
            <tbody>
            <?php

            ?>
            <?php
            $i=1;

//            ?>

            @foreach($gvds as $gv)
                <?php
                $lopday=\App\LopDay::Where('id_giaovien',$gv['id'])->where('id_hocki',$id_hocki)->get();
                $mon=\App\MonHoc::find($gv['id_mon']);
                $dshs1=\App\DanhSachHS::where('id_giaovien',$gv['id'])->where('id_hocki',$id_hocki)->count();
                if($dshs1==0){
                    $dshs=array('id_lop'=>null);
                }else{
                    $dshs=\App\DanhSachHS::where('id_giaovien',$gv['id'])->where('id_hocki',$id_hocki)->first();
                }
                ?>
                @foreach($lopday as $lop)
                    @if($dshs['id_lop']==$lop['id_lop'])
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{\App\LopHoc::find($lop['id_lop'])['ten_lop']}}<span class="label label-success" style="float: right; height: 22px; line-height: 19px;">Chủ nhiệm</span></td>
                            <td>{{$mon['ten_mon']}}</td>
                            <td><a href="giaovien/dslop/{{$lop['id_lop']}}/{{$gv['id']}}" style="color:#337AB7;">Xem chi tiết</a> </td>
                        </tr>
                    @else
                        <td>{{$i++}}</td>
                        <td>{{\App\LopHoc::find($lop['id_lop'])['ten_lop']}}</td>
                        <td>{{$mon['ten_mon']}}</td>
                        <td><a href="giaovien/dslop/{{$lop['id_lop']}}/{{$gv['id']}}" style="color:#337AB7;">Xem chi tiết</a> </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach

            </tbody>
        </table>
    </div>
@endsection