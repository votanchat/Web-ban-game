<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use Session;
use App\DonHang;
use App\ChiTietDonHang;
use App\ThanhToan;
use App\LichSu;
use App\Key;
use App\TheLoai;
use Auth;
class DonHangController extends Controller
{
    public function getDatHang()
    {
    	if (Session::has('cart')) {
                $tongtien=0;
                $oldCart=Session::get('cart');
                $cart = new Cart($oldCart);
                foreach($cart->items as $game) {
                    $dsgamemua[]=$game;
                    if (isset($game['item']->khuyenMai)) {
                        $tien= $game['item']->gia*$game['item']->khuyenMai->soPhanTramKm/100;
                        $tongtien+=$tien*$game['qty'];
                    }
                    else{
                        $tongtien+=$game['item']->gia*$game['qty'];
                    }
                }
                return view('page.dathang',['dsgamemua'=>$dsgamemua,'tongtien'=>$tongtien]);
            }
        else{
        	return view('page.dathang');
        }
    	
    }
    public function postDatHang(Request $req)
    {
    	$tongtien=0;
    	$oldCart=Session::get('cart');
    	$cart = new Cart($oldCart);
    	foreach($cart->items as $game) {
    		$dsgamemua[]=$game;
    		if (isset($game['item']->khuyenMai)) {
    			$tien= $game['item']->gia*$game['item']->khuyenMai->soPhanTramKm/100;
    			$tongtien+=$tien*$game['qty'];
    		}
    		else{
    			$tongtien+=$game['item']->gia*$game['qty'];
    		}
    	}
    	$this->validate($req,
    		[
    			'email'=> 'required|email|max:100',
    			'sdt' => 'required|numeric'
    		],
    		[
    			'email.required' => 'Vui lòng nhập email',
    			'email.email'=>'Không đúng định dạnh email',
    			'sdt.required' => 'Vui lòng nhập số điện thoại',
    			'sdt.numeric' => 'Số điện thoại sai định dạng'
    		]
    	);
    	$chitiet='Số điện thoại: '.$req->sdt.', Ghi chú: '.$req->notes;
    	$donhang= new DonHang();
    	$donhang->mailNhan=$req->email;
    	$donhang->tien= $tongtien;
        $donhang->ten= $req->name;
    	$donhang->chiTiet= $chitiet;
        if(Auth::check()){
                $donhang->idUser=Auth::user()->id;
            }
    	$donhang->save();
    	foreach ($dsgamemua as $gamemua) {
    		$chitietdonhang = new ChiTietDonHang();
    		$chitietdonhang->idGame = $gamemua['item']->id;
    		$chitietdonhang->idDonHang = $donhang->id;
    		$chitietdonhang->soLuong = $gamemua['qty'];
    		if (isset($gamemua['item']->khuyenMai)) 
    			$tien = $gamemua['item']->gia*$gamemua['item']->khuyenMai->soPhanTramKm/100;
    		else 
    			$tien = $gamemua['item']->gia;
    		$chitietdonhang->donGia=$tien;
    		$chitietdonhang->save();
    	}
    	Session::forget('cart');
    	if($req->payment_method=='ATM')
    	return redirect()->route('hoadon',$donhang->id)->with('thanhcong','Đặt hàng thành công');
    	else return redirect()->route('hoadon',$donhang->id)->with('thanhcong','Đặt hàng thành công');
    }
    public function getHoaDon($id)
    {
    	$donhang=DonHang::find($id);
        if((!Auth::check() &&  $donhang->trangThai == 1 )||(Auth::user()->lv == 0 && Auth::user()->id != $donhang->idUser)){
           return redirect()->route('trangchu');
        }
        $tongtien=0;
        foreach ($donhang->thanhToan as $thanhtoan) {
            $tongtien+=$thanhtoan->soTien;
        }
    	return view('page.hoadon',compact('donhang','tongtien'));
    }
    public function getActive($id)
    {
        $donhang = DonHang::find($id);
        foreach($donhang->chiTietDonHang as $chitiet){
            $dem=Key::where('idGame',$chitiet->idGame)->where('idChiTiet',NULL)->count();
            $key=Key::where('idGame',$chitiet->idGame)->where('idChiTiet',NULL)->get();
            if($dem<$chitiet->soLuong) {
                $donhang->trangThai=2;
                $donhang->save();
                return redirect()->back()->with('thanhcong','Thiếu key hóa đơn đã thanh toán sẽ được xử lý khi có key');
            }
            for ($i = 0; $i < $chitiet->soLuong; $i++) { 
                $key[$i]->idChiTiet = $chitiet->id;
                $key[$i]->save();
            }
        }
        $donhang->trangThai=1;
        $donhang->save();
        return $this->HienThiKey($id);
    }
     public function HienThiKey($id)
    {
        $dh = DonHang::find($id);
        return redirect()->route('hienthikey')->with('dh', $dh);
    }
    public function getHienThiKey()
    {
        if (!Session('dh')) {
            return redirect()->route('trangchu');
        }
        $dh=Session('dh');
        return view('page.hienthikey',compact('dh'));
    }
    public function getThanhToan($id,$tien){
    	$thanhtoan = new ThanhToan();
    	$thanhtoan->soTien = $tien;
    	$thanhtoan->idDonHang = $id;
    	$thanhtoan->save();
    	$donhang = DonHang::find($id);
    	$tongtien=0;
    	foreach ($donhang->thanhToan as $thanhtoan) {
    		$tongtien+=$thanhtoan->soTien;
    	}
    	if($tongtien>=$donhang->tien){
           return $this->getActive($id);
    	}
    	return redirect()->back();
    }
    public function getDanhSach()
    {
        $dsdonhang = DonHang::all();
        return view('admin.listdonhang',compact('dsdonhang'));
    }
    public function getChiTiet($id)
    {
        $donhang = DonHang::find($id);
        return view('admin.listchitiet',compact('donhang'));
    }
    public function getXoa($id){
        $donhang=DonHang::find($id);
        $donhang->delete();
        return redirect()->back()->with('thanhcong','Xóa đơn thành công');
   }
}
