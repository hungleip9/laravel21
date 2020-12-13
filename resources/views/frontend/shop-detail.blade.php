@extends('frontend.layouts.master')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thông tin chi tiết</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Thông tin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 wow bounceInLeft">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                @php $i=0; @endphp
                                @foreach($images as $image)
                                    <div class="carousel-item @if($i==0) active @endif"> <img style="height: 300px!important;" class="d-block w-100" src="/storage/{{$image->path}}" @if($i==0) alt="First slide"
                                        @elseif($i==1) alt="Second slide" @elseif($i==2) alt="Third slide" @endif> </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>



                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6 wow bounceInRight">
                    <div class="single-product-details">
                        <h2 style="color: red!important;">{{$product->name}}</h2>
{{--                        <h4>{{}}</h4>--}}
{{--                        {{$product->category->name}} //ten danh muc--}}
                        @if(!empty($product->sale_price))
                            <del class="money" style="color: black;">{{$product->origin_price}}</del>
                            <h5 style="color: red;" class="money">{{$product->sale_price}}</h5>
                        @else
                            <h5 style="color: red;" class="money">{{$product->origin_price}}</h5>
                        @endif
{{--                        <del class="money">10000</del>--}}
{{--                        <h5 style="color: red;" class="money">5000</h5>--}}

                        <p class="available-stock"><p>
                        <h4 style="color: black;">Trạng thái: @if($product->status==-1) <span style="color: red;!important">Hết hàng</span> @elseif($product->status==0) <span style="color: blue;!important">Đang Nhập</span> @elseif($product->status==1) <span style="color: green!important;">Mở bán</span> @endif</h4>
						<h4 style="color: black;">Thông tin về sản phẩm:</h4>
						<p style="color:black;">{{$product->content}}</p>
						<ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label" style="color: black!important; font-weight: bold">Số lượng</label>
									<input class="form-control" value="0" min="0" max="20" type="number">
								</div>
							</li>
						</ul>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<a class="btn hvr-hover" data-fancybox-close="" href="#"> Mua ngay</a>
								<a class="btn hvr-hover" data-fancybox-close="" href="{{route('frontend.cart.add',$product->id)}}"> Thêm vào rỏ hàng</a>
                                <a class="btn hvr-hover" href="{{route('frontend.product.like',$product->id)}}"><i class="fas fa-heart"></i> Yêu thích</a>
							</div>
						</div>

						<div class="add-to-btn">
							<div class="add-comp">

							</div>
							<div class="share-bar">
								<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
            @if(Auth::user())
                {{--binh luan--}}
                <div class="row my-5">
                    <div class="card card-outline-secondary my-4" style="width: 100%;">
                        <div class="card-header" >
                            <h2 style="color: black!important; font-weight: bold;">Các bình luận đánh giá sản phẩm</h2>
                        </div>
                        <div class="card-body" style="width: 100%;">
                            @foreach($product->comments as $comment)

                            <div class="media mb-3">
                                @if($comment->status==1)
                                    <div class="media-body" style="font-weight: bold">
                                        <p style="color: black!important;">{{$comment->user->name.': '.$comment->comment}}</p>
                                        <small class="text-muted">Thời gian: {{$comment->created_at}}</small>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                            <hr>
                            <form action="{{route('frontend.comments.postcomment',$product->id)}}" method="POST" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label style="color: black">Viết đánh giá</label>
                                <textarea name="comment" rows="3" class="form-control"></textarea>
                                @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{--                bao loi session--}}
                                @if(session()->has('success'))
                                    <span style="color: white;background-color: green;">{{session()->get('success')}}</span>
                                @else
                                    <span style="color: white;background-color: red;">{{session()->get('error')}}</span>
                                @endif
                                {{--                ket thuc bao loi session--}}
                                <br>
                                <button class="btn hvr-hover" style="color: yellow!important">Đánh giá</button>
                            </form>

                        </div>
                    </div>
                </div>
                {{--end binh  luan--}}
            @endif
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="color: black!important;">Các sản phẩm liên quan</h1>
                        <p style="color: black!important;">Các món ăn khác được yêu thích tại onii chan shop có thể bạn sẽ thích</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($products as $pr)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/storage/{{$pr->avatar}}" class="img-fluid" alt="Image" style="height: 200px!important;">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="{{route('frontend.product.detail',$pr->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="{{route('frontend.product.like',$pr->id)}}" data-toggle="tooltip" data-placement="right" title="Like"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="{{route('frontend.cart.add',$pr->id)}}">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>{{$pr->name}}</h4>
                                    @if(!empty($pr->sale_price))
                                        <h5>{{$pr->sale_price}}</h5>
                                    @else
                                    <h5>{{$pr->origin_price}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>

    <!-- End Cart -->
@endsection
