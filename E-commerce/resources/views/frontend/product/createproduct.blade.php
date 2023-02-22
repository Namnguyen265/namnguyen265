@extends('frontend.layouts.app')
@section('content')

<section id="form"><!--form-->
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
                    <h2>Create Product!</h2>
                    <form action="#" method='post' enctype="multipart/form-data">
                        <p>Tên cây</p>
                        <input type="text" name="name" value = "" placeholder = "Name" >
                        <p></p>
                        <p>Giá tiền</p>
                        <input type="text" name="price" value ="" placeholder = 'Price'/>
                        <p></p>
                        <p>Loại cây</p>
                        
                        <select class="form-control form-control-line" value = '' name = 'category'>
                                        
                                     
                            @foreach($category as $key =>$value)


                            <option value = '{{$value['id']}}'
                            
                         
                            
                            >{{$value['category']}}</option>
                            
                            @endforeach
                            
                        </select>
                        <p></p>
                        <p>Nhà cung cấp</p>
                        <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'brand'>
                                        
                                     
                            @foreach($brand as $key =>$value)


                            <option value = '{{$value['id']}}'
                            
                         
                            
                            >{{$value['brand']}}</option>
                            
                            @endforeach
                            
                        </select>
                        <p></p>
                        
                        <p>Sale</p>
                        <select id = 'khuyenmai' name = 'status'>
                            <option value = '0' >New</option>
                            <option value = '1'>Sale</option>
                            
                        </select>
                        {{-- <input id = 'sale' type = 'text' style='width: 80px ;display: none ' placeholder="Moi nhap giam gia" name = 'sale' />
                        <p></p> --}}

                        <input type="text"   class="sale_price" placeholder="Gia sale" name="sale" style="width:80px; " value="" hidden> <span  class="sale_price" hidden >%</span>
                        
                        <p hidden>Company Profile</p>
                        <input type="text" name="company" value = "0" placeholder="Company" hidden/>
                        <p></p>
                        
                        
                        <p>Hình ảnh về cây</p>
                        <input type="file" name="image[]" value = "" class="form-control form-control-line" multiple />
                        <p></p>
                        
                        
                        
                        <p>Thông tin về cây</p>
                        <textarea type = 'text' name='detail' value=''></textarea>
                        <a href = ''><button type="submit" class="btn btn-default" name='update'>Update</button></a>

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
                    <!-- <p></p> -->
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

<script>
    $(document).ready(function(){
        // $('#khuyenmai').click(function(){ 
        //     var value = $('#khuyenmai').val();
        //     console.log(value);

        //     if (value == 1)
        //     {
        //         $('.sale_price').attr('style', "display:block");
        //     }
        //     else
        //     {
        //         $('.sale_price').attr('style', "display:none");
        //     }
        // });
       

        $('#khuyenmai').click(function() {
			var value = $(this).val();
            console.log(value);
			if(value==1){
				//$('input.sale_price').show();
				$('input.sale_price').show();
				$('span.sale_price').show();
				// $('input.sale_price').attr('style', "display: inline;")
				// $('span.sale_price').attr('style', "display:inline")
			}
			else{
				//$('sale_price').hide();
				$('input.sale_price').hide();
				$('span.sale_price').hide();
				// $('input.sale_price').attr('style', "display:none");
				// $('span.sale_price').attr('style', "display:none")

			}

    });
    });
</script>
@endsection