<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Key;
class ChiTietDonHang extends Model
{
    protected $table= 'chitietdonhang';
    public function donHang()
    {
    	return $this->belongsTo('App\DonHang','idDonHang','id');
    }
    public function game()
    {
    	return $this->belongsTo('App\Game','idGame','id');
    }
    public function key()
    {
    	return $this->hasMany('App\Key','idChiTiet','id');
    }
}
