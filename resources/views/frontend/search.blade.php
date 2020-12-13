@extends('frontend.layouts.master')
@section('content')
    <div class="products-box wow bounceInLeft" style="background: white!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="color: black!important;">Onii Chan</h1>
                        <p style="color: black!important;">Tìm thấy <span style="color: red!important;">{{count($prts)}}</span> sản phẩm</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach($prts as $prt)
                    <div class="col-lg-3 col-md-6 special-grid">
                        <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            @if(!empty($prt->sale_price))
                                <p class="sale">Sale {{ceil(($prt->origin_price-$prt->sale_price)*100/$prt->origin_price)}}%</p>
                            @endif
                        </div>
                        <img style="width: 250px!important; height: 250px!important;" src="/storage/{{$prt->avatar}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="{{route('frontend.product.detail',$prt->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="{{route('frontend.product.like',$prt->id)}}" data-toggle="tooltip" data-placement="right" title="Like"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="{{route('frontend.cart.add',$prt->id)}}">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>{{$prt->name}}</h4>
                        @if(!empty($prt->sale_price))
                            <h5 class="money"> {{$prt->sale_price}}</h5>
                        @else
                            <h5 class="money"> {{$prt->origin_price}}</h5>
                        @endif

                    </div>
            </div>

                    </div>
                @endforeach


            </div>

        </div>
    </div>
@endsection
