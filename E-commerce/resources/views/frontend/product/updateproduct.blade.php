@extends('frontend.layouts.app')
@section('content')
<style>
    div {
      margin-bottom: 10px;
    }
    label {
      display: inline-block;
      width: 150px;
      text-align: right;
    }

    /* .checkbox {
        position: absolute; right: 50px;
    } */
    .box {
  display: inline-block;
  width: 100px;
  height: 100px;
  text-align: center;
  /* border: 1px solid blue;     */
  
}
  </style>
{{-- <section id="form"><!--form--> --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Account</h2>
                    
                    <li><a href="{{route('account')}}"><i class="fa fa-user"></i> Account</a></li>
                    <li><a href="{{route('product')}}"><i class="fa fa-star"></i> My product</a></li>
                </div><!--/login form-->
            </div>
            {{-- <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div> --}}
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Update Product!</h2>
                    @foreach($product as $item)
                    <?php
                        $getArrImage = json_decode($item['image'], true);
                        // var_dump( $getArrayImage);
                    ?>
                    <form action="#" method='post' enctype="multipart/form-data">
                        <p>Tên cây</p>
                        <input type="text" name="name" value = "{{$item->name}}" placeholder = "" autocomplete="off" >
                        <p></p>
                        <p>Giá tiền</p>
                        <input type="text" name="price" value ="{{$item->price}}" placeholder = 'Price' autocomplete="off"/>
                        <p></p>
                        <p>Loại cây</p>
                        
                        <select class="form-control form-control-line" value = '' name = 'category'>
                                        
                                     
                            @foreach($category as $key =>$value)


                            <option value = '{{$value['id']}}'
                            <?=
                                $value['id'] == $item->id_category ? "selected" : ""
                            ?>
                         
                            
                            >{{$value['category']}}</option>
                            
                            @endforeach
                            
                        </select>
                        <p></p>
                        <p>Nhà cung cấp</p>
                        <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'brand'>
                                        
                                     
                            @foreach($brand as $key =>$value)


                            <option value = '{{$value['id']}}'
                            <?=
                                $value['id'] == $item->id_brand ? "selected" : ""
                            ?>
                         
                            
                            >{{$value['brand']}}</option>
                            
                            @endforeach
                            
                        </select>
                        <p></p>
                        
                        <p>Sale</p>
                        <select id = 'khuyenmai' name = 'status' placeholder = '{{$item->status}}' value = '{{$item->status}}'>
                            
                            @if ($item->status == 0) 
                            <option value = '0' selected>New</option>
                            <option value = '1'>Sale</option>
                            <input class = 'sale_price' type = 'number' style='width: 80px' placeholder="Moi nhap giam gia" name = 'sale' value = '0' hidden /> <span class="sale_price" hidden>%</span>
                            @else
                            <option value = '0' >New</option> 
                            <option value = '1'selected>Sale</option>
                            <input class = 'sale_price' type = 'number' style='width: 80px' placeholder="Moi nhap giam gia" name = 'sale' value="{{$item->sale}}"  /> <span class="sale_price" >%</span>
                            @endif
                            
                            
                            
                            
                        </select>
                        
                        
                        <p></p>
                        <p hidden>Company Profile</p>
                        <input type="text" name="company" value = "{{$item->company}}" placeholder="Company" hidden/>
                        <p></p>
                        
                        
                        <p>Hình ảnh về cây</p>
                        <input type="file" name="image[]" value = "" class="form-control form-control-line" multiple />
                        
                        <p>Danh sách ảnh đã đăng, tick để xoá </p>
                        <div style = 'text-align: center'>
                            @foreach($getArrImage as $key)
                            <div class = 'box'>
                            <img src="{{asset('upload/product/small/'. $key)}}" alt="" id = '{{$key}}'>
                            <input type="checkbox" class="" id="{{$key}}" value="{{$key}}" name = "checked[]"/>
                            </div>
                            @endforeach
                        </div>
                        <p></p>
                        
                        
                        
                        <p>Thông tin về cây</p>
                        <textarea type = 'text' name='detail' value='{{$item->detail}}'>{{$item->detail}}</textarea>
                        <a href = ''><button type="submit" class="btn btn-default" >Update</button></a>

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
                        @csrf
                    </form>
                    @endforeach
                    <!-- <p></p> -->
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
{{-- </section><!--/form--> --}}

<script>
    $(document).ready(function(){
        // $('#khuyenmai').click(function(){ 
        //     var value = $(this).val();
        //     // console.log(value);

        //     if (value == 1)
        //     {
        //         $('.sale').attr('style', "display:block");
        //     }
        //     else
        //     {
        //         $('.sale').attr('style', "display:none");
        //     }
        // });


        $('#khuyenmai').click(function() {
			var value = $(this).val();
            console.log(value);
			if(value==1){
				//$('input.sale_price').show();
                $('input.sale_price').val('{{$item->sale}}');
				$('input.sale_price').show();
				$('span.sale_price').show();
				// $('input.sale_price').attr('style', "display: inline;")
				// $('span.sale_price').attr('style', "display:inline")
			}
			else{
				//$('sale_price').hide();
                $('input.sale_price').val(0);
				$('input.sale_price').hide();
				$('span.sale_price').hide();
				// $('input.sale_price').attr('style', "display:none");
				// $('span.sale_price').attr('style', "display:none")

			}

    });
       
    });

</script>
@endsection