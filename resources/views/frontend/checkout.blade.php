@extends('frontend.layouts.master')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Đặt Hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Đặt Hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">

                    <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Login</button>
                    </form>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3 wow bounceInLeft">
                    <div class="checkout-address" style="color: black;">
                        <div class="title-left">
                            <h3 style="color: red!important;">Thông tin khách hàng</h3>
                        </div>
                        <form class="needs-validation" action="{{route('backend.cart.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Tên đăng nhập *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="" name="name" value="{{$user_info->name}}">
                                </div>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="" name="email" value="{{$user_info->email}}">

                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="address">Địa chỉ *</label>
                                <input type="text" class="form-control" id="" name="address" value="{{$user_info->address}}">

                            </div>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="address2">Phone *</label>
                                <input type="text" class="form-control" id="" name="phone" value="{{$user_info->phone}}">
                            </div>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 shopping-box"><button class="ml-auto btn hvr-hover" style="color: yellow!important;">Đặt hàng</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3 wow bounceInRight">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box" style="color: black!important;">
                                <div class="title-left">
                                    <h3 style="color: red;">Hóa đơn</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Sản Phẩm</div>
                                    <div class="ml-auto font-weight-bold">Giá Tiền</div>
                                </div>
                                <hr class="my-1">
                                @foreach($items as $item)
                                <div class="d-flex gr-total">
                                    <h5 style="color: black!important;">Tên Sản Phẩm: {{$item->name}}</h5>
                                    <div class="ml-auto h5"><span class="money">{{$item->price*$item->qty}}</span> VND</div>

                                </div>
                                @endforeach
                                <hr class="my-1">

                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Tổng tiền</h5>
                                    <div class="ml-auto h5"><span> {{\Gloudemans\Shoppingcart\Facades\Cart::total()}} </span> VND</div>
                                </div>
                                <hr> </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->

    <!-- End Instagram Feed  -->
@endsection




