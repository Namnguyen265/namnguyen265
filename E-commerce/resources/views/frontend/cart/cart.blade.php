@extends('frontend.layouts.app')
@section('content')
<style>
    .alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
</style>
<?php 
// var_dump(session('cart'));
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              {{-- <li><a href="#">Home</a></li> --}}
              {{-- <li class="active">Giỏ hàng</li> --}}
            </ol>
        </div>
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
                        $tong = $value['sale_price'] * $value['qty'];
                        $tong_original = $value['price'] * $value['qty'];  //new
                        $total = $total + $tong;
                        
                        // echo $value['qty'];
                        // echo '</br>';
                        // var_dump($_SESSION['cart']['qty']);
                        // var_dump(session('cart'))
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
                                <p class = 'status' hidden><?php echo $value['status']?></p>
                                <?php if ($value['status'] == 1) {
                                    ?>
                                    <s><?php echo $value['price'] ?></s>
                                    <p style="color: red" class="sale_price"><?php echo $value['sale_price']?></p>
                                {{-- <p><?php echo $value['sale_price'] ?></p> --}}
                                <?php }
                                 elseif($value['status'] == 0)  { ?> 
                                    <p class="original_price"><?php echo $value['price']?></p> <?php } ?>
                            </td>
                            
                            
                            
                            <td class="cart_quantity">
                                <p class="product_quantityy" hidden value = '<?php echo $value['quantity']?>'><?php echo $value['quantity'] ?></p>
                                <div class="cart_quantity_button">
                                    
                                    <p class="">Còn lại: <?php echo $value['quantity'] ?></p>
                                    
                                    <a class="cart_quantity_up" id = "<?php echo $value['id']?>" > + </a>
                                    <input disabled class="cart_quantity_input" type="text" name="quantity" value=<?php echo $value['qty']  ?> max = <?php echo $value['quantity']?> autocomplete="off" size="2">
                                    <a class="cart_quantity_down" id = "<?php echo $value['id']?>"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                @if ($value['status'] == 1)
                                {{-- <s>@php echo $tong_original @endphp</s> --}}
                                <p style="color:red; font-size:18px" class="product_total_price"><?php echo $tong?></p>

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

<section id="do_action">
    <div class="container">
        {{-- <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div> --}}
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-6" style="float: right">
                <div class="total_area">
                    <ul>
                        {{-- <li>Cart Sub Total <span>$59</span></li> --}}
                        {{-- <li>Eco Tax <span>$2</span></li> --}}
                        <li>Phí vận chuyển <span>Miễn phí</span></li>
                        <li class = 'final'>Tổng cộng <span style="font-size: 18px"><?php echo $total ?></span></li>
                        <li class = 'final_total'>Tổng số lượng<span style="font-size: 18px"><?php echo $quantity ?></span></li>
                    {{-- </ul> --}}
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Tiếp tục</a>
                </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


<script>
    $(document).ready(function(){
			count = 0;
			$('.cart_quantity_up').click(function(){
				var qty_product = $(this).closest('.cart_quantity').find('.product_quantityy').text();
                // console.log(qty_product);
                var status = $(this).closest('tr').find('.cart_price').find('.status').text();
                // console.log(status);
				var id =  $(this).attr('id')
                // console.log(id);
				var qty = $(this).closest('.cart_quantity_button').find('input').val()
				// count = count + 1;
				// var qty_cart = $('.cart_qty').text(count.toString());
				var yy = parseInt(qty) + 1
				// console.log(qty);

                if (parseInt(status) == 0)
                {
				var price = $(this).closest('tr').find('.cart_price').find('.original_price').text()
                }
                else 
                {
                    var price = $(this).closest('tr').find('.cart_price').find('.sale_price').text()
                }
                console.log(price);
				
				var total = $('.final').find('span').text()
				var total_amount = $('.final_total').find('span').text();
                // console.log(total_amount);
                
                
				// if (parseInt(qty) >= parseInt(qty_product))
                // {
                //     // $(this).off('click');
                //     alert('sản phẩm đã vượt quá số lượng');
                //     // $('.cart_quantity_up').hide();
                // }
                
            
                
				xx = parseInt(price) + parseInt(total)
				// console.log(xx)
				uu = parseInt(total_amount) + 1;
				$(this).closest('.cart_quantity_button').find('.cart_quantity_input').val(yy)
				
				var tong = price * yy 
				$(this).closest('tr').find('.product_total_price').text(tong)
                if(parseInt(qty) < (parseInt(qty_product)))
                {
                    
                }
				// $('.final').find('span').text(xx);
				// $('.final_total').find('span').text(uu);
                
                if (parseInt(qty) < (parseInt(qty_product)))
                {
                    $(this).show();
                    $('.final').find('span').text(xx);
                    $('.final_total').find('span').text(uu);
                    // console.log(qty);
                var _token = $('input[name="_token"]').val();
				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						
						id : id,
						up:1,
                        "_token": '{{csrf_token()}}'
						
						
					},

					success: function(count){
						// $('cart_qty').attr('class', 'fa fa-shopping-cart')
						$('.cart_qty').text("Giỏ hàng " + '(' + count.toString() + ')');
						
					}
                    ,error:function(){ 
                        alert("error!!!!");
                        }
				});
            }
            else if (parseInt(qty) >= parseInt(qty_product))
            {
                $(this).closest('.cart_quantity_button').find('.cart_quantity_input').val(yy-1);
                $(this).closest('tr').find('.product_total_price').text(price*(yy-1));

                // $(this).hide();
                
                swal.fire({
                    title:'Số lượng sản phẩm đã đạt tối đa',
                    timer: 1500,
                    icon: 'warning'
                })
            }
				
			});


			$('.cart_quantity_down').click(function(){
				var id = $(this).attr('id')
				var qty = $(this).closest('.cart_quantity_button').find('input').val()

                var status = $(this).closest('tr').find('.cart_price').find('.status').text();
                console.log(status);
				var yy = parseInt(qty) - 1
				// console.log(yy);
				// var price = $(this).closest('tr').find('.cart_price').text()
                
                if (parseInt(status) == 0)
                {
				var price = $(this).closest('tr').find('.cart_price').find('.original_price').text()
                }
                else 
                {
                    var price = $(this).closest('tr').find('.cart_price').find('.sale_price').text()
                }
                console.log(price);            
    
				var total = $('.final').find('span').text()
                var total_amount = $('.final_total').find('span').text(); //new

				var _token = $('input[name="_token"]').val()
				
				xx = parseInt(total) - parseInt(price)
                uu = parseInt(total_amount) - 1; //new

				$(this).closest('.cart_quantity_button').find('.cart_quantity_input').val(yy)
				
				var tong = price * yy 
				
				$(this).closest('tr').find('.product_total_price').text(tong)
				$('.final').find('span').text(xx);
                $('.final_total').find('span').text(uu);
				if (yy < 1)
				{
					$(this).closest('tr').remove();
				}
				

				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						
						id : id,
						up:2,
						"_token": '{{csrf_token()}}'
						
					},

					success: function(count){
						$('.cart_qty').text("Giỏ hàng "+ '('+ count.toString() + ')');
					}
				});
			})

			$('.cart_quantity_delete').click(function(){
				var id =  $(this).attr('id')
				var qty = $(this).closest('tr').find('.cart_quantity_input').val();
				var price = $(this).closest('tr').find('.cart_price').text();
				var tong = $(this).closest('tr').find('.product_total_price').text();
				var total = $('.final').find('span').text()
                var total_amount = $('.final_total').find('span').text(); //new

                var _token = $('input[name="_token"]').val()

				yy = total - tong;
                uu = parseInt(total_amount) - parseInt(qty);  //new
				console.log(yy);
				$('.final').find('span').text(yy);
                $('.final_total').find('span').text(uu);
				$(this).closest('tr').remove();
				

				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						
						id : id,
						up:3,
                        "_token": '{{csrf_token()}}'
						
					},

					success: function(count){
						$('.cart_qty').text("Giỏ hàng "+ '('+ count.toString() + ')');
					}
				});
			})

			
		});
</script>
@endsection