@extends('hocsinh.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <div class="semyear-choice">
            <ul>
                <?php
                //$hk=\Illuminate\Support\Facades\DB::table('hoc_ki')->max('id');
                $user=\Illuminate\Support\Facades\Auth::user();
                $hocsinh=App\HocSinh::where('id_taikhoan',$user['id'])->get();
                $dshocsinh=App\DanhSachHS::where('id',$hocsinh[$hocsinh->count()-1]['id_danh_sach_hs'])->get();
                $hk=App\HocKi::find($dshocsinh[0]['id_hocki']);
                $namhoc=\App\NamHoc::find($hk['id_namhoc']);
                ?>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            Năm học: {{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            @foreach($hocsinh as $ds)
                                <?php
                                $dshocsinh=App\DanhSachHS::where('id',$ds['id_danh_sach_hs'])->get();
                                $hk=App\HocKi::find($dshocsinh[0]['id_hocki']);
                                $namhoc=\App\NamHoc::find($hk['id_namhoc']);
                                ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="hocsinh/kqhoctap/diem/{{$hk['id']}}">Năm học:{{$namhoc['nam_hoc']."-Học kì:".$hk['hoc_ki']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <div style="max-width:90%; margin: 0 auto;">
            <div class="table-responsive" style="margin-bottom: 30px" id="divTranscriptMark">
                <table class="table table-simple account-management" id="tbDetailMark">
                    <tbody id="tbodyDetailMark">
                    <tr>
                        <td colspan="4" style="text-align:center;padding-bottom:1px;" class="tdbold paddingbottom-0px"><strong>KẾT QUẢ HỌC TẬP RÈN LUYỆN HỌC</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:center;padding-top:0px;" class="tdbold paddingbottom-0px"><strong>Lớp: {{$lop['ten_lop']}}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left; padding-bottom:0px" class="tdbold"><strong>I. Đánh giá định kỳ về môn học</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left; font-style:italic; font-size:11px !important; padding-top:0px">(Ghi chú về ký tự: <i>T</i>: Hoàn thành tốt, <i>H</i>: Hoàn thành, <i>C</i>: Chưa hoàn thành )</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left">
                            <table class="table table-bordered-outside table-simple" id="tbnomalT">
                                <thead>
                                <tr>
                                    <th rowspan="2" style="text-align:center;font:bold; border: 1px solid;">STT</th>
                                    <th rowspan="2" style="text-align:center;font:bold; border: 1px solid; width: 40px;"> Môn học và HĐGD</th>
                                    <th colspan="3" style="text-align:center; font:bold; border: 1px solid;">Giữa học kỳ I</th><th colspan="3" style="text-align:center; font:bold; border: 1px solid;">Cuối học kỳ I</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center;border: 1px solid; width: 30px">Mức độ HT</th>
                                    <th style="text-align:center;border: 1px solid; width: 30px">Điểm KTDK</th>
                                    <th style="text-align:center;border: 1px solid; width: 200px;">Nhận xét</th>
                                    <th style="text-align:center;border: 1px solid; width: 30px">Mức độ HT</th>
                                    <th style="text-align:center;border: 1px solid; width: 30px">Điểm KTDK</th>
                                    <th style="text-align:center;border: 1px solid; width: 200px;">Nhận xét</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $i=1;
                                ?>
                                @foreach($bangdiemc1 as $bd)
                                    <?php
                                            $giuakic1=\App\GiuaKiC1::Where('id_bangdiemc1',$bd['id'])->get();
                                            $giuakic1=$giuakic1[0];
                                            $cuoikic1=\App\CuoiKiC1::Where('id_bangdiemc1',$bd['id'])->get();
                                            $cuoikic1=$cuoikic1[0];
                                            $mon=\App\MonHoc::find($bd['id_mon']);
                                    ?>

                                    <tr>
                                        <td style="width:5%;text-align:center; border: 1px solid;">{{$i++}}</td>
                                        <td style="border: 1px solid;" class="tdleft">{{$mon['ten_mon']}}</td>
                                        <td style="text-align:center; border: 1px solid;">{{$giuakic1['muc_do']}}</td>
                                        <td style="text-align:center;border: 1px solid;">{{$giuakic1['diem']}}</td>
                                        <td style="text-align:left; border: 1px solid;">{{$giuakic1['nhan_xet']}}</td>
                                        <td style="text-align:center; border: 1px solid;">{{$cuoikic1['muc_do']}}</td>
                                        <td style="text-align:center; border: 1px solid;">{{$cuoikic1['diem']}}</td>
                                        <td style="text-align:left; border: 1px solid;">{{$cuoikic1['nhan_xet']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left; padding-bottom:0px" class="tdbold"><strong>II. Đánh giá định kỳ về năng lực và phẩm chất</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left; font-style:italic; font-size:11px !important; padding-top:0px">(Ghi chú về ký tự: <i>Năng lực: </i> <i>T</i>: Tốt, <i>Đ</i>: Đạt, <i>C</i>: Cần cố gắng. <i>Phẩm chất:</i> <i>T</i>: Tốt, <i>Đ</i>: Đạt, <i>C</i>: Cần cố gắng )</td>
                    </tr>
                    <tr>
                        <?php
                        $nangluc=\App\NangLuc::where('id_hocsinh',$hsinh['id'])->get();
                        if(count($nangluc)){
                            $nangluc=$nangluc[0];
                        }else{
                            $nangluc=array("muc_do1"=>null,"muc_do2"=>null,"muc_do3"=>null,"nhan_xet"=>null);
                        }
                        $phamchat=\App\PhamChat::where('id_hocsinh',$hsinh['id'])->get();
                        if(count($phamchat)){
                            $phamchat=$phamchat[0];
                        }else{
                             $phamchat=array('muc_do1'=>null,'muc_do2'=>null,'muc_do3'=>null,'muc_do4'=>null,'nhan_xet'=>null);
                        }
                        ?>
                        <td colspan="4" style="text-align:left">
                            <table class="table table-bordered-outside table-simple table-striped" id="tbnomalT">
                                <thead>
                                <tr>
                                    <th rowspan="2" style="text-align:center;font:bold;width:150px; border: 1px solid;">Các năng lực và phẩm chất</th>
                                    <th style="text-align:center;width:70px; border: 1px solid;">Mức đạt được</th>
                                    <th style="text-align:center;width:230px; border: 1px solid;">Nhận xét</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td  style="font-weight: 700 !important; border: 1px solid;">Năng lực</td>
                                    <td colspan="2" style="font-weight: 700 !important; border: 1px solid;"></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Tự phục vụ, tự quản</td>
                                    <td style="text-align:center;border: 1px solid;">{{$nangluc['muc_do1']}}</td> <td style="border: 1px solid;" rowspan="3" class="tdleft paddingleft-5px">{{$nangluc['nhan_xet']}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Hợp tác</td>
                                    <td style="text-align:center;border: 1px solid;">{{$nangluc['muc_do2']}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Tự học và giải quyết vấn đề</td>
                                    <td style="text-align:center;border: 1px solid;">{{$nangluc['muc_do3']}}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 700 !important; border: 1px solid;">Phẩm chất</td>
                                    <td colspan="2" style="font-weight: 700 !important; border: 1px solid;"></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Chăm học, chăm làm</td>
                                    <td style="text-align:center;border: 1px solid;">{{$phamchat['muc_do1']}}</td> <td rowspan="4" class="tdleft paddingleft-5px" style="vertical-align:top;padding:5px; border: 1px solid;">{{$phamchat['nhan_xet']}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Tự tin, trách nhiệm</td>
                                    <td style="text-align:center;border: 1px solid;">{{$phamchat['muc_do2']}}</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Trung thực, kỉ luật</td>
                                    <td style="text-align:center;border: 1px solid;">{{$phamchat['muc_do3']}}</td>
                                </tr>

                                <tr>
                                    <td style="border: 1px solid;" class="tdleft">Đoàn kết, yêu thương</td>
                                    <td style="text-align:center;border: 1px solid;">{{$phamchat['muc_do4']}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection