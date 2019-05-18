@extends('vanthu.layout.index')
@section('content')
    <div class="panel-body">
        <h3>Giáo viên giảng dạy</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Môn học</th>
                <th>Giới tính</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Mã giáo viên</th>
                <th>Sửa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            ?>
            @foreach($giaovien as $gv)
                <?php
                $monhoc=\App\MonHoc::find($gv['id_mon']);
                ?>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$gv['ho_ten']}}</td>
                        <td>{{$monhoc['ten_mon']}}</td>
                        <td>{{$gv['gioi_tinh']}}</td>
                        <td>{{$gv['so_dien_thoai']}}</td>
                        <td>{{$gv['email']}}</td>
                        <td>{{$gv['id_taikhoan']}}</td>
                        <td><a href="vanthu/giaovien/sua/{{$gv['id']}}" style="color:#337AB7;">Sửa</a> </td>
                    </tr>
            @endforeach

            </tbody>
        </table>
        <div style=" text-align: center;">
            {!! $giaovien->links() !!}
        </div>
    </div>
@endsection