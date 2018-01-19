<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\Game;

class TheLoaiController extends Controller
{
    public function getTheLoai($id)
    {
    	$theloai=TheLoai::find($id);
    	$dstheloai=TheLoai::all();
    	$dsgame=Game::where('idTheLoai',$id)->paginate(12);
    	return view('page.theloai',compact('theloai','dsgame','dstheloai'));
    }
    public function getDanhSach()
    {
        $dstheloai = TheLoai::all();
        return view('admin.listtheloai',compact('dstheloai'));
    }
    public function getThem()
    {
    	return view('admin.themtheloai');
    }
    public function getSua($id)
    {
    	$theloai=TheLoai::find($id);
    	return view('admin.suatheloai',compact('theloai'));
    }
    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'ten'=>'required|unique:theloai|min:5|max:100',
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.unique'=>'Trùng tên thể loại',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự'
            ]
        );
        $theloai= new TheLoai();
        $theloai->ten = $req->ten;
        $theloai->save();
        return redirect()->back()->with('thanhcong','Thêm thể loại thành công');
    }
    public function postSua($id,Request $req)
    {
        $this->validate($req,
            [
                'ten'=>'required|unique:theloai|min:5|max:100',
            ],
            [
                'ten.required'=>'Chưa nhập tên',
                'ten.unique'=>'Trùng tên thể loại',
                'ten.min'=>'Tên phải lớn hơn 5 kí tự',
                'ten.max'=>'Tên không vượt quá 100 kí tự'
            ]
        );
        $theloai= TheLoai::find($id);
        $theloai->ten = $req->ten;
        $theloai->save();
        return redirect()->back()->with('thanhcong','Sửa thể loại thành công');
    }
    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect()->back()->with('thanhcong','Xóa thể loại thành công');
   }
}
