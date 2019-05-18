@extends('vanthu.layout.index')
@section('content')
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h3 class="table-title"><i class="fa icon-envelope"></i>Thư báo của trường <strong id="TotalRow_show">(4)</strong></h3>
    </div>

    <div class="panel-body" style="padding: 0;">
        <div>
            <table class="table table-striped">
                <tbody id="tbdList">
                @foreach($thubao as $tb)
                    <tr>
                        <td data-id="showdetail" data-sendmsgrequestid="SR2019041310040">
                            <div class="cont" style="color: rgb(0, 0, 0);font-weight: bold;">Thông báo:{{$tb['tieu_de']}}</div>
                            <div class="cont">{{$tb['tom_tat']}}</div>
                            <div style="float:left;width:50%" class="date"><i class="fa icon-clock-o"></i>{{$tb['created_at']}}</div>
                        </td>
                        <td>
                            <div><a href="vanthu/thubao/dsthubao/{{$tb['id']}}" style="color: #00d6b2"> Xem</a></div>
                        </td>
                        <td>
                            <div><a href="vanthu/thubao/suathubao/{{$tb['id']}}" style="color: #3f903f">Sửa</a></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style=" text-align: center;">
                {!! $thubao->links() !!}
            </div>
        </div>
    </div>
@endsection
