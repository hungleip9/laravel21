@extends('frontend.layouts.master')
@section('content')
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Onii Chan</h1>
                        <p>Danh sách các món {{$product->category->name}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Tất Cả</button>
                            <button data-filter=".best-seller">Giảm Giá</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if(!empty($product->sale_price))
                                        <p class="sale">Sale {{ceil(($product->origin_price-$product->sale_price)*100/$product->origin_price)}}%</p>
                                    @endif
                                </div>
                                <img style="width: 250px!important; height: 250px!important;" src="/storage/{{$product->avatar}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{route('frontend.product.detail',$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="{{route('frontend.product.like',$product->id)}}" data-toggle="tooltip" data-placement="right" title="Like"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="{{route('frontend.cart.add',$product->id)}}">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{$product->name}}</h4>
                                @if(!empty($product->sale_price))
                                    <h5 class="money"> {{$product->sale_price}}</h5>
                                @else
                                    <h5 class="money"> {{$product->origin_price}}</h5>
                                @endif

                            </div>
                        </div>

                    </div>
                @endforeach


            </div>


        </div>
    </div>
@endsection
