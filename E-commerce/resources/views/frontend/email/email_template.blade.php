<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
<head>
    <meta charset=&quot;utf-8&quot>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/rate.css')}}" rel="stylesheet">


    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />

    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <style>
        .pTag{
            font-size: 14px;
            margin:0;
            color:black;
            padding:0;
        }
    </style>
</head>
<body>
    {{-- {!! $emailBody !!}
    <br>
    <p class='pTag'> Thanks </p>
    <p class='pTag'>
        Webner Suport Team
    </p>
    <p class='pTag'>{{ $domainName }}</p> --}}


    <h3>Delivery Email Shopping.vn</h3>
    <p style = 'color: red'>{{$data['body']}}</p>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">ID Product</td>
                            <td class="description">Name Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/one.png" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
    
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/two.png" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/three.png" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr> -->
    
                        <?php
                        $total = 0;
                        $quantity = 0;
                        if (!session('cart'))
                        {?>
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                Bạn chưa chọn sản phẩm nào !
                            </div>
                        <?php } 
                        
                        else
                        { 
                        foreach (session('cart') as $key => $value) { 
                        
                            // if ($value['id']== $_SESSION['id_product'])
                            // {
                            // 	$value['qty'] += 1;
                                
                            // }
                            $tong = $value['price'] * $value['qty'];
                            $total = $total + $tong;
                            
                            // echo $value['qty'];
                            // echo '</br>';
                            // var_dump($_SESSION['cart']['qty']);
                            $quantity = $quantity + $value['qty'];
                            
                            $getArrImage = json_decode($value['image'], true);
                            // var_dump($getArrayImage[0]);
                        
                        ?>
                            
                            <tr>
                                               
                                <td class="cart_product">
                                    
                                    <a href = ""><img src="{{asset('upload/product/small/'.  $getArrImage[0])}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                                
                                    <p><?php echo $value['name']?></p>
                                    <p class = "id_product">ID: <?php echo $value['id'] ?></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo $value['price'] ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" id = "<?php echo $value['id']?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value=<?php echo $value['qty']  ?> autocomplete="off" size="2">
                                        <a class="cart_quantity_down" id = "<?php echo $value['id']?>"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="product_total_price"><?php echo $tong?></p>
                                </td>
                                <td class="cart_delete">
                                    <a  class="cart_quantity_delete" id='<?php echo $value['id'] ?>'><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            
    
                        
                        <?php }} ?> 
                        
                    </tbody>
                    @if(session('success'))
                                        <div class = "alert alert-success alert-dismissible">
                                            <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                            <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                            {{session('success')}}
    
                                        </div>
                                    @endif
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>