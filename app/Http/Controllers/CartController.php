<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game;
use Session;
use App\Cart;
class CartController extends Controller
{
    public function getGiohang()
    {
        if(!Session::get('cart')) return redirect()->route('trangchu');
        $Cart=Session::get('cart');
        //dd($Cart);
        return view('page.giohang',compact('Cart'));
    }
    public function getAddToCart($id)
    {
        $game=Game::find($id);
        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->add($game,$id);
        //dd($cart);
        Session::put('cart', $cart);
        return $this->getInfo();
    }
    public function getInfo()
    {
        if (Session::has('cart')) {
            $tongtien=0;
            $soluong=0;
            $oldCart=Session::get('cart');
            $cart = new Cart($oldCart);
            foreach($cart->items as $game) {
                $soluong+=$game['qty'];
                $dsgamemua[]=$game;
                if (isset($game['item']->khuyenMai)) {
                    $tien= $game['item']->gia*$game['item']->khuyenMai->soPhanTramKm/100;
                    $tongtien+=$tien*$game['qty'];
                }
                else{
                    $tongtien+=$game['item']->gia*$game['qty'];
                }
            }
            return response()->json(compact('dsgamemua','tongtien','soluong'));
        }
    }
    public function getAddToCartNhieu($id, $soluong)
    {
        $game=Game::find($id);
        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->addnhieu($game,$id,$soluong);
        Session::put('cart', $cart);
        return $this->getInfo();
    }
    public function getDelItemCart($id)
    {
        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart', $cart);
        }
        else
            Session::forget('cart');
        return $this->getInfo();
    }
}
