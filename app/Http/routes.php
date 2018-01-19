<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@getIndex')->name('trangchu');
Route::get('the-loai/{id}', 'TheLoaiController@getTheLoai')->name('theloai');
Route::get('/{id}', 'GameController@getGame')->name('game')->where('id', '[0-9]+');
Route::get('info-card','CartController@getInfo')->name('thongtingiohang');
Route::get('add-to-cart/{id}','CartController@getAddToCart')->name('themgiohang');
Route::get('add-to-cart/{id}/{soluong}','CartController@getAddToCartNhieu')->name('themgiohangnhieu');
Route::get('del-item-cart/{id}','CartController@getDelItemCart')->name('xoagiohang');
Route::get('lien-he', 'PageController@getLienHe')->name('lienhe');
Route::get('gioi-thieu', 'PageController@getGioiThieu')->name('gioithieu');
Route::get('dang-ky', 'UserController@getDangKy')->name('dangky');
Route::post('dang-ky', 'UserController@postDangKy')->name('dangky');
Route::get('dang-nhap', 'UserController@getDangNhap')->name('dangnhap');
Route::post('dang-nhap', 'UserController@postDangNhap')->name('dangnhap');
Route::get('dang-xuat', 'UserController@getDangXuat')->name('dangxuat');
Route::get('profile', 'UserController@getProfile')->name('profile');
Route::post('update-profile', 'UserController@postUpdateProfile')->name('updateprofile');
Route::post('update-password', 'UserController@postUpdatePassword')->name('updatepassword');
Route::get('dat-hang', 'DonHangController@getDatHang')->name('dathang');
Route::post('dat-hang', 'DonHangController@postDatHang')->name('dathang');
Route::get('hoa-don/{id}', 'DonHangController@getHoaDon')->name('hoadon');
Route::get('thanh-toan/{id}/{tien}', 'DonHangController@getThanhToan')->name('thanhtoan');
Route::get('tim-kiem/{keyword}', 'GameController@getTimKiemKey')->name('timkiemkey');
Route::get('tim-kiem', 'GameController@getTimKiem')->name('timkiem');
Route::get('hienthikey', 'DonHangController@getHienThiKey')->name('hienthikey');
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'PageController@getAdmin')->name('dashboard')->middleware('checkAdmin');
	Route::group(['prefix' => 'game'], function() {
        Route::get('danh-sach', 'GameController@getDanhSach')->name('listgame')->middleware('checkAdmin');
        Route::get('sua/{id}', 'GameController@getSua')->name('suagame')->middleware('checkAdmin');
        Route::post('sua/{id}', 'GameController@postSua')->name('suagame')->middleware('checkAdmin');
        Route::get('xoa/{id}', 'GameController@getXoa')->name('xoagame')->middleware('checkAdmin');
        Route::get('them', 'GameController@getThem')->name('themgame')->middleware('checkAdmin');
        Route::post('them', 'GameController@postThem')->name('themgame')->middleware('checkAdmin');
        Route::get('hot/{id}', 'GameController@getHot')->name('hot')->middleware('checkAdmin');
        Route::get('nhap-key/{id}', 'GameController@getNhapKey')->name('nhapkey')->middleware('checkAdmin');
        Route::post('nhap-key/{id}', 'GameController@postNhapKey')->name('nhapkey')->middleware('checkAdmin');
        Route::get('list-key/{id}', 'GameController@getListKey')->name('listkey')->middleware('checkAdmin');
        Route::get('xoa-key/{id}', 'GameController@getXoaKey')->name('xoakey')->middleware('checkAdmin');
    });
    Route::group(['prefix' => 'the-loai'], function() {
    	Route::get('danh-sach', 'TheLoaiController@getDanhSach')->name('listtheloai')->middleware('checkAdmin');
    	Route::get('sua/{id}', 'TheLoaiController@getSua')->name('suatheloai')->middleware('checkAdmin');
    	Route::post('sua/{id}', 'TheLoaiController@postSua')->name('suatheloai')->middleware('checkAdmin');
    	Route::get('xoa/{id}', 'TheLoaiController@getXoa')->name('xoatheloai')->middleware('checkAdmin');
    	Route::get('them', 'TheLoaiController@getThem')->name('themtheloai')->middleware('checkAdmin');
    	Route::post('them', 'TheLoaiController@postThem')->name('themtheloai')->middleware('checkAdmin');
    });
    Route::group(['prefix' => 'slide'], function() {
    	Route::get('danh-sach', 'SlideController@getDanhSach')->name('listslide')->middleware('checkAdmin');
    	Route::get('sua/{id}', 'SlideController@getSua')->name('suaslide')->middleware('checkAdmin');
    	Route::post('sua/{id}', 'SlideController@postSua')->name('suaslide')->middleware('checkAdmin');
    	Route::get('xoa/{id}', 'SlideController@getXoa')->name('xoaslide')->middleware('checkAdmin');
    	Route::get('them', 'SlideController@getThem')->name('themslide')->middleware('checkAdmin');
    	Route::post('them', 'SlideController@postThem')->name('themslide')->middleware('checkAdmin');
    });
    Route::group(['prefix' => 'don-hang'], function() {
    	Route::get('danh-sach', 'DonHangController@getDanhSach')->name('listdonhang')->middleware('checkAdmin');
    	Route::get('active/{id}', 'DonHangController@getActive')->name('active')->middleware('checkAdmin');
    	Route::get('xoa/{id}', 'DonHangController@getXoa')->name('xoadonhang')->middleware('checkAdmin');
    	Route::get('chi-tiet/{id}', 'DonHangController@getChiTiet')->name('chitiet')->middleware('checkAdmin');
    });
    Route::group(['prefix' => 'khuyen-mai'], function() {
    	Route::get('danh-sach', 'KhuyenMaiController@getDanhSach')->name('listkhuyenmai')->middleware('checkAdmin');
    	Route::get('them', 'KhuyenMaiController@getThem')->name('themkhuyenmai')->middleware('checkAdmin');
    	Route::post('them', 'KhuyenMaiController@postThem')->name('themkhuyenmai')->middleware('checkAdmin');
    	Route::get('sua/{id}', 'KhuyenMaiController@getSua')->name('suakhuyenmai')->middleware('checkAdmin');
    	Route::post('sua/{id}', 'KhuyenMaiController@postSua')->name('suakhuyenmai')->middleware('checkAdmin');
    	Route::get('xoa/{id}', 'KhuyenMaiController@getXoa')->name('xoakhuyenmai')->middleware('checkAdmin');
    	Route::get('chi-tiet-khuyen-mai/{id}', 'KhuyenMaiController@getChiTiet')->name('chitietkhuyenmai')->middleware('checkAdmin');
    });
    Route::group(['prefix' => 'user'], function() {
    	Route::get('danh-sach', 'UserController@getDanhSach')->name('listuser')->middleware('checkAdmin');
    	Route::get('xoa/{id}', 'UserController@getXoa')->name('xoauser')->middleware('checkAdmin');
    	Route::get('doi-pass/{id}', 'UserController@getPassword')->name('capnhatpass')->middleware('checkAdmin');
    	Route::post('doi-pass/{id}', 'UserController@postPassword')->name('capnhatpass')->middleware('checkAdmin');
    });
});
Route::get('reset', 'ThongKeController@resetDay');