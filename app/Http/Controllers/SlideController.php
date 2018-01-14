<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\Game;

class SlideController extends Controller
{
 
    public function getDanhSach()
    {
        $dsslide = Slide::all();
        return view('admin.listslide',compact('dsslide'));
    }
    public function getThem()
    {
    	return view('admin.themslide');
    }
    public function getSua($id)
    {
    	$slide=Slide::find($id);
    	return view('admin.suaslide',compact('slide'));
    }
    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'link'=>'required|min:5|max:200',
                'image'=>'required|unique:slide|min:20|max:200',
            ],
            [
                'link.required'=>'Chưa nhập tên',
                'link.min'=>'Link phải lớn hơn 5 kí tự',
                'link.max'=>'Link không vượt quá 200 kí tự',
                'image.required'=>'Chưa nhập tên',
                'image.min'=>'Link ảnh phải lớn hơn 20 kí tự',
                'image.max'=>'Link ảnh không vượt quá 200 kí tự',
                'image.unique'=>'Ảnh trùng với slide đã có',
            ]
        );
        $slide= new Slide();
        $slide->link = $req->link;
        $slide->image = $req->image;
        $slide->save();
        return redirect()->back()->with('thanhcong','Thêm slide thành công');
    }
    public function postSua($id,Request $req)
    {
        $this->validate($req,
            [
                'link'=>'required|min:5|max:200',
                'image'=>'required|min:20|max:200',
            ],
            [
                'link.required'=>'Chưa nhập tên',
                'link.min'=>'Link phải lớn hơn 5 kí tự',
                'link.max'=>'Link không vượt quá 200 kí tự',
                'image.required'=>'Chưa nhập tên',
                'image.min'=>'Link ảnh phải lớn hơn 20 kí tự',
                'image.max'=>'Link ảnh không vượt quá 200 kí tự',
                'image.unique'=>'Ảnh trùng với slide đã có',
            ]
        );
        $slide= Slide::find($id);
       	$slide->link = $req->link;
        $slide->image = $req->image;
        $slide->save();
        return redirect()->back()->with('thanhcong','Sửa slide thành công');
    }
    public function getXoa($id){
        $slide=Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('thanhcong','Xóa slide thành công');
   }
}
