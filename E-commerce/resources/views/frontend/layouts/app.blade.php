<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    
  <!--   <link href="{{asset('frontend/css/all.css')}}" rel="stylesheet"> -->
    <link href="{{asset('frontend/css/rate.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <link href = "https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.11/sweetalert2.min.css" rel="stylsheet" type = 'text/css'>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
   
    <title>Ohana</title>
    
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
   
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- new --}}
</head><!--/head-->

<body>
	
	
	@include('frontend.layouts.header')


    @if(Route::is('account'))

    @yield('content')
    
    @elseif(Route::is('product'))

    @yield('content')

    @elseif(Route::is('createproduct'))

    @yield('content')

    @elseif (Route::is('updateform'))

    @yield('content')

    @elseif (Route::is('showcart'))

    @yield('content')

    @elseif (Route::is('checkout'))
    
    @yield('content')

    @elseif (Route::is('member_history'))

    @yield('content')

    @elseif (Route::is('history_detail'))

    @yield('content')

    @else

    @include('frontend.layouts.slide')
	
	<section>
		<div class="container">
			<div class="row">
				


				@include('frontend.layouts.menu-left')
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>

                
			</div>
		</div>
	</section>
	
    @endif
	@include('frontend.layouts.footer')
	

  
    <style>
        .product-overlay {
    background: rgba(100, 152, 15, .8);
    top: 0;
    display: none;
    height: 0;
    position: absolute;
    -webkit-transition: height 500ms ease 0s;
    transition: height 500ms ease 0s;
    width: 100%;
    display: block;
}

.left-sidebar h2,
.brands_products h2 {
    color: #3a8703;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 auto 30px;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    z-index: 3;
}

.productinfo h2 {
    color: #27ac1a;
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    font-weight: 700;
}

h2.title {
    color: #27ac1a;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 15px;
    text-transform: uppercase;
    margin-bottom: 30px;
    position: relative;
}

#cart_items .cart_info .cart_menu {
    background: #27ac1a;
    color: #fff;
    font-size: 16px;
    font-family: 'Roboto', sans-serif;
    font-weight: normal;
}

#cart_items .cart_info .cart_total_price {
    color: #27ac1a;
    font-size: 24px;
}

.item h1 span {
    color: #27ac1a;
}

.pagination .active a,
.pagination .active span,
.pagination .active a:hover,
.pagination .active span:hover,
.pagination .active a:focus,
.pagination .active span:focus {
    background-color: #27ac1a;
    border-color: #27ac1a;
    color: #FFFFFF;
    cursor: default;
    z-index: 2;
}

.pagination li a:hover {
    background: #27ac1a;
    color: #fff;
}

.breadcrumbs .breadcrumb li a {
    background: #27ac1a;
    color: #FFFFFF;
    padding: 3px 7px;
}

.nav-tabs li.active a,
.nav-tabs li.active a:hover,
.nav-tabs li.active a:focus {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #27ac1a;
    border: 0px;
    color: #FFFFFF;
    cursor: default;
    margin-right: 0;
    margin-left: 0;
}

.category-tab ul li a:hover {
    background: #27ac1a;
    color: #fff;
}

.view-product h3 {
    background: #27ac1a;
    bottom: 0;
    color: #FFFFFF;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 0;
    padding: 8px 20px;
    position: absolute;
    right: 0;
}

.slider-selection {
  -moz-box-sizing: border-box;
  background: none repeat scroll 0 0 #27ac1a;
  border-radius: 15px;
  box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
  position: absolute;
}
.tooltip-inner {
    background-color: #27ac1a;
    border-radius: 4px;
    color: #FFFFFF;
    max-width: 200px;
    padding: 3px 8px;
    text-align: center;
    text-decoration: none;
}

.mainmenu ul li a:hover,
.mainmenu ul li a.active,
.shop-menu ul li a.active {
    background: none;
    color: #27ac1a;
}

.product-overlay .add-to-cart:hover {
    background: #fff;
    color: #27ac1a;
}

.login-form form button,
.signup-form form button {
    background: #27ac1a;
    border: medium none;
    border-radius: 0;
    color: #FFFFFF;
    display: block;
    font-family: 'Roboto', sans-serif;
    padding: 6px 25px;
}

.btn.btn-primary {
    background: #27ac1a;
    border: 0 none;
    border-radius: 0;
    margin-top: 16px;
}

.blog-post-area .post-meta ul li i {
    background: #27ac1a;
    color: #FFFFFF;
    margin-left: -4px;
    margin-right: 7px;
    padding: 4px 7px;
}

.blog-post-area .single-blog-post .btn-primary {
    background: #27ac1a;
    border: medium none;
    border-radius: 0;
    color: #FFFFFF;
    margin-top: 17px;
}

.sinlge-post-meta li i {
    background: #27ac1a;
    color: #FFFFFF;
    margin-right: 10px;
    padding: 8px 10px;
}

.add-to-cart:hover {
    background: #27ac1a;
    color: #FFFFFF;
}

.or {
    background: #27ac1a;
    border-radius: 40px;
    color: #FFFFFF;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    height: 50px;
    line-height: 50px;
    margin-top: 75px;
    text-align: center;
    width: 50px;
}

.footer-bottom p span a {
    color: #27ac1a;
    font-style: italic;
    text-decoration: underline;
}

.update, .check_out {
    background: #27ac1e;
    border-radius: 0;
    color: #FFFFFF;
    margin-top: 18px;
    border: none;
    padding: 5px 15px;
}
    </style>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
     <script src="{{asset('frontend/js/sweetalert2.all.min.js')}}"></script>
</body>
</html>