<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table= 'theloai';
    public function game()
    {
    	return $this->hasMany('App\Game','idTheLoai','id');
    }
}
