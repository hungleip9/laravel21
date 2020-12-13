<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $danhmucs = Category::where('parent_id','-1')->get();
        $categories = Category::all();
        $products = Product::orderBy('updated_at','desc')->paginate(8);
        $prs = Product::orderBy('like','desc')->paginate(3);
        $imagess = Image::all();
        //header backend
        $ords = Order::all();
        $cmts = Comment::all();
        $uses = User::all();
        $ctgrs = Category::all();
        //end header backend
        View::share([
            'danhmucs' => $danhmucs,
            'products' => $products,
            'prs' => $prs,
            'imagess' => $imagess,
            'categories'=> $categories,

            //header backend
            'ords' => $ords,
            'cmts' => $cmts,
            'uses' => $uses,
            'ctgrs' =>$ctgrs
            //end header backend

        ]);
    }
}
