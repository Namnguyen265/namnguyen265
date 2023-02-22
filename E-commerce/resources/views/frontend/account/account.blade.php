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
@if (Auth::check())
{
{{-- <section id="form"><!--form--> --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1" hidden>
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
                    <h2>Thông tin người dùng</h2>
                    <form action="#" method='post' enctype="multipart/form-data" autocomplete="off">
                        <p>Họ và tên</p>
                        <input type="text" name="name" value = "{{Auth::user()->name}}" >
                        <p></p>
                        <p>Email</p>
                        <input type="email" name="email" value ="{{Auth::user()->email}}" autocomplete="nope" disabled/>
                        <p></p>
                        <p>Mật khẩu</p>
                        <input type="password" name="password" value = "" autocomplete="off"/>
                        <p></p>
                        <p>Số điện thoại</p>
                        <input type="text" name="phone" value = "{{Auth::user()->phone}}" autocomplete="off"/>
                        <p></p>
                        <p>Địa chỉ</p>
                        <input type="text" name="address" value = "{{Auth::user()->address}}" autocomplete="off"/>
                        <p></p>
                        {{-- <p>Thành phố</p>
                        <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'id_country'>
                                        
                                     
                            @foreach($country as $key =>$value)


                            <option value = '{{$value['id']}}'
                            <?= 
                                $value['id'] == Auth::user()->id_country ? "selected" : ""
                            ?>
                         
                            
                            >{{$value['name']}}</option>
                            
                            @endforeach
                            
                        </select> --}}
                        <p>Ảnh đại diện</p>
                        <input type="file" name="avatar" value = ""/>
                        <p></p>
                        
                        
                        <a href = ''><button type="submit" class="btn btn-default" name='update'>Cập nhật</button></a>

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
                                    <div class = " alert-success alert-dismissible">
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
{{-- </section><!--/form--> --}}
}
@else
{
    
        <div class=" col-sm-offset-1">
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Bạn hãy đăng nhập để xem thông tin tài khoản 
    </div>
    </div>
    
}
@endif

@endsection



