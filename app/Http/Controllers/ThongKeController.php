<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ThongKe;
use App\ThanhToan;
use App\Game;
use App\DonHang;
use App\User;
class ThongKeController extends Controller
{
	public function thongKe()
	{
		$visit=ThongKe::all();
		$ltc=$visit[0]->giaTri;
		$ltcngay=$visit[1]->giaTri;
		$game = Game::count();
		$donhang = DonHang::count();
		$donhangthanhtoan= DonHang::where('trangThai',1)->count();
		$donhangcouser=DonHang::where('idUser','<>',NULL)->count();
		$donhangthanhtoan = FLOOR($donhangthanhtoan/$donhang*100);
		$donhangcouser = FLOOR($donhangcouser/$donhang*100);
		$thanhtoan = ThanhToan::sum('soTien');
		$nguoidung = User::count();
		$dsnguoidung = User::all();
		$nguoidungao=0;
		foreach ($dsnguoidung as $value) {
			if($value->donHang()->count()) 
				{
					$nguoidungao++;
				}
		}
		$nguoidungao=floor($nguoidungao/$nguoidung*100);
		$thongke = compact('ltc','ltcngay','game','donhangthanhtoan','donhang', 'donhangcouser' , 'thanhtoan', 'nguoidung','nguoidungao');
		return $thongke;
	}
    public function tangLuotTruyCap()
    {
    	$module_name = 'page';
        $session_name = $module_name;
        if(empty($_SESSION[$session_name]))
        {
            $_SESSION[$session_name] = 1;
            $thongke=ThongKe::all();
            $thongke[0]->giaTri++;
            $thongke[1]->giaTri++;
            $thongke[0]->save();
            $thongke[1]->save();
        }
    }
    public function resetDay()
    {
    	 $thongke=ThongKe::all();
    	 $thongke[1]->giaTri=0;
    	 $thongke[1]->save();
    }
}
