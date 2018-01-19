<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game;
use App\TheLoai;
use App\Key;
class GameController extends Controller
{
    public function getGame(Request $req,$id)
    {
    	$game=Game::find($id);
        $module_name = 'game';
        $session_name = $module_name . '-' . $id;
        if(empty($_SESSION[$session_name]))
        {
            $_SESSION[$session_name] = 1;
            $game->luotXem++;
            $game->save();
        }
    	$gamecungtheloai=Game::where('idTheLoai',$game->theLoai->id)->where('id','<>',$game->id)->take(3)->get();
    	return view('page.chitiet',compact('game','gamecungtheloai'));
    }
    public function getTimKiem(Request $req)
    {
    	 if (empty($req->keyword)){
            return redirect()->back();
         }
    	return redirect()->route('timkiemkey',$req->keyword);
    }
    public function getTimKiemKey($keyword)
    {
    	$gamemoi=Game::where('ten','like','%'.$keyword.'%')->paginate(16);
    	//dd($gamemoi);
    	return view('page.timkiem',compact('gamemoi'));
    }
    public function getDanhSach()
    {
        $dsgame = Game::all();
        return view('admin.listgame',compact('dsgame'));
    }
    public function getThem()
    {
        $dstheloai=TheLoai::all();
        return view('admin.themgame',compact('dstheloai'));
    }
    public function getSua($id)
    {
        $game=Game::find($id);
        $dstheloai=TheLoai::all();
        return view('admin.suagame',compact('dstheloai','game'));
    }
    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'ten'=>'required|unique:game|min:5|max:100',
                'gia'=>'required|numeric|min:1000|max:99999999'
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.unique'=>'Trùng tên game',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự',
                'gia.required'=>'Vui lòng nhập giá',
                'gia.min'=>'Giá phải lớn hơn 1000đ'
            ]
        );
        $game= new Game();
        $game->ten = $req->ten;
        $game->idTheLoai = $req->theloai;
        $game->gia = $req->gia;
        $game->chitiet = $req->chitiet;
        $game->mota = $req->mota;
        $game->imageUrl = $req->img; 
        $game->save();
        return redirect()->back()->with('thanhcong','Thêm game thành công');
    }
    public function postSua(Request $req, $id)
    {
        $this->validate($req,
            [
                'ten'=>'required|min:5|max:100',
                'gia'=>'required|numeric|min:1000|max:99999999'
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự',
                'gia.required'=>'Vui lòng nhập giá',
                'gia.min'=>'Giá phải lớn hơn 1000đ'
            ]
        );
        $game= Game::find($id);
        $game->ten = $req->ten;
        $game->idTheLoai = $req->theloai;
        $game->gia = $req->gia;
        $game->chitiet = $req->chitiet;
        $game->mota = $req->mota;
        $game->imageUrl = $req->img; 
        $game->save();
        return redirect()->back()->with('thanhcong','Sửa game thành công');
    }
    public function getXoa($id)
    {
        $game=Game::find($id);
        $game->delete();
        return redirect()->back()->with('thanhcong','Xóa thành công');
    }
    public function getHot($id)
    {
        $game=Game::find($id);
        if ($game->hot)
            $game->hot=0;
        else
            $game->hot = 1;
        $game->save();
        return redirect()->back()->with('thanhcong','Cập nhật thành công');
    }
    public function getListKey($id)
    {
        $game=Game::find($id);
        $dskey=Key::where('idGame',$id)->orderBy('idChiTiet', 'asc')->get();
        return view('admin.listkey',compact('game','dskey'));
    }
    public function getNhapKey($id)
    {
        $game=Game::find($id);
        return view('admin.nhapkey',compact('game'));
    }
    public function postNhapKey($id, Request $Request)
    {
        $this->validate($Request,
            [
                'listkey'=>'required'
            ]
            ,
            [
                'listkey.required' => 'Không được để trống'
            ]
        );
        $ArrayKey=explode(PHP_EOL, $Request->listkey);
        foreach ($ArrayKey as $key) {
            if (!empty($key)) {
                $keygame=new Key();
                $keygame->key=$key;
                $keygame->idGame=$id;
                $keygame->save();
            }
        }
        return redirect()->back()->with('thanhcong','Nhập key thành công');
    }
    public function getXoaKey($id)
    {
        $key=Key::find($id);
        if($key){
        $key->delete();
        return redirect()->back()->with('thanhcong','Xóa thành công');
        }
    }
}
