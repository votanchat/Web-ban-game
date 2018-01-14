<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table= 'thanhtoan';
    public function game()
    {
    	return $this->belongsTo('App\DonHang','idDonHang','id');
    }
}
