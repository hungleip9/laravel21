@extends('frontend.layouts.master')
@section('content')

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container wow bounceInRight">
            <li class="text-center">
                <img src="/backend/dist/images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Chào mừng tới với <br> OniiChan Shop</strong></h1>
                            <p class="m-b-40">Chào mừng quý khách tới với website bán đồ ăn - Onii Chan shop hân hạnh phục vụ</p>
                            <p><a class="btn hvr-hover btn-nav" href="#" style="color: yellow!important">Onii Chan</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="/backend/dist/images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Chào mừng tới với <br> OniiChan Shop</strong></h1>
                            <p class="m-b-40">Chào mừng quý khách tới với website bán đồ ăn - Onii Chan shop hân hạnh phục vụ</p>
                            <p><a class="btn hvr-hover btn-nav" href="#" style="color: yellow!important">Onii Chan</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="/backend/dist/images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Chào mừng tới với <br> OniiChan Shop</strong></h1>
                            <p class="m-b-40">Chào mừng quý khách tới với website bán đồ ăn - Onii Chan shop hân hạnh phục vụ</p>
                            <p><a class="btn hvr-hover btn-nav" href="#" style="color: yellow!important">Onii Chan</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop wow bounceInLeft">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/backend/dist/images/categories_img_01.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Thực phẩm sạch</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/backend/dist/images/categories_img_02.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Vệ sinh an toàn thực phẩm</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/backend/dist/images/categories_img_03.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Thức ăn tươi ngon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <div class="box-add-products wow bounceInRight">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img style="height: 400px; width: 550px;" class="img-fluid" src="/storage/BMP.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img style="height: 400px; width: 550px;" class="img-fluid" src="/storage/MY.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Products  -->

    <div class="products-box wow bounceInLeft">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Onii Chan</h1>
                        <p>Danh sách các món ăn có tại onii chan shop</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Tất Cả</button>
                            <button data-filter=".best-seller">Giảm Giá</button>
                            @foreach($danhmucs as $danhmuc)
                                <button data-filter=".{{$danhmuc->id}}">{{$danhmuc->name}}</button>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6 special-grid @if($product->category->parent_id==-1) {{$product->category->id}} @elseif($product->category->parent_id== null) 1 @else {{$product->category->parent_id}} @endif @if(!empty($product->sale_price)) best-seller @endif">
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

                {{ $products->links() }}


        </div>
    </div>
    <div class="latest-blog wow bounceInRight">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="color: white!important;">Món được yêu thích</h1>
                        <p style="color: white!important;">Các món được yêu thích của shop.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($prs as $pr)
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="blog-box">
                                <div class="blog-img">
                                    <img style="height: 250px;" class="img-fluid" src="/storage/{{$pr->avatar}}" alt=""/>
                                </div>
                                <div class="blog-content" style="background: black!important;">
                                    <div class="title-blog">
                                        <h3>{{$pr->name}}</h3>
                                        <p>{{$pr->content}}</p>
                                    </div>
                                    <ul class="option-blog">
                                        <li><a href="{{route('frontend.product.like',$pr->id)}}"><i class="far fa-heart" style="color: red!important;"></i></a></li>
                                        <li><a href="{{route('frontend.product.detail',$pr->id)}}"><i class="fas fa-eye" style="color: red!important;"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endforeach



            </div>
        </div>
    </div>

@endsection
