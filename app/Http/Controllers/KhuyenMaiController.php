<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KhuyenMai;
use App\Game;
class KhuyenMaiController extends Controller
{
   public function getDanhSach()
    {
        $dskhuyenmai = KhuyenMai::all();
        return view('admin.listkhuyenmai',compact('dskhuyenmai'));
    }
    public function getThem()
	{
		$dsgame=Game::All();
		return view('admin.themkhuyenmai',compact('dsgame'));
	}
	public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'ten'=>'required|unique:khuyenmai|min:5|max:100',
                'soPhanTramKm'=>'required|numeric|min:1|max:100'
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.unique'=>'Trùng tên',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự',
                'soPhanTramKm.required'=>'Vui lòng nhập giá',
                'soPhanTramKm.min'=>'Số phần trăm khuyến mãi phải lớn hơn 1 %',
                'soPhanTramKm.max'=>'Số phần trăm khuyến mãi phải bé hơn 100 %'
            ]
        );
        $khuyenmai= new KhuyenMai();
        $khuyenmai->ten = $req->ten;
        $khuyenmai->soPhanTramKm = $req->soPhanTramKm;
        $khuyenmai->save();
        foreach ($req->game as $gameid) {
        	$game=Game::find($gameid);
        	$game->idKhuyenMai= $khuyenmai->id;
        	$game->save();
        }
        return redirect()->back()->with('thanhcong','Thêm khuyến mãi thành công');
    }
    public function getSua($id)
	{
		$khuyenmai=KhuyenMai::find($id);
		$dsgame=Game::All();
		return view('admin.suakhuyenmai',compact('dsgame','khuyenmai'));
	}
	public function postSua($id,Request $req)
    {
        $this->validate($req,
            [
                'ten'=>'required|min:5|max:100',
                'soPhanTramKm'=>'required|numeric|min:1|max:100'
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự',
                'soPhanTramKm.required'=>'Vui lòng nhập giá',
                'soPhanTramKm.min'=>'Số phần trăm khuyến mãi phải lớn hơn 1 %',
                'soPhanTramKm.max'=>'Số phần trăm khuyến mãi phải bé hơn 100 %'
            ]
        );
        $khuyenmai= KhuyenMai::find($id);
        $khuyenmai->ten = $req->ten;
        $khuyenmai->soPhanTramKm = $req->soPhanTramKm;
        $khuyenmai->save();
        foreach ($khuyenmai->game as $game) {
        	$game->idKhuyenMai= NULL;
        	$game->save();
        }
        foreach ($req->game as $gameid) {
        	$game=Game::find($gameid);
        	$game->idKhuyenMai= $khuyenmai->id;
        	$game->save();
        }
        return redirect()->back()->with('thanhcong','Sửa khuyến mãi thành công');
    }
    public function getChiTiet($id)
    {
        $khuyenmai = KhuyenMai::find($id);
        return view('admin.chitietkhuyenmai',compact('khuyenmai'));
    }
    public function getXoa($id){
        $khuyenmai=KhuyenMai::find($id);
        $khuyenmai->delete();
        return redirect()->back()->with('thanhcong','Xóa khuyến mãi thành công');
   }
}
