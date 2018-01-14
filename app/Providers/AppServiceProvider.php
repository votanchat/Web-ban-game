<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TheLoai;
use Session;
use App\Cart;
use App\Game;
use App\Http\Controllers\ThongKeController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('header', function ($view) {
        $thongke=new ThongKeController();
        $thongke->tangLuotTruyCap();
        $theLoai = TheLoai::all();
        $view->with('theLoai',$theLoai);
    });
       view()->composer('header', function ($view) {
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
            $view->with(['dsgamemua'=>$dsgamemua,'tongtien'=>$tongtien]);
        }
    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
