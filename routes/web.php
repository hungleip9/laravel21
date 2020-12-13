<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;

Route::get('/', 'Auth\LoginController@login');
Route::get('/home', 'HomeController@index');


Route::prefix('order')->group(function (){
    Route::get('{id}/showProducts',
        [\App\Http\Controllers\Backend\OrderController::class,'showProducts'])->name('order.showProducts');
    Route::get('/',
        [\App\Http\Controllers\Backend\OrderController::class,'index'])->name('order.index');
});
//Route::get('task',
//    [\App\Http\Controllers\Task\TaskController::class,'index'])
//    ->name('task.index');
//Route::get('task/create',
//    [\App\Http\Controllers\Task\TaskController::class,'create'])
//    ->name('task.create');
//
////Route::post('task',
////    [\App\Http\Controllers\Task\TaskController::class,'store'])->name('task.store');
////Route::get('task/{id}/edit',
////    [\App\Http\Controllers\Task\TaskController::class,'edit'])->name('task.edit');
////Route::put('task/update/{id}',
////    [\App\Http\Controllers\Task\TaskController::class,'update'])->name('task.update');
////Route::delete('task/destroy/{id}',
////    [\App\Http\Controllers\Task\TaskController::class,'destroy'])->name('task.destroy');
////Route::get('task/complete/{id}',
////    [\App\Http\Controllers\Task\TaskController::class,'complete'])->name('task.complete');
////Route::get('task/reComplete/{id}',
////    [\App\Http\Controllers\Task\TaskController::class,'reComplete'])->name('task.reComplete');
////Route::get('task/dashboard',
////    [\App\Http\Controllers\Task\TaskController::class,'dashboard'])->name('task.dashboard');
////Route::get('task/products',
////    [\App\Http\Controllers\Task\TaskController::class,'products'])->name('task.products');

Route::prefix('oniichan')->group(function (){
    Route::get('/',function (){
        return view('frontend.index');})->name('oniichan.index');

});



Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => ['auth','auth_admin']
],function(){


    //quan ly san pham
    Route::group(['prefix' => 'products'],function (){
        Route::get('/','ProductController@index')->name('backend.product.index');
        Route::get('/edit/{product}','ProductController@edit')->name('backend.product.edit');
        Route::get('/create','ProductController@create')->name('backend.product.create');
        Route::post('/store','ProductController@store')->name('backend.product.store');
        Route::put('/{id}/update','ProductController@update')->name('backend.product.update');
        Route::put('/{id}/comment','ProductController@comment')->name('backend.product.comment');
        Route::get('showComment/{id}','ProductController@showComment')->name('backend.product.showComment');
        Route::delete('/{id}/destroy','ProductController@destroy')->name('backend.product.destroy');
        Route::get('/{id}/show','ProductController@showImages')->name('backend.product.show');
    });
    //quan ly user
    Route::group(['prefix' => 'user'],function (){
        Route::get('/','UserController@index')->name('backend.user.index');
        Route::get('info','UserController@test')->name('backend.user.info');
        Route::get('create','UserController@create')->name('backend.user.create');
        Route::post('store','UserController@store')->name('backend.user.store');
        Route::get('{id}/showProduct','UserController@showProduct')->name('backend.user.showProduct');
        Route::get('{id}/edit','UserController@edit')->name('backend.user.edit');
        Route::put('{id}/upload','UserController@upload')->name('backend.user.upload');
        Route::delete('destroy/{id}','UserController@destroy')->name('backend.user.destroy');
    });
    //quan ly danh muc
    Route::group(['prefix' => 'categories'],function (){
        Route::get('/','CategoryController@index')->name('backend.categories.index');
        Route::get('create','CategoryController@create')->name('backend.categories.create');
        Route::post('store','CategoryController@store')->name('backend.categories.store');
        Route::get('show/{id}','CategoryController@showProducts')->name('backend.categories.show');
        Route::get('edit/{id}','CategoryController@edit')->name('backend.categories.edit');
        Route::put('upload/{id}','CategoryController@upload')->name('backend.categories.upload');
        Route::get('detail/{id}','CategoryController@detail')->name('backend.categories.detail');
        Route::delete('destroy/{id}','CategoryController@destroy')->name('backend.categories.destroy');
    });


});
//trang chu dashboard
Route::get('/','Frontend\DashboardController@index')->name('frontend.dashboard');
Route::get('search','Frontend\DashboardController@search')->name('frontend.dashboard.search');

Route::group([
    'namespace' => 'Frontend',
    'prefix' => 'user'
],function(){
    //quan ly san pham
    Route::group(['prefix' => 'products'],function (){
        Route::get('detail/{id}','ProductController@detail')->name('frontend.product.detail');
        Route::get('like/{id}','ProductController@like')->name('frontend.product.like');

    });
    //quan ly danh muc
    Route::group(['prefix' => 'categories'],function (){
        Route::get('detail/{id}','CategoryController@detail')->name('backend.categories.detail');
    });

    //quan ly comment
    Route::group(['prefix' => 'comments'],function (){
        Route::get('/','CommentController@index')->name('frontend.comments.index');
        Route::post('postcomment/{id}','CommentController@postcomment')->name('frontend.comments.postcomment');
        Route::get('acComment/{id}','CommentController@acComment')->name('frontend.comments.acComment');
        Route::get('notAcComment/{id}','CommentController@notAcComment')->name('frontend.comments.notAcComment');
        Route::delete('destroy/{id}','CommentController@destroy')->name('frontend.comments.destroy');

    });
    //quan ly ro hang
    Route::group(['prefix' => 'carts'],function (){
        Route::get('/','CartController@index')->name('frontend.cart.index');
        Route::get('add/{id}','CartController@add')->name('frontend.cart.add');
        Route::get('checkout','CartController@checkout')->name('frontend.cart.checkout');
        Route::get('remove/{id}','CartController@remove')->name('frontend.cart.remove');
    });

});
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'user-cart',
    'middleware' => ['auth']
],function(){
    //quan ly ro hang
    Route::group(['prefix' => 'carts'],function (){
        Route::get('checkout','CartController@checkout')->name('backend.cart.checkout');
        Route::post('store','CartController@store')->name('backend.cart.store');
        Route::get('sendMail','CartController@sendMail')->name('backend.cart.sendMail');
    });
});

Route::get('/home/test',"HomeController@index");
Route::get('/getInfo-facebook/{social}',"SocialController@getInfo")->name('getInfo.facebook');
Route::get('/checkInfo-facebook/{social}',"SocialController@checkInfo")->name('checkInfo.facebook');
Route::get('/test',function (){
    return view('test');
});



Auth::routes();

