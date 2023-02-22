@extends('frontend.layouts.app')
@section('content')

@foreach($product as $value)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            {{-- @if ($value->status == 1) <img src = "{{asset('upload/icon/sale2.png')}}" class="new" alt=""/> @endif --}}

            <?php
                $getArrImage = json_decode($value['image'], true);
                // var_dump($getArrayImage[0]);
            ?>
            <img id = "fullpic" src="{{asset('upload/product/middle/2'.  $getArrImage[0])}}" alt=""  />
            <a href="{{asset('upload/product/full/3' .$getArrImage[0])}}" rel="prettyPhoto" class = 'zoom' ><h3>ZOOM</h3></a>
            
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($getArrImage as $key => $item)
                      <a><img class = '{{$key}}' src="{{asset('upload/product/small/' .$getArrImage[$key])}}" alt=""></a>
                      {{-- <a href=""><img src="{{asset('upload/product/small/' .$getArrImage[1])}}" alt=""></a> --}}
                      {{-- <a href=""><img src="images/product-details/similar3.jpg" alt=""></a> --}}
                        @endforeach
                    </div>
                    
                    <div class="item" >
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    
                </div>
                <div class="item2" hidden >
                    @foreach($getArrImage as $num => $item2)
                  <a href="" hidden><img id = '{{$num}}' src="{{asset('upload/product/middle/2' .$getArrImage[$num])}}" alt=""></a>
                  
                    @endforeach
                </div>
              <!-- Controls -->
              {{-- <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a> --}}
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->name}}</h2>
            <p class = 'id_product' id = {{$value->id}}> ID: {{$value->id}}</p>
            <input id = 'id_product' value= {{$value->id}} hidden>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                @if ($value->status == 1)
                
                <h4>Giá niêm yết: <s>{{number_format($value->price)."VND"}}</s></h4>
                <div>
                <span style="color: red ; display:inline-block">Giá bán: {{number_format($value->price * (100 - $value->sale)/100)."VND"}}</span>
                <span style="color: white; display:inline-block; font-size:20px"  class="label label-danger">-{{$value->sale}}%</span>
                </div>
                @else
                <span style="color: black">Giá bán: {{number_format($value->price). "VND"}} </span>
                @endif
                <br>
                <label>Nhập số lượng:</label><input class = 'quantity_inputt' type="number"  min = '1' />

                <br>
                <br>
                <button type="button" class="btn btn-fefault add-to-cart" id="button_add">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ hàng
                </button>

                <br>
                <span class="rate" style="float: left" >
                    <h4 style="display:inline-block">Đánh giá trung bình: {{$rate}}/5</h4>
                    <div class="vote" style="display:inline-block">
                        @for ($i = 1 ; $i <= 5 ;$i++ )
                        <div class="star_{{$i}} ratings_stars {{$i <= $rate ? 'ratings_over' : ''}}"><input value="{{$i}}" type="hidden"></div>
                        @endfor
                        
                        {{-- <span class="rate-up">{{$rate}}</span> --}}
                    </div>
                    {{-- <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i> --}}
                    {{-- <span>{{$count_rate}}</span> --}}
                    
                </span>
            </span>
            <p><b>Lượt đánh giá:</b> {{$count_rate}}</p>

            <p class="stock" style="font-size: 15px"><b>Số lượng còn: </b> {{$value->quantity}}<span>| <b>Đã bán ra:</b> {{$value->sold_quantity}}</span></p>
            <input class="stock_qty" value = {{$value->quantity}} hidden>
            {{-- @if ($value->sale == 0)
            <p hidden><b>Khuyến mãi:</b> Không</p>
            @else
            <p hidden><b>Khuyến mãi:</b> {{$value->sale}}%</p>
            @endif --}}
            @foreach($category as $key => $item)
                @if ($value->id_category == $item->id)
            <p style="font-size: 15px"><b>Loại cây: </b>{{$item->category}}</p>
                @endif
            @endforeach
            @foreach($brand as $key => $item2)
                @if ($value->id_brand == $item2->id)
            <p style="font-size: 15px"><b>Nhà cung cấp: </b>{{$item2->brand}}</p>
                @endif
            @endforeach
            {{-- <p><b>Thông tin:</b>{!!$value->detail!!}</p> --}}
            {{-- <p><b>Nhà cung cấp:</b> {{$value->brand}}</p> --}}
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            
            
            <?php
            if (!session('cart'))
            {?>    <div class="alert" hidden>
                    <span class="closebtn">Ban chua chon san pham nao!!</span>
                </div>
            <?php }
                else{
                    // var_dump(session('cart'))
            foreach (session('cart') as $key => $item)
            {  
                
                if($item['id'] == $value->id)    
            ?>
                
                {{-- <p class="in_cart">{{$item['id']}}</p>     --}}
                {{-- <p>{{$value->id}}</p> --}}
            <?php }} ?>
            
            @if(!session('cart'))
            <div class='alert' hidden>
                <span class="closebtn">Ban chua chon san pham nay</span>
                <input class="in_cart" value="0" hidden>
            </div>
            @else
            {{-- @foreach(session('cart') as $key => $val)
            @if($val['id'] == $value->id) --}}
            {{-- <input class="in_cart" value = {{$val['qty']}} >
            @else
            <input class="in_cart" value = 0 > --}}
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
             {{-- @endforeach --}}
            @endif 
            <p></p>
            @if(session('success'))
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
                <h4><i class = 'icon fa fa-check'></i>Thông báo</h4>
                {{session('success')}}
            </div>
        @endif
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
@endforeach
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Mô tả</a></li>
            {{-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> --}}
            {{-- <li><a href="#tag" data-toggle="tab">Tag</a></li> --}}
            <li class="active"><a href="#reviews" data-toggle="tab">Bình luận (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details" >
            {{-- <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            {!!$value->detail!!}
        </div>
        
        <div class="tab-pane fade" id="companyprofile" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="tag" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                {{-- <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul> --}}
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> --}}
                {{-- <p><b>Write Your Review</b></p> --}}
                
                {{-- <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form> --}}

                <ul class="media-list">
                    {{-- <li class="media">
                        
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/blog/man-two.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li> --}}
                    {{-- <li class="media second-media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/blog/man-three.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li> --}}
                    {{-- <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/blog/man-four.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li> --}}
                    
                    <div class="response-area">
                        {{-- <h2> RESPONSES</h2> --}}
                        @foreach($comment as $item)
                         @if ($item->level == 0)
                        <ul class="media-list">
                            <li class="media">
                                
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{ asset('upload/user/avatar/'. $item->avatar) }}" alt="" width = "100" height = "80">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>{{$item->name}}</li>
                                        <li><i class="fa fa-clock-o"></i>1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i>DEC 5, 2013 </li>
                                    </ul>
                                    <p>{{$item->comment}}</p>
                    
                                    @foreach($comment as $key)
                                     @if ($key->level == $item->id )
                                    <ul class="sinlge-post-meta" style = "padding-left : 50px">
                                        <li><i class="fa fa-user"></i>{{$key->name}} {{$key->id}}</li>
                                        <li><i class="fa fa-clock-o"></i>1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i>DEC 5, 2013 </li>
                                    </ul>
                                    <p style = "padding-left : 50px">{{$key->comment}}</p>
                                     @endif
                                    @endforeach
                                    
                                    {{-- <a class="btn btn-primary reply" id = {{$item->id}}><i class="fa fa-reply"></i>Reply</a> --}}
                                    <div class="text-area" style="display: none" id = "{{$item->id}}">
                                        <div class="blank-arrow">
                                            <label>Your Reply</label>
                                        </div>
                                        <span>*</span>
                                        <textarea name="message" rows="11" id = 'postreply'></textarea>
                                        <a class="btn btn-primary postreply" id = "{{$item->id}}" >post reply</a>
                    
                                        
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                            
                            <div class="text-center">
                                {!! $comment->links()!!}
                            </div>
                        </ul>					
                    </div>
                </ul>
                @if (Auth::check())
                <input type = 'hidden' class="iduser" value = "{{Auth::user()->id}}">
                <input type = 'hidden' class="nameuser" value = "{{Auth::user()->name}}">
                <input type = 'hidden' class="avataruser" value = "{{Auth::user()->avatar}}">
                @endif
                <div class="replay-box">
                    <div class="row">
                        
                        <div class="col-sm-8">
                            <div class="text-area">
                                <div class="blank-arrow">
                                    <label>Để lại bình luận</label>
                                </div>
                                <span>*</span>
                                <textarea name="message" rows="11" id = 'commentproduct'></textarea>
                                <a class="btn btn-primary postcomment" >Gửi bình luận</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->


<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm cùng loại</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                @foreach ($same_cate_product as $key => $value)
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
                                
                                <p>{{$value->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    @if ($value->status == 0)
                                    <h2>{{number_format($value->price) .'VNĐ'}}</h2>
                                    @elseif ($value->status == 1)
                                    <h3><s>{{number_format($value->price) .'VNĐ'}}</s></h3>
                                    <h2>{{number_format($value->price * (100 - $value->sale)/100)}}</h2>
    
                                    @endif
                                    <p><a href="{{route('product_detail', $value->id)}}"></a>{{$value->name}}</p>
                                    <a  class="btn btn-default add-to-cart" id = "{{$value->id}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    <input class = 'product_qty' value = '{{$value->quantity}}' hidden/>


                                    @if(!session('cart'))
                            <div class='alert'>
                                <span class="closebtn" hidden>Ban chua chon san pham nay</span>
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
                            @if ($value->status == 1) <img src="{{asset('upload/icon/sale2.png')}}" class="new" alt="" /> @endif

                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{route('product_detail',$value->id)}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                                {{-- <li><a href="" ><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="item">	
                @foreach($same_cate_product_2 as $key => $value)
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
                                
                                <p>{{$value->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    @if ($value->status == 0)
                                    <h2>{{number_format($value->price) .'VNĐ'}}</h2>
                                    @elseif ($value->status == 1)
                                    <h3><s>{{number_format($value->price) .'VNĐ'}}</s></h3>
                                    <h2>{{number_format($value->price * (100 - $value->sale)/100)}}</h2>
    
                                    @endif
                                    <p><a href="{{route('product_detail', $value->id)}}"></a>{{$value->name}}</p>
                                    <a  class="btn btn-default add-to-cart" id = "{{$value->id}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    <input class = 'product_qty' value = '{{$value->quantity}}' hidden/>
                                    
                                    @if(!session('cart'))
                            <div class='alert'>
                                <span class="closebtn" hidden>Ban chua chon san pham nay</span>
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
                            @if ($value->status == 1) <img src="{{asset('upload/icon/sale2.png')}}" class="new" alt="" /> @endif
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{route('product_detail',$value->id)}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                                {{-- <li><a href="" ><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->


<style>
    .label {
    padding: 5px 12px;
    /* line-height: 13px; */
    color: #fff;
    font-weight: 400;
    font-size: 75%;
}

.label-danger {
    background-color: #fa5838;
}
</style>


<script>
    $(document).ready(function(){
        $('img').click(function(){
            var getclass = $(this).attr('class');
            // console.log(img);

            // $('#fullpic').attr('src', img);
            var getsrc = $('img#' + getclass).attr('src');
            // console.log(getsrc);

            $("#fullpic").attr('src', getsrc);
            
        });

        $('.zoom').click(function(){
            var src = $(this).closest('.view-product').find("#fullpic").attr('src');
            var src1 = $("#fullpic").attr('src');
            // console.log(src);

            $('.zoom').attr('href', src);
        });
        
        $('#button_add').click(function(){
            var id = $('.id_product').attr('id');
            // alert(id);
            var qty = $(this).closest('span').find('.quantity_inputt').val();
            console.log(qty);
            var qty_stock = $('.stock_qty').val();  //hang ton kho
            console.log(qty_stock)
            var qty_cart = $('.in_cart').val();   //so luong trong cart
            console.log(qty_cart);

            var qty_able = qty_stock - qty_cart;  //so luong co the them
            console.log(qty_able);
            // alert('Đã cập nhật giỏ hàng');

            if (qty_stock > 0){
            if (qty)
            {
                // if (qty_stock == 0)
                // {
                //     alert('sản phẩm đã hết hàng');
                // }
                // if (qty_stock > 0){}
            if (qty <= qty_able){
            // alert("Đã cập nhật giỏ hàng")
            // swal({
            //     title: 'Are you sure'
            // })
            var _token = $('input[name="_token"]').val();
				$.ajax({
					method: 'POST',
					url: '{{url("/cart/ajax")}}',
					data:{
						id : id,
						up : 4,
                        qty : qty,
                        "_token": '{{csrf_token()}}'
						// count : count 
					},
					success: function(response){
						// console.log(response)
                        Swal.fire({
                            title: 'Đã cập nhật giỏ hàng',
                            timer: 1500,
                            icon :'success'
                    }).then(function(){
                        location.reload();
                    })
                        // location.reload();
						$('.cart_qty').text("Cart "+ "(" + response.toString() + ")");
						// return redirect()->back();
					}
				});
            }
            else
            {
                Swal.fire({
                    title: 'Bạn chỉ còn thêm được ' + '' + qty_able + " sản phẩm" +' vào giỏ hàng',
                    timer: 5000,
                    icon: 'warning'
                })
                
            }
            }
            else
            {
                // alert("Hãy nhập số lượng sản phẩm");
                Swal.fire({
                            title: 'Vui lòng nhập số lượng sản phẩm',
                            timer: 1500,
                            icon :'warning'
                    })
            }
             }
             else
             {
                // alert('Sản phẩm đã hết hàng')
                Swal.fire({
                    title: 'Sản phẩm đã hết hàng',
                    timer: 1500,
                    icon: 'error'
                })
             }
        });
        
        
        

        $('.ratings_stars').hover(
    
                    
                    // Handles the mouseover
                    function() {
                        $(this).prevAll().andSelf().addClass('ratings_hover');
                        // $(this).nextAll().removeClass('ratings_vote'); 
                    },
                    function() {
                        $(this).prevAll().andSelf().removeClass('ratings_hover');
                        // set_votes($(this).parent());
                    }
                );

                $('.ratings_stars').click(function(){
                    var Values =  $(this).find("input").val();
                    // console.log(Values);
                    var id_product = $('#id_product').val();
                    var xx = '{{Auth::check()}}';
                    if (xx == 1)
                    {
                        

                        if ($(this).hasClass('ratings_over')) {
                            $('.ratings_stars').removeClass('ratings_over');
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        } else {
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        }

                        // var iduser = $('input.iduser').val();
                        // console.log(iduser);
                        var _token = $('input[name="_token"]').val();
                        // console.log(_token);
                        $.ajax({
                            method: 'POST',
                            url : '{{url("/productdetail/ajax")}}',
                            data:{
                                rate: Values,
                                id_product : id_product,
                                "_token": '{{csrf_token()}}'

                            },
                            success:function(response){
                                // alert("Đã gửi đánh giá");
                                
                                Swal.fire({
                                    title: "Thành công",
                                    text: 'Đã gửi đánh giá',
                                    timer: 1500,
                                    icon :'success'
                                }).then(function(){
                                    location.reload();
                                })
                            },
                        })
                        
                    }
                    else
                    {
                        Swal.fire({
                            title: "Vui lòng đăng nhập để đánh giá !",
                            timer: 1500,
                            icon :'warning'
                        })
                        
                    }


                    
                   
                });


                $('.postcomment').click(function(){
                    // var comment = $(this).closest('.text-area').find('#cmt').val();
                    var comment = $('#commentproduct').val();
                    var id_product = $('#id_product').val();
                    console.log(id_product);
                    console.log(comment);
                    var xx = '{{Auth::check()}}';
                    if (xx == 1)
                    { 
                        
                        // var id_user = $('input.iduser').val();
                        // var name = $('input.nameuser').val();
                        // var avatar = $('input.avataruser').val();
                        var _token = $('input[name="_token"]').val();
                        // alert(avatar);
                        // alert('Da login');
                       
                        $.ajax({
                            method: "POST",
                            url : '{{url("/product/comment")}}',
                            data : {
                                comment : comment,
                                id_product : id_product,
                                type : 2,
                                "_token": '{{csrf_token()}}'
                            },
                            success: function(data){
                                Swal.fire({
                                    title: "Thành công",
                                    text: 'Đã gửi đánh giá',
                                    timer: 1500,
                                    icon :'success'
                                }).then(function(){
                                    location.reload();
                                })
                            },
                        })

                        

                        
                    }

                    else
                    {
                        Swal.fire({
                            title: "Vui lòng đăng nhập để bình luận",                                    
                            timer: 1500,
                            icon :'warning'
                        })
                        
                    }
                });
    });
</script>
@endsection