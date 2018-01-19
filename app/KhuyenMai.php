<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table= 'khuyenmai';
    public function game()
    {
    	return $this->hasMany('App\Game','idKhuyenMai','id');
    }
}
