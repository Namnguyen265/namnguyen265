<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Loại cây</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Sportswear
                        </a>
                    </h4>
                </div>
                <div id="sportswear" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="#">Nike </a></li>
                            <li><a href="#">Under Armour </a></li>
                            <li><a href="#">Adidas </a></li>
                            <li><a href="#">Puma</a></li>
                            <li><a href="#">ASICS </a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Mens
                        </a>
                    </h4>
                </div>
                <div id="mens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="#">Fendi</a></li>
                            <li><a href="#">Guess</a></li>
                            <li><a href="#">Valentino</a></li>
                            <li><a href="#">Dior</a></li>
                            <li><a href="#">Versace</a></li>
                            <li><a href="#">Armani</a></li>
                            <li><a href="#">Prada</a></li>
                            <li><a href="#">Dolce and Gabbana</a></li>
                            <li><a href="#">Chanel</a></li>
                            <li><a href="#">Gucci</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Womens
                        </a>
                    </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="#">Fendi</a></li>
                            <li><a href="#">Guess</a></li>
                            <li><a href="#">Valentino</a></li>
                            <li><a href="#">Dior</a></li>
                            <li><a href="#">Versace</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            @foreach($category as $value)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href = "{{route('product_category', $value->id)}}" class="category_product">{{$value->category}}</a></h4>
                    <input value = '{{$value->id}}' hidden>
                </div>
            </div>
            @endforeach
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Fashion</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Households</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Interiors</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Clothing</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Bags</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                </div>
            </div> --}}
        </div><!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>Nhà cung cấp</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    {{-- <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li> --}}
                    @foreach($brand as $item)
                    <li><a href="{{route('product_company', $value->id)}}"> <span class="pull-right"></span>{{$item->brand}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Khoảng giá</h2>
            <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="500000" data-slider-step="10000" data-slider-value="[200000, 450000]" id="sl2" ><br />
                 <b class="pull-left">0 VNĐ</b> <b class="pull-right">500000 VNĐ</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            {{-- <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" /> --}}
        </div><!--/shipping-->
        {{-- <button id = 'hihi'>Button</button> --}}
    </div>

    <script>

        $(document).ready(function(){
            $('#sl2').click(function(){
                // var xx = $(this).attr('class');
                // alert('xx');
                var xx = $(this).val();
                alert(xx);
                console.log(xx);
            });

            

            $('.slider-track').click(function(){
                var price = $('.tooltip-inner').text();
                console.log(price);
                // alert(price);

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    method: 'POST',
                    url: '{{url("/searchprice/ajax")}}',
                    data:{
                        price : price,
                        "_token": '{{csrf_token()}}'

                    },
                    success:function(response){
                    
                        
                        var html = '';
                        Object.values(response.search_product).map(function(key,value){
                            
                            var xx = JSON.parse(response.search_product[value]['image']);
                            var id = response.search_product[value]['id'];
                            console.log(id);                       
                    
                            var img = "{{asset('upload/product/full/3')}}" + xx[0];
                            var id_prod =  "{{route('product_detail', '')}}" + '/' +id;
                    html += "<div class='col-sm-4'>" + 
                                "<div class = 'product-image-wrapper'>" +
                                    "<div class='single-products'>" +
                                        "<div class='productinfo text-center'>" +
                                            "<img src = '" + img + "' alt='' />" + 
                                            "<h2>" + response.search_product[value]['price']  + "</h2>" +
                                            "<p><a href = '" + id + "'></a>" + response.search_product[value]['name'] + "</p>" +
                                            "<a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>" +

	            		
	                    
                                        "</div>" +
                                        "<div class='product-overlay'>" +
                                            "<div class='overlay-content'>" + 
                                                "<h2>" + response.search_product[value]['price'] + "</h2>" +
                                                "<p>" + response.search_product[value]['name'] + "</p>" +
                                                "<a  class='btn btn-default add-to-cart-2' id =" + response.search_product[value]['id'] + "><i class='fa fa-shopping-cart'></i>Add to cart</a>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>" + 
                                    "<div class='choose'>"+
                                        "<ul class='nav nav-pills nav-justified'>" +
                                            "<li><a href='" + id_prod + "'><i class='fa fa-plus-square'></i>See details</a></li>" +
                                            "<li><a href=''><i class='fa fa-plus-square'></i>Add to compare</a></li>" +
                                        "</ul>"+
                                    "</div>"+
                        "</div>" + 
	                "</div>";
                        

                    
                    
                        });
                        $('.features_items').html(html);

                        $('.fa fa-plus-square').click(function(){
                            alert('HIHIHI');
                        });
                        
                    }
                });
            });

            // $('.add-to-cart').click(function(){
            //     alert('OKdfff');
            // });

            
            $('.category_product').click(function(){
                var id_category = $(this).closest('.panel-heading').find('input').val();
                
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    method: 'POST',
                    url: '{{url("/ajax/product_by_category")}}',
                    data:{
                        id_category : id_category,
                        "_token": '{{csrf_token()}}'
                    },
                    success:function(response){
                        // var_dump(response)

                        var html = '';
                        Object.values(response.product).map(function(key,value){
                            
                            var xx = JSON.parse(response['product'][value]['image']);
                            var id = response.product[value]['id'];
                            console.log(id);                       
                    
                            var img = "{{asset('upload/product/full/3')}}" + xx[0];
                            var id_prod =  "{{route('product_detail', '')}}" + '/' +id;
                            var sale = "{{asset('upload/icon/sale2.png')}}";
                            
                    html += "<div class='col-sm-4'>" + 
                                "<div class = 'product-image-wrapper'>" +
                                    "<div class='single-products'>" +
                                        "<div class='productinfo text-center'>" +
                                            "<img src = '" + img + "' alt='' />" + 
                                            "<h2>" + response.product[value]['price']  + "</h2>" +
                                            "<p><a href = '" + id + "'></a>" + response.product[value]['name'] + "</p>" +
                                            "<a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>" +

	            		
	                    
                                        "</div>" +
                                        "<div class='product-overlay'>" +
                                            "<div class='overlay-content'>" + 
                                                "<h2>" + response.product[value]['price'] + "</h2>" +
                                                "<p>" + response.product[value]['name'] + "</p>" +
                                                "<a  class='btn btn-default add-to-cart-2' id =" + response.product[value]['id'] + "><i class='fa fa-shopping-cart'></i>Add to cart</a>" +
                                            "</div>" +
                                        "</div>" +
                                        "<img src = '" + sale + "' alt = '' />" +
                                    "</div>" + 
                                    "<div class='choose'>"+
                                        "<ul class='nav nav-pills nav-justified'>" +
                                            "<li><a href='" + id_prod + "'><i class='fa fa-plus-square'></i>See details</a></li>" +
                                            "<li><a href=''><i class='fa fa-plus-square'></i>Add to compare</a></li>" +
                                        "</ul>"+
                                    "</div>"+
                        "</div>" + 
	                "</div>";
                        
                        

                        
                            
                        

                    
                    
                        });
                        $('.features_items').html(html);

                        $('.fa fa-plus-square').click(function(){
                            alert('HIHIHI');
                        });
                    }
                })
            })
            
    });
    
    // $(document).on('click', '.add-to-cart', function(event){
    //     alert('hihi');
    // });


    $(document).on("click", '.add-to-cart-2', function(event) { 
                // alert("new link clicked!");

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
						// console.log(response)
                        Swal.fire({
                            title: "Đã cập nhật giỏ hàng",
                            time: 1500,
                            icon: 'success'
                        })
						$('.cart_qty').text("Cart "+ "(" + response.toString() + ")");
						
					}
				});
            });
    </script>
</div>