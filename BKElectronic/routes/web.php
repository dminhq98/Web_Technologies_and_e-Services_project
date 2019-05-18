<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('login','AuthController@getLogin');
Route::post('login','AuthController@postLogin')->name('login');
Route::get('logout', [ 'as' => 'logout', 'uses' => 'AuthController@getLogout']);
Route::post('doimatkhau','AuthController@postdoiMatKhau')->name('doimatkhau');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){
    Route::get('/','AdminController@getIndex');
    Route::group(['prefix'=>'truong'],function (){
        Route::get('themtruong','AdminController@getThemTruong');
        Route::post('themtruong','AdminController@postThemTruong');
        Route::get('suatruong/{id_truong}','AdminController@getSuaTruong');
        Route::post('suatruong/{id_truong}','AdminController@postSuaTruong');
        Route::get('xoatruong/{id_truong}','AdminController@xoaTruong');
        Route::get('danhsachtruong','AdminController@getDanhSachTruong');
        Route::get('danhsachxoatruong','AdminController@getDanhSachXoaTruong');
        Route::get('danhsachlop/{id_truong}','AdminController@getDanhSachLop');
        Route::get('themlop','AdminController@getThemLop');
        Route::post('themlop','AdminController@postThemLop');
        Route::get('xoalop/{id_truong}/{id_lop}','AdminController@xoaLop');
    });
    Route::group(['prefix'=>'monhoc'],function (){
        Route::get('themmon','AdminController@getThemMon');
        Route::post('themmon','AdminController@postThemMon');
        Route::get('suamon/{id_mon}','AdminController@getSuaMon');
        Route::post('suamon/{id_mon}','AdminController@postSuaMon');
        Route::get('danhsachmon','AdminController@getDanhSachMon');
    });
    Route::group(['prefix'=>'vanthu'],function (){
        Route::get('themvanthu','AdminController@getThemVanThu');
        Route::post('themvanthu','AdminController@postThemVanThu');
        Route::get('suavanthu/{id_vanthu}','AdminController@getSuaVanThu');
        Route::post('suavanthu/{id_vanthu}','AdminController@postSuaVanThu');
        Route::get('xoavanthu/{id_vanthu}','AdminController@xoaVanThu');
        Route::get('danhsachvanthu','AdminController@getDanhSachVanThu');
        Route::get('danhsachxoavanthu','AdminController@getDanhSachXoaVanThu');

    });
    Route::group(['prefix'=>'quantri'],function (){
        Route::get('themquantri','AdminController@getThemQuanTri');
        Route::post('themquantri','AdminController@postThemQuanTri');
        Route::get('suaquantri/{id_admin}','AdminController@getSuaQuanTri');
        Route::post('suaquantri/{id_admin}','AdminController@postSuaQuanTri');
        Route::get('dsquantri','AdminController@getDSQuantri');
        Route::get('dsxoaquantri','AdminController@getDSXoaQuantri');
        Route::get('xoaquantri/{id_admin}','AdminController@xoaQuanTri');
        Route::get('khoiphucquantri/{id_admin}','AdminController@khoiPhucQuanTri');

    });
    Route::group(['prefix'=>'hocki'],function (){
        Route::get('themhocki','AdminController@getThemHocKi');
       // Route::post('themhocki','AdminController@postThemHocKi');
        Route::get('danhsachhocki','AdminController@getDSHocKi');
       // Route::get('xoahocki/{id_hocki}','AdminController@xoaHocKi');
    });
    Route::get('tttaikhoan','AdminController@getttTaiKhoan');
    Route::get('lammoimatkhau','AdminController@getLayMK');
    Route::post('lammoimatkhau','AdminController@postLayMK');

});

Route::group(['prefix'=>'hocsinh','middleware'=>'hocsinhLogin'],function (){
    Route::get('/','HocSinhController@getindex');
    Route::group(['prefix'=>'thongbao'],function (){
        Route::get('/','HocSinhController@getThongBao');
        Route::get('/{id_thongbao}','HocSinhController@getDetalThongBao');
    });
    Route::group(['prefix'=>'dslop'],function (){
        Route::get('/{id_hk}','HocSinhController@getDSLop');
    });
    Route::group(['prefix'=>'dsgiaovien'],function (){
        Route::get('/{id_hk}','HocSinhController@getDSGiaoVien');
    });
    Route::group(['prefix'=>'kqhoctap'],function (){
        Route::get('diem/{id_hk}','HocSinhController@getDiem');
        Route::get('phieudanhgia','HocSinhController@getPhieuDanhGia');
    });
    Route::group(['prefix'=>'taikhoan'],function (){
        Route::get('tttaikhoan','HocSinhController@getTTTaiKhoan');
        Route::get('doimatkhau','HocSinhController@doiMatKhau');
    });
});

Route::group(['prefix'=>'giaovien','middleware'=>'giaovienLogin'],function (){
    Route::get('/','GiaoVienController@getindex');
    Route::group(['prefix'=>'thubao'],function (){
        Route::get('/','GiaoVienController@getThuBao');
        Route::get('/{id_thubao}','GiaoVienController@getDetalThuBao');

    });
    Route::group(['prefix'=>'dslop'],function (){
        Route::get('/','GiaoVienController@getDSLop');
        Route::get('/{id_lop}/{id_giaovien}','GiaoVienController@getDetalDSLop');

    });
    Route::group(['prefix'=>'nhapdiem'],function (){
        Route::get('/','GiaoVienController@getNhapDiem');
        Route::get('/{id_lop}/{id_giaovien}','GiaoVienController@getDetalNhapDiem');
        Route::get('nhap/{id_lop}/{id_giaovien}','GiaoVienController@getDiem');
       // Route::get('nhap/{id_lop}/{id_giaovien}','GiaoVienController@getDiemc1');
      //  Route::put('{id_lop}/{id_giaovien}}','GiaoVienController@postDiem');
    });
    Route::group(['prefix'=>'danhgia'],function (){
        Route::get('/','GiaoVienController@getDanhGia');
        Route::get('/{id_lop}/{id_giaovien}','GiaoVienController@getDetalDanhGia');
        Route::get('nhap/{id_lop}/{id_giaovien}','GiaoVienController@getThemDanhGia');
    });
    Route::group(['prefix'=>'taikhoan'],function (){
        Route::get('tttaikhoan','GiaoVienController@getTTTaiKhoan');
        Route::get('doimatkhau','GiaoVienController@doiMatKhau');
    });
});

Route::group(['prefix'=>'vanthu','middleware'=>'vanthuLogin'],function (){
    Route::get('/','VanThuController@getIndex');
    Route::group(['prefix'=>'thongbao'],function (){
        Route::get('dsthongbao/{id_thongbao}','VanThuController@getdetalThongbao');
        Route::get('dsthongbao','VanThuController@getdsThongbao');
        Route::get('themthongbao','VanThuController@themThongBao');
        Route::post('themthongbao','VanThuController@postthemThongBao');
        Route::get('suathongbao/{id_thongbao}','VanThuController@suaThongBao');
        Route::post('suathongbao/{id_thongbao}','VanThuController@postsuaThongBao');


    });
    Route::group(['prefix'=>'thubao'],function (){
        Route::get('dsthubao','VanThuController@getdsThubao');
        Route::get('dsthubao/{id_thubao}','VanThuController@getdetalThubao');
        Route::get('themthubao','VanThuController@themThuBao');
        Route::post('themthubao','VanThuController@postthemThuBao');
        Route::get('suathubao/{id_thubao}','VanThuController@suaThuBao');
        Route::post('suathubao/{id_thubao}','VanThuController@postsuaThuBao');
    });
    Route::group(['prefix'=>'giaovien'],function (){
        Route::get('dsgiaovien','VanThuController@getdsgiaovien');
        Route::get('themgiaovien','VanThuController@themgiaovien');
        Route::post('themgiaovien','VanThuController@postthemgiaovien');
        Route::get('sua/{id_giaovien}','VanThuController@suagiaovien');
        Route::post('sua/{id_giaovien}','VanThuController@postsuagiaovien');
    });
    Route::group(['prefix'=>'giangday'],function (){
        Route::get('dsgiangday','VanThuController@getdsgiangday');
        Route::get('dsgiangday/{id_lop}','VanThuController@getdetalgiangday');
        Route::get('themgiangday','VanThuController@themgiangday');
        Route::post('themgiangday','VanThuController@postthemgiangday');
        Route::get('xoa/{id_giaovien}/{id_lop}','VanThuController@xoagiangday');
    });
    Route::group(['prefix'=>'hocsinh'],function (){
        Route::get('dshocsinh','VanThuController@getdshocsinh');
        Route::get('dshocsinh/{id_lop}','VanThuController@getdetaldshocsinh');
        Route::get('dshocsinh/sua/{id_hs}','VanThuController@suashocsinh');
        Route::post('dshocsinh/sua/{id_hs}','VanThuController@postsuashocsinh');
        Route::get('themhocsinh','VanThuController@themhocsinh');
        Route::post('themhocsinh','VanThuController@postthemhocsinh');
    });
    Route::group(['prefix'=>'taikhoan'],function (){
        Route::get('tttaikhoan','VanThuController@getTTTaiKhoan');
        Route::get('doimatkhau','VanThuController@doiMatKhau');
    });
});
