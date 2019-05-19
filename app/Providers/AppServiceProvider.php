<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaisanpham;
use Session;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $loai=loaisanpham::all();
            $view->with('loai',$loai);

        });
		view()->composer(['header','page.giohang'],function($view){
            if(Session('cart'))
            {
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

            }
        });
    }
}
