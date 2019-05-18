@extends('vanthu.layout.index')
@section('content')
    <div class="panel-body">
        <h3>Giáo viên giảng dạy</h3>
        @if(session('thanhcong'))
            <div class="alert alert-success">
                {{session('thanhcong')}}
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <caption>Lớp:{{\App\LopHoc::find($id_lop)['ten_lop']}}</caption>
            <thead>
            <tr class="info">
                <th>STT</th>
                <th>Họ tên</th>
                <th>Môn học</th>
                <th>Giới tính</th>
                <th>Mã giáo viên</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            $hk=\App\HocKi::max('id');
            $dshs1=\App\DanhSachHS::where('id_lop',$id_lop)->where('id_hocki',$hk)->count();
            if($dshs1==0){
                $ds=new \App\DanhSachHS();
                $ds->id_lop=$id_lop;
                $ds->id_hocki=$hk;
                $ds->save();
            }
            $dshs=\App\DanhSachHS::where('id_lop',$id_lop)->where('id_hocki',$hk)->first();
            ?>
            @foreach($lopday as $lop)
                <?php
                $gv=\App\GiaoVien::find($lop['id_giaovien']);
                $monhoc=\App\MonHoc::find($gv['id_mon']);
                ?>
                @if($gv['id']==$dshs['id_giaovien'])
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$gv['ho_ten']}}<span class="label label-success" style="float: right; height: 22px; line-height: 19px;">Chủ nhiệm</span></td>
                        <td>{{$monhoc['ten_mon']}}</td>
                        <td>{{$gv['gioi_tinh']}}</td>
                        <td>{{$gv['id_taikhoan']}}</td>
                        <td><a href="vanthu/giangday/xoa/{{$gv['id']}}/{{$lop['id_lop']}}" style="color:#337AB7;">Xóa</a> </td>
                    </tr>
                @else
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$gv['ho_ten']}}</td>
                        <td>{{$monhoc['ten_mon']}}</td>
                        <td>{{$gv['gioi_tinh']}}</td>
                        <td>{{$gv['id_taikhoan']}}</td>
                        <td><a href="vanthu/giangday/xoa/{{$gv['id']}}/{{$lop['id_lop']}}" style="color:#337AB7;">Xóa</a> </td>
                    </tr>
                @endif
            @endforeach

            </tbody>
            <a href="vanthu/giangday/dsgiangday" class="btn btn-default">Trở lại</a>

        </table>
    </div>
@endsection