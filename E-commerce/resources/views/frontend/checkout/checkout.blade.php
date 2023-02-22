@extends('frontend.layouts.app')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Đặt hàng</li>
            </ol>
        </div><!--/breadcrums-->

        {{-- <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name" value = "{{Auth::user()->name}}">
                            <input type="text" placeholder="User Name" value = '{{Auth::user()->name}}'>
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div> --}}

        @if (!Auth::check())
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Đăng nhập</h2>
                            <form action="{{route('store')}}"  enctype="multipart/form-data" method="POST" >
                                
                                <input type="email" placeholder="Email" name='email' value='' autocomplete="off" />
                                <input type="password" placeholder="Mật khẩu" name = 'password' autocomplete="off" />
                                {{-- <span>
                                    <input type="checkbox" class="checkbox"> 
                                    Keep me signed in
                                </span> --}}
                                {{-- <button type="submit" class="btn btn-default">Login</button> --}}
                                <button class = 'btn btn-success' type = 'submit' name = 'action' value='login'>Đăng nhập</button>
                                @csrf
        
                                
                                @if ($errors->any())
                                            <div class= 'alert alert-danger alert-dismissible'>
                                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                                                <h4><i class='icon fa fa-check'></i>Thông báo</h4>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <p>{{$error}}</p>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
        
        
                                        {{-- @if(session('success'))
                                            <div class = "alert alert-success alert-dismissible">
                                                <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                                <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                                {{session('success')}}
        
                                            </div>
                                        @endif --}}
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">HOẶC</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Đăng kí nhanh!</h2>
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

                            $tong = $value['sale_price'] * $value['qty'];
                        $total = $total + $tong;

                        ?>
                        <?php }} ?>
                            <form action="{{route('store3')}}" enctype="multipart/form-data" method="post">
                                <input type="text" name = 'name' placeholder="Họ và tên"/>
                                <input type="email" name = 'email' placeholder="Email"/>
                                <input type="password" name = 'password' placeholder="Mật khẩu"/>
                                <input type='text' name = 'phone' placeholder="Số điện thoại"/>
                                <input type='text' name = 'address' placeholder = 'Địa chỉ nhận hàng'/>
                                <input id = '' name = 'price' value = '{{$total}}' hidden>
                                {{-- <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'id_country'>
                                        
                                     
                                    @foreach($country as $key =>$value)
                                    <option value = '{{$value['id']}}'                                   
                                    >{{$value['name']}}</option>
                                    
                                    @endforeach
                                    
                                </select> --}}
                                <input type="file" name='avatar'  />

                                <button type="submit" class="btn btn-default" >Đăng kí</button>
                                @csrf

                                @if ($errors->any())
                                            <div class= 'alert alert-danger alert-dismissible'>
                                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                                                <h4><i class='icon fa fa-check'></i>Thông báo</h4>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <p>{{$error}}</p>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thông báo</i></h4>
                                        {{session('success')}}
    
                                        </div>
                                @endif
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->        
        @endif

        <form action = "{{route('store2')}}"class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">
        
            
        
        
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên cây</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng cộng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    
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
                        $tong = $value['sale_price'] * $value['qty'];
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
                                <?php if ($value['status'] == 1) {
                                    ?>
                                    <s><?php echo $value['price'] ?></s>
                                    <p style="color: red" class="sale_price"><?php echo $value['sale_price']?></p>
                                {{-- <p><?php echo $value['sale_price'] ?></p> --}}
                                <?php }
                                 elseif($value['status'] == 0)  { ?> 

                                <p><?php echo $value['price'] ?></p> <?php } ?>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" id = "<?php echo $value['id']?>"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value=<?php echo $value['qty']  ?> autocomplete="off" size="2">
                                    <a class="cart_quantity_down" id = "<?php echo $value['id']?>"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                @if ($value['status'] == 1)

                                <p style='color:red; font-size:18px' class="product_total_price"><?php echo $tong?></p>
                                @else
                                <p style="font-size:18px" class="product_total_price"><?php echo $tong?></p>
                                {{-- @else --}}
                                {{-- <p>@php echo $tong @endphp</p> --}}
                                @endif
                            </td>
                            <td class="cart_delete">
                                <a  class="cart_quantity_delete" id='<?php echo $value['id'] ?>'><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        

                    
                    <?php }} ?>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                {{-- <tr>
                                    <td>Cart Sub Total</td>
                                    <td>$0</td>
                                </tr> --}}
                                <tr>
                                    <td>Phí vận chuyển</td>
                                    <td>Miễn phí</td>
                                </tr>
                                {{-- <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr> --}}
                                <tr>
                                    <td>Tổng cộng</td>
                                    <td><span value = '{{$total}}'><?php echo $total?></span></td>
                                    <input id = 'total_price' name = 'price' value = '{{$total}}' hidden>
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>

        
        <div class="payment-options ">
                {{-- <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span> --}}
                
                {{-- <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-3" hidden>
                            <div class="shopper-info">
                                <p>Shopper Information</p>
                                <form>
                                    <input type="text" placeholder="Display Name">
                                    <input type="text" placeholder="User Name">
                                    <input type="password" placeholder="Password">
                                    <input type="password" placeholder="Confirm password">
                                </form>
                                <a class="btn btn-primary" href="">Get Quotes</a>
                                <a class="btn btn-primary" href="">Continue</a>
                            </div>
                        </div>
                        <div class="col-sm-5 clearfix" style="">
                            <div class="bill-to">
                                <p>Nhập thông tin người nhận</p>
                                <div class="form-one">
                                    <form>
                                        <p style="font-size: 15px">Địa chỉ nhận hàng</p>
                                        <input type="text" placeholder="" autocomplete="off" name="address">
                                        <p style="font-size: 15px">Số điện thoại</p>
                                        <input type="text" placeholder="" autocomplete="off" name="phone">
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                                        
                    </div>
                </div> --}}
                
                <div class="form-one">
                    
                        <p style="font-size: 15px">Địa chỉ nhận hàng</p>
                        <input type="text" placeholder="" autocomplete="off" name="address">
                        <p style="font-size: 15px">Số điện thoại</p>
                        <input type="text" placeholder="" autocomplete="off" name="phone">
                        
                        @if ($errors->any())
                        <div class= 'alert alert-danger alert-dismissible'>
                            <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                            <h4><i class='icon fa fa-check'></i>Thông báo</h4>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                        {{session('success')}}
    
                                        </div>
                                @endif
                </div>

                <div class="">
                @if (Auth::check() && ($total != 0))
                <button type="submit" name = 'order' value="order" action='action' id = 'order_button' class = 'btn btn-success' style="float: right;" hidden>Xác nhận đặt hàng</button>
                @else
                <button hidden type="submit" name = 'order' value="order" action='action' id = 'order_button' class = 'btn btn-success' style="float: right; display: none" hidden>Cannot</button>

                @endif
                </div>
            </div>
            @csrf
            {{-- @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                        {{session('success')}}

                                    </div>
                                @endif --}}
        </form>
        {{-- <a><button class = 'btn btn-success' id = 'total'>Update</button></a> --}}

    </div>
    {{-- @endif --}}
</section> <!--/#cart_items-->

<script>
    $(document).ready(function(){
        $('#total').click(function(){
            var price = $('#total_price').val();
            // console.log(price);
            if (price == 0)
            {
                alert('không có sản phẩm để đặt');
            }
        });
    });
</script>
@endsection