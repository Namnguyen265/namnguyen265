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

.label {
    padding: 5px 12px;
    line-height: 13px;
    color: #fff;
    font-weight: 400;
    font-size: 75%;
}

.label-danger {
    background-color: #fa5838;
}

.label-rounded {
    border-radius: 60px;
}

.label-doing{
    background-color: blue;
}
.table td, table th {
    text-align: center;
    vertical-align: center;
}
.label-waiting{
        background-color: orange;
    }

</style>
<?php 
// var_dump(session('cart'));
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              {{-- <li>Trang chủ</li> --}}
              <li class="active">Quản lý đơn hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="name">ID Đơn hàng</td>
                        <td class="">Tên khách hàng</td>
                        <td class="price">Tình trạng</td>
                        <td class="quantity">Ngày đặt</td>
                        <td class="total">Tổng giá (VNĐ)</td>
                        <td>Xem chi tiết</td>
                        {{-- <td>Huỷ đơn hàng</td> --}}
                    </tr>
                </thead>
                <tbody>
                     {{-- <tr>
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
                    </tr>  --}}
                    @foreach($history as $value)

                    <tr>
                        <td class="cart_product" style="">
                            {{$value->id}}
                            {{-- <a href=""><img src="images/cart/one.png" alt=""></a> --}}
                        </td>
                        <td class="cart_description" style="">
                            {{$value->name}}
                            {{-- <p>Web ID: 1089772</p> --}}
                        </td>
                        <td class="cart_price">
                            {{-- <p>{{$value->phone}}</p> --}}
                            {{-- @if ($value->cancel == 0) --}}
                            @if ($value->order_status == 0)
                            <span class = 'label label-waiting label-rounded'>Đang chờ xử lí</span>
                            @elseif ($value->order_status == 2)
                            <span class="label label-success label-rounded">Đã giao hàng</span>
                            @elseif ($value->order_status == 1)
                            <span class="label label-doing label-rounded">Đang vận chuyển</span>
                            @else
                            {{-- @elseif ($value->cancel == 1) --}}
                            <span class="label label-danger label-rounded">Đã huỷ</span>

                            @endif
                        </td>
                        <td class="cart_quantity">
                            {{$value->created_at->format('M d, Y  H:i:s')}}
                            {{-- <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div> --}}
                        </td>
                        <td class="cart_total" >
                            <span class="cart_total_price">{{$value->price}}</span>
                        </td>
                        <td class="cart_total1" align="center">
                            <a href = "{{route('history_detail',$value->id)}}"  ><i  class="fa fa-pencil"></i></a>
                        </td>
                        {{-- <td class="cart_delete" align="center" > 
                            <a href = "{{route('history_cancel',$value->id)}}" class="cart_quantity_delete" href="" style="padding-top: 10px ; padding-bottom:20px"><i class="fa fa-times"></i></a>
                        </td> --}}
                    </tr>
                         
                        

                    
                     
                    @endforeach
                </tbody>
                @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                        {{session('success')}}

                                    </div>
                                @endif
            </table>
            <div class="text-center">
            {!! $history->links()!!}
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->

{{-- <section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
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
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li class = 'final'>Total <span></span></li>
                        <li>Total product<span></span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action--> --}}


{{-- <script>
    $(document).ready(function(){
			count = 0;
			$('.cart_quantity_up').click(function(){
				var qty_product = $(this).closest('.cart_quantity').find('.product_quantityy').text();
                // console.log(qty_product);
            
				var id =  $(this).attr('id')
                // console.log(id);
				var qty = $(this).closest('.cart_quantity_button').find('input').val()
				// count = count + 1;
				// var qty_cart = $('.cart_qty').text(count.toString());
				var yy = parseInt(qty) + 1
				// console.log(qty);
				var price = $(this).closest('tr').find('.cart_price').text()
				
				var total = $('.final').find('span').text()
				
				// if (parseInt(qty) >= parseInt(qty_product))
                // {
                //     // $(this).off('click');
                //     alert('sản phẩm đã vượt quá số lượng');
                //     // $('.cart_quantity_up').hide();
                // }
                
            
                
				xx = parseInt(price) + parseInt(total)
				// console.log(xx)
				
				$(this).closest('.cart_quantity_button').find('.cart_quantity_input').val(yy)
				
				var tong = price * yy 
				$(this).closest('tr').find('.product_total_price').text(tong)
				$('.final').find('span').text(xx);
				
                
                if (parseInt(qty) < (parseInt(qty_product)))
                {
                    $(this).show();
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
						$('.cart_qty').text("Cart " + '(' + count.toString() + ')');
						
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
                alert('Số lượng sản phẩm đã đạt tối đa');
            }
				
			});


			$('.cart_quantity_down').click(function(){
				var id = $(this).attr('id')
				var qty = $(this).closest('.cart_quantity_button').find('input').val()
				var yy = parseInt(qty) - 1
				console.log(yy);
				var price = $(this).closest('tr').find('.cart_price').text()
				var total = $('.final').find('span').text()
				var _token = $('input[name="_token"]').val()
				
				xx = parseInt(total) - parseInt(price)
				$(this).closest('.cart_quantity_button').find('.cart_quantity_input').val(yy)
				
				var tong = price * yy 
				
				$(this).closest('tr').find('.product_total_price').text(tong)
				$('.final').find('span').text(xx);

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
						$('.cart_qty').text("Cart"+ '('+ count.toString() + ')');
					}
				});
			})

			$('.cart_quantity_delete').click(function(){
				var id =  $(this).attr('id')
				var qty = $(this).closest('tr').find('.cart_quantity_input').val();
				var price = $(this).closest('tr').find('.cart_price').text();
				var tong = $(this).closest('tr').find('.product_total_price').text();
				var total = $('.final').find('span').text()
                var _token = $('input[name="_token"]').val()

				yy = total - tong;
				console.log(yy);
				$('.final').find('span').text(yy);
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
						$('.cart_qty').text("Cart"+ '('+ count.toString() + ')');
					}
				});
			})

			
		});
</script> --}}

<script>
    $(document).ready(function(){
        $(".cart_delete").click(function(){
            // alert('Đã xoá đơn hàng');
        })
    })
</script>
@endsection