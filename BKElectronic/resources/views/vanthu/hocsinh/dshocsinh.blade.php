@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3>Danh sách lớp học</h3>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Tên lớp</th>
                <th>Danh sách HS</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            $user=\Illuminate\Support\Facades\Auth::user();
            $vanthu=\App\VanThu::where('id_taikhoan',$user['id'])->orderBy('id', 'desc')->first();
            $lophoc=\App\LopHoc::Where('id_truong',$vanthu['id_truong'])->get();
            ?>

            @foreach($lophoc as $lop)
                <?php
                ?>
                <td>{{$i++}}</td>
                <td>{{$lop['ten_lop']}}</td>
                <td><a href="vanthu/hocsinh/dshocsinh/{{$lop['id']}}" style="color:#337AB7;">Xem chi tiết</a> </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection

