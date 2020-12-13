<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">

                        <option>$ USD</option>
                        <option>$ VND</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Liên hệ: 089856269</p>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="login-box">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))

                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif
                        </li>

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 20% cho toàn bộ giao dịch mua Mã khuyến mãi: offT80
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 27/7
                                Giảm giá 50% - 80% cho rau
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 10%! Mua rau
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm giá 50%! Mua ngay
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 10%! Mua rau
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm giá 50% - 80% cho rau
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 20% cho toàn bộ giao dịch mua Mã khuyến mãi: offT30
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm giá 50%! Mua ngay
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header" >
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav" style="height: 80px !important; background-color: black!important;">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="/backend/dist/images/logo.png" class="logo wow zoomInLeft" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu" style="padding-top: 35px;">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <form action="{{route('frontend.dashboard.search')}}" method="get">
                    <div class="active-cyan-4 mb-4">
                        <input class="form-control" type="text" placeholder="Search" name="key" aria-label="Search">
                    </div>
                    </form>
                    @can('admin')
                        <li class="nav-item active" style="height: 40px; padding-right: 70px;"><a class="nav-link" href="{{route('backend.user.index')}}">Admin</a></li>
                    @endcan
                        @can('big-boss')
                            <li class="nav-item active" style="height: 40px; padding-right: 70px;"><a class="nav-link" href="{{route('backend.user.index')}}">Boss</a></li>
                        @endcan

                    <li class="nav-item active"  style="height: 40px; padding-right: 70px;"><a class="nav-link" href="/">Trang Chủ</a></li>
                    <li class="dropdown"  style="height: 40px; padding-right: 70px;">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Khu Vực</a>
                        <ul class="dropdown-menu" style="background: black; width: auto!important;">

                                <li><a href="#" style="color: yellow!important;width: auto!important;">Hà Nội</a></li>
                                <li><a href="#" style="color: yellow!important;width: auto!important;">Hồ Chí Minh</a></li>
                                <li><a href="#" style="color: yellow!important;width: auto!important;">Đà Nẵng</a></li>

                        </ul>
                    </li>
                        <li class="dropdown"  style="height: 40px; padding-right: 70px;">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Danh Mục</a>
                            <ul class="dropdown-menu" style="background: black; width: 50px;" id="menu">
                            @foreach($danhmucs as $danhmuc)
                                <li class="sub-menu-cha">
                                    <a href="#" style="color: yellow!important;">{{$danhmuc->name}}</a>
                                    <ul class="sub-menu" style="background: black;">
                                    @foreach($categories as $category)
                                        @if($category->parent_id == $danhmuc->id)
                                                <li class="menu_item_children"><a href="#" style="color: yellow!important;">{{$category->name}}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
{{--                    <li class="nav-item active"  style="height: 40px; padding-right: 70px;">--}}

{{--                        <a class="nav-link" href="javascript:Load()">[Load]</a>--}}
{{--                        <br>--}}
{{--                        <div id="msg">Gia tri ban dau</div>--}}
{{--                    </li>--}}




                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="{{route('frontend.cart.index')}}">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">{{$cart_number}}</span>
                            <p> Giỏ Hàng</p>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <li>
                        <a href="#" class="photo"><img src="/backend/dist/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Delica omtantur </a></h6>
                        <p>1x - <span class="price">$80.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="/backend/dist/images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Omnes ocurreret</a></h6>
                        <p>1x - <span class="price">$60.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="/backend/dist/images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Agam facilisis</a></h6>
                        <p>1x - <span class="price">$40.00</span></p>
                    </li>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart" style="color: yellow !important">Xem giỏ Hàng</a>
                        <span class="float-right"><strong>Total</strong>: $180.00</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search" style="border: 1px solid white; margin-left: 10px; margin-right: 10px;">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->
