<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table= 'donhang';
    public function lichSu()
    {
    	return $this->hasMany('App\LichSu','idDonHang','id');
    }
    public function chiTietDonHang()
    {
    	return $this->hasMany('App\ChiTietDonHang','idDonHang','id');
    }
    public function thanhToan()
    {
    	return $this->hasMany('App\ThanhToan','idDonHang','id');
    }
    public function users()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
