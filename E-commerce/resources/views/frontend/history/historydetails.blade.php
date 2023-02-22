@extends('frontend.layouts.app')
@section('content')

<div id="contact-page" class="container">
    <div class="bg">
        {{-- <div class="row">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
                <div id="gmap" class="contact-map">
                </div>
            </div>			 		
        </div>  --}}
        <div class="col-sm-12">
            @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                        {{session('success')}}

                                    </div>
                                @endif
            <div class="contact-info">
                <h2 class="title text-center">Thông tin người nhận</h2>
                <address>
                    @foreach( $customer as $value)
                    <p>Họ và tên: <b>{{$value->name}}</b></p>
                    <p>Địa chỉ: <b>{{$value->delivery_address}}</b></p>
                    <p>Số điện thoại: <b>{{$value->phone}}</b></p>
                    <p>Email: <b>{{$value->email}}</b></p>
                    <p>Hình thức thanh toán: <b>thanh toán khi nhận hàng</b></p>

                    @endforeach
                </address>
                {{-- <div class="social-networks">
                    <h2 class="title text-center">Social Networking</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div> --}}
            </div>

            
        </div>
        <section id="cart_items">
            <div class="col-12">
                <div class="header">
                    <h2 class="text-info title text-center" style="margin-bottom:20px;">Thông tin sản phẩm</h2>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        {{-- <th scope="col">STT</th> --}}
                        <th scope="col">ID đơn hàng</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col"> Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </thead>
                    <tbody>
                            @if (!empty($detail))
                            @foreach($detail as $value)
                            <tr>
                                {{-- <td>{{$value->id}}</td> --}}
                                <td>{{$value->id_history}}</td>
                                <td class="title">{{$value->name_product}}</td>
                                @foreach($product as $item)
                                    @if($item->id == $value->id_product)
                                    <?php 
                                    $getArrImage = json_decode($item->image, true);
                                    // var_dump($getArrImage);  
                                        ?>
                                <td>
                                    <a href = ""><img src="{{asset('upload/product/small/'. $getArrImage[0])}}" alt=""></a>
                                </td>
                                @endif
                                @endforeach
                                <td>{{number_format($value->product_price). " VNĐ"}}</td>
                                <td>{{$value->product_sold_quantity}}</td>
                                <td>{{number_format($value->product_price * $value->product_sold_quantity)." VNĐ"}}</td>
                                </tr>
                            <tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan='6'>Khong co nguoi dung</td>
                            </tr>
                            @endif
                            <td colspan="3"></td>
                            <td style="font-weight:bold; font-size:20px">Tổng</td>
                            @php $sum = 0 @endphp
                            @foreach ($detail as $value)
                                        
                                @php $sum += $value->product_sold_quantity @endphp
                            @endforeach
                            <td style="font-weight:bold; font-size:20px">{{$sum}}</td>
                            @foreach($customer as $value)
                            <td style="font-weight:bold; font-size:20px">{{number_format($value->price)." VNĐ"}}</td>
                            @endforeach
                            </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12">
                @foreach( $customer as $value)
                {{-- <a href = "{{route('history_cancel',$value->id)}}" class="cart_quantity_delete" href="" style="padding-top: 10px ; padding-bottom:20px"><i class="fa fa-times">Huỷ đơn hàng</i></a> --}}
                <a href = "{{route('history_cancel', $value->id)}}" class="" id=''><button class = 'btn btn-danger'><i>Huỷ đơn hàng</i></button></a>

                @endforeach
            
            {{-- <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Phí giao hàng <span>Miễn phí</span></li>
                        @php $tong = 0 @endphp
                        @foreach ($detail as $item)
                            @php $tong = $tong + $item->product_sold_quantity @endphp
                        @endforeach
                        <li>Tổng số lượng <span style="font-size: 20px">{{$tong}}</span></li>
                        @foreach ($customer as $value)
                        <li>Tổng đơn giá <span style="font-size: 20px">{{number_format($value->price).' VNĐ'}}</span></li>
                        @endforeach
                        <li>Ngày huỷ <span>{{$value->updated_at}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="" style="float:right">Huỷ đơn hàng</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div> --}}
            </div>
        </section> <!--/#cart_items-->
          
        
        

        
        {{-- <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>   --}}
    </div>	
</div>







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
@endsection