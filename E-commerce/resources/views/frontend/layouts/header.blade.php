<?php
session_start();
// echo '<pre>';
// var_dump(session('cart'));
$tongsp = 0;
if (!session('cart'))
{
    $tongsp = 0;
}
else
{
    foreach(session('cart') as $key => $value)
    {
        $tongsp = $tongsp + $value['qty'];
    }
}
?>





<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            {{-- <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        {{-- <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        {{-- <a href="index.html"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a> --}}
                        {{-- <a href="index.html"><img src="{{asset('frontend/images/home/treecompany.jpg')}}" alt="" style="width: 139px; height:39px" /></a> --}}

                    </div>
                    <div class="btn-group pull-right clearfix">
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div> --}}
                        
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('account')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="{{route('member_history')}}"><i class="fa fa-star"></i> Đơn hàng</a></li>
                            {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --}}
                            <li><a href="{{route('showcart')}}" class = 'cart_qty' style = 'color:red'><i class="fa fa-shopping-cart"></i> Giỏ hàng <?php echo "(".$tongsp.")"?></a></li>
                            
                            
                            @if (Auth::check())
                            <li class = 'dropdown'>
                                <a href = '#' class = 'dropdown-toggle' data-toggle="dropdown" role = 'button' aria-expanded="false">
                                    <img src = '{{ asset('upload/user/avatar/'. Auth::user()->avatar) }}' style="width:35px; border-radius: 50%;"> <span class="caret"></span>
                                </a>

                                <ul class = 'dropdown-menu' role = 'menu'>
                                    <li><a href = '{{route('out')}}'><i class = 'fa fa-btn fa-sign-out'></i>Đăng xuất</a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="{{route('out')}}"><i class="fa fa-lock"></i> Logout</a></li> --}}
                            @else 
                            <li><a href="{{url('/member-login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('home')}}" class="active">Trang chủ</a></li>
                            {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li> 
                                    <li><a href="checkout.html">Checkout</a></li> 
                                    <li><a href="cart.html">Cart</a></li> 
                                    <li><a href="{{route('loginform')}}">Login</a></li> 
                                </ul>
                            </li>  --}}
                            <li class="dropdown"><a href="#">Bài viết hỗ trợ chăm sóc cây cảnh<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{route('bloglist')}}">Bài viết hỗ trợ chăm sóc cây</a></li>
                                    {{-- <li><a href="">Blog Single</a></li> --}}
                                </ul>
                            </li> 
                            {{-- <li><a href="404.html">404</a></li> --}}
                            {{-- <li><a href="contact-us.html">Contact</a></li> --}}
                            <li><a href="{{route('search_advanced')}}">Tìm kiếm nâng cao</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action='{{route('view_search')}}' method = "POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="search_box pull-right">
                        <input type="text" name = 'keyword' placeholder="Nhập từ khoá"/>
                        {{-- <input type="submit" class="btn btn-primary btn-sm" name='update' value='Tìm kiếm' style='margin-top:0; color:#666'/> --}}
                        <a><button type = 'submit' class='btn btn-warning btn-sm'>Tìm kiếm</button></a>

                    </div>
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->