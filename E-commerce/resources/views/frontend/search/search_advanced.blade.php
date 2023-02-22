@extends('frontend.layouts.app')
@section('content')
<?php

// $tongsp = 0;
// foreach(session('cart') as $key => $value)
// {
//     $tongsp = $tongsp + $value['qty'];
// }

?>







    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tìm kiếm nâng cao</h2>
        <div class="row" id="search" >
            
            <form id="search-form" action="{{route('advanced')}}" method="POST" enctype="multipart/form-data">
                
                <div class = 'col-sm-2 col-md3'>
                <div class="form-group">
                    <div>Theo tên:</div>
                     <input class="form-control" type="text" name="name" placeholder="Nhập tên" autocomplete="off" />
                </div>
                </div>
    
                <div class = 'col-sm-2 col-md3'>
                <div class="form-group">
                    <div>Theo khoảng giá:</div>
                    <select data-filter="make" name="price" class="filter-make filter form-control">
                        <option value="" disabled selected>Chọn</option>
                        <option value="50000-100000">50000-100000</option>
                        <option value="100000-300000">100000-300000</option>
                        <option value='300000-500000'>300000-500000</option>
                        {{-- <option value='>500'>>500</option> --}}
                    </select>
                </div>
                </div>
                <div class = 'col-sm-2 col-md3'>
                <div class="form-group">
                    <div>Loại cây:</div>
                    <select data-filter="make" name="category" class="filter-make filter form-control">
                        <option value="" disabled selected>Chọn</option>
                        @foreach($category as $key =>$value)
                        <option value = '{{$value['id']}}'>{{$value['category']}}</option>                                                                                              
                        @endforeach
                    </select>
                </div>
                </div>
                <div class = 'col-sm-2 col-md3'>
                <div class="form-group">
                    <div>Nhà cung cấp:</div>
                    <select data-filter="make" class="filter-make filter form-control" name="brand">
                        <option value="" disabled selected>Chọn</option>
                        @foreach($brand as $key => $value)
                        <option value="{{$value['id']}}">{{$value['brand']}}</option>
                        
                        @endforeach
                    </select>
                </div>
                </div>
                <div class = 'col-sm-2 col-md3'>
                    <div>Khuyến mãi</div>
                    <select class="form-control form-control-line" value = '' name = 'status'>
                        <option value="" disabled selected>Chọn</option>
                        
                        <option value="0">Không</option>
                        <option value="1">Có</option>
                        
                        
                        
                    </select>
                    </div>
                    
                <div class="form-group col-sm-2 col-xs-2">
                    <button type="submit" class="btn btn-block btn-primary" id="search-product">Tìm kiếm</button>
                </div>
                @csrf

            </form>
            
        </div>
        
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
        @if(!empty($search_products))
        @foreach ($search_products as $value)
        <?php
            $getArrImage = json_decode($value['image'], true);
        ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('upload/product/full/'.'3'.$getArrImage[0])}}" alt="" />
                            @if ($value->status == 0)
                            <h2>{{number_format($value->price) . ' VNĐ'}}</h2>
                            @elseif ($value->status == 1)
                            <h4><s>{{number_format($value->price) .' VNĐ'}}</s></h4>
                            <h2>{{number_format($value->price * (100 - $value->sale)/100).' VNĐ'}}</h2>
                            @endif

                            
                            <p><a href="{{route('product_detail', ['id'=>$value->id])}}"></a>{{$value->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                @if ($value->status == 0)
                                <h2>{{number_format($value->price).' VNĐ'}}</h2>
                                @elseif ($value->status == 1)
                                <h3><s>{{number_format($value->price) .' VNĐ'}}</s></h3>
                                <h2>{{number_format($value->price * (100 - $value->sale)/100).' VNĐ'}}</h2>

                                @endif
                                <p><a href="{{route('product_detail', $value->id)}}"></a>{{$value->name}}</p>
                                <a  class="btn btn-default add-to-cart" id = "{{$value->id}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                <input class = 'product_qty' value = '{{$value->quantity}}' hidden />

                                

                                @if(!session('cart'))
                                <div class='alert'>
                                    <span class="closebtn">Ban chua chon san pham nay</span>
                                    <input class="in_cart" value="0" hidden>
                                </div>
                                @else
                                @if (array_search($value->id, array_column(session('cart'), 'id'))!== false)
                        @foreach (session('cart') as $key => $val)
                            @if ($val['id'] == $value->id)
                            <input class="in_cart" value = '{{$val['qty']}}' hidden>
                            @endif
                        @endforeach
                            {{-- @php echo "Yes" @endphp --}}
                        @else
                        <input class="in_cart" value = 0 hidden>
                        {{-- @php echo "NO" @endphp --}}
                        @endif
                        @endif
                            </div>
                        </div>
                        @if ($value->status == 1) <img src="upload/icon/sale2.png" class="new" alt="" /> @endif

                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('product_detail', ['id'=>$value->id])}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                        {{-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
    </div><!--features_items-->
    
    {{-- <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="blazers" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="sunglass" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="kids" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="poloshirt" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/category-tab--> --}}
    
    <!--/recommended_items-->
    
<script>

$(document).ready(function(){
			// count = 0;
			$('.hihi').click(function(){
				
				var id = $(this).attr('id');
				// console.log(id);
                // alert('Đã cập nhật giỏ hàng');

                // setTimeout(function() { alert("my message"); }, time);

				// count = count + 1; 
				// $('.cart_quantity').text("("+ count.toString() + ")");

                var _token = $('input[name="_token"]').val();
				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						id : id,
						up : 1,
                        "_token": '{{csrf_token()}}'
						// count : count 
					},
					success: function(response){
						console.log(response)
						$('.cart_qty').text("Cart "+ "(" + response.toString() + ")");
						
					}
				});
				
			});


			$('.add-to-cart').click(function(){
				
				var id = $(this).attr('id');
				// console.log(id);
                var qty = $(this).closest('.overlay-content').find('.product_qty').val();  // ton kho
                // setTimeout(function() { alert("my message"); }, time);
                // console.log(qty);
				// count = count + 1; 
				// $('.cart_quantity').text("("+ count.toString() + ")");
                var qty_cart = $(this).closest('.overlay-content').find('.in_cart').val();
                var qty_able = qty - qty_cart ;
                // alert(qty_able);
                if (qty > 0)
                {
                    if(qty_able >= 1){
                var _token = $('input[name="_token"]').val();
				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						id : id,
						up : 1,
                        "_token": '{{csrf_token()}}'
						// count : count 
					},
					success: function(response){
						console.log(response)
                        swal.fire({
                            title: "Đã cập nhật giỏ hàng",
                            timer: 1500,
                            icon: 'success',
                            showConfirmButton: false
                        }).then(function(){
                        location.reload();
                    })
                            
                    

						$('.cart_qty').text("Cart "+ "(" + response.toString() + ")");
						
					}
				});

                    }

                    else{
                        swal.fire({
                            title: "Số lượng sản phẩm trong giỏ hàng của bạn đã đạt giới hạn !",
                            timer: 5000,
                            icon: 'warning'
                        })
                        
                    }
                }

                else
                {
                    swal.fire({
                        title: 'Sản phẩm đã hết hàng !',
                        timer: 5000,
                        icon: 'warning'
                    });
                    
                }
				
			});
		});
</script>


@endsection