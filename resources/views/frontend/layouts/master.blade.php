<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Onii Chan Shop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/backend/dist/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/backend/dist/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/backend/dist/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/backend/dist/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/backend/dist/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/backend/dist/css/custom.css">
{{--css tien te--}}
    <style type="text/css">
        .dollars:before { content:'$'; }
    </style>
{{--    end css tien te--}}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- wow -->
    <script type="text/javascript" src="/backend/dist/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- end wow -->
</head>

<body>
@include('frontend.include.header')


@yield('content')


@include('frontend.include.footer')

<script src="/backend/dist/js/jquery-3.2.1.min.js"></script>
<script src="/backend/dist/js/popper.min.js"></script>
<script src="/backend/dist/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="/backend/dist/js/jquery.superslides.min.js"></script>
<script src="/backend/dist/js/bootstrap-select.js"></script>
<script src="/backend/dist/js/inewsticker.js"></script>
<script src="/backend/dist/js/bootsnav.js."></script>
<script src="/backend/dist/js/images-loded.min.js"></script>
<script src="/backend/dist/js/isotope.min.js"></script>
<script src="/backend/dist/js/owl.carousel.min.js"></script>
<script src="/backend/dist/js/baguetteBox.min.js"></script>
<script src="/backend/dist/js/form-validator.min.js"></script>
<script src="/backend/dist/js/contact-form-script.js"></script>
<script src="/backend/dist/js/custom.js"></script>
<script src="/backend/dist/js/code.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

{{--format tiền tệ--}}
<script src="/backend/dist/js/simple.money.format.js"></script>
<script type="text/javascript">
    $('.money').simpleMoneyFormat();
</script>
{{--end format tiền tệ--}}
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(window).scroll(function(event){
            var pos_body = $('html,body').scrollTop();
            if(pos_body>100){
                $('.back-to-top').addClass('hien-ra');
            }else{
                $('.back-to-top').removeClass('hien-ra');
            }

        });
        $('.back-to-top').click(function(){
            $('html, body').animate({scrollTop : 0}, 800);
        });
    });
</script>

{{--//chat box--}}

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v9.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="104423048200912"
     logged_in_greeting="Xin chào Shop có thể giúp gì cho bạn"
     logged_out_greeting="Xin chào Shop có thể giúp gì cho bạn">
</div>

{{--end chat box--}}
</body>

</html>
