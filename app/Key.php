<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $table= 'key';
    public function game()
    {
    	return $this->belongsTo('App\Game','idGame','id');
    }
    public function chiTietDonHang()
    {
    	return $this->belongsTo('App\ChiTietDonHang','idChiTiet','id');
    }
}
