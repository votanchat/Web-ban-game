<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\Game;
use App\TheLoai;
use App\Cart;
use App\Http\Controllers\ThongKeController;
use Session;
class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	$gamemoi = Game::where('hot',0)->orderBy('id')->paginate(16);
        $gamehot = Game::where('hot',1)->get();
    	return view('page.trangchu',compact('slide','gamemoi','gamehot'));
    }
    public function getChiTiet()
    {
        return view('page.chitiet');
    }
    public function getAdmin()
    {
        $ThongKeController=new ThongKeController();
        $thongke=$ThongKeController->thongke();
    	return view('admin.dashboard',compact('thongke'));
    }
    public function getLienHe()
    {
    	return view('page.lienhe');
    }
    public function getGioiThieu()
    {
        return view('page.gioithieu');
    }
}
