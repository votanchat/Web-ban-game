<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table= 'game';
    public function theLoai()
    {
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
    public function khuyenMai()
    {
    	return $this->belongsTo('App\KhuyenMai','idKhuyenMai','id');
    }
    public function chiTietDonHang()
    {
    	return $this->hasMany('App\ChiTietDonHang','idGame','id');
    }
    public function key()
    {
    	return $this->hasMany('App\Key','idGame','id');
    }
    public function lichSu()
    {
    	return $this->hasMany('App\lichSu','idGame','id');
    }
}
