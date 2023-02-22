
@extends('admin.layouts.app')
@section('content')





    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Thông tin quản trị viên</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Trang chủ</a>
                                
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thông tin quản trị viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        
                        <center class="m-t-30"> 
                            <img src='{{ asset('upload/user/avatar/'. Auth::user()->avatar) }}' class='rounded-cirle' width='150'/>
                            {{-- <img src='upload/user/avatar/{{Auth::user()->avatar}}' class="rounded-circle" width="150" /> --}}
                            {{-- <h6>{{Auth::user()->avatar}}</h6> <small class="text-muted p-t-30 db">Phone</small> --}}

                            <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                            <h6 class="card-subtitle">Người quản lý</h6>
                            <div class="row text-center justify-content-md-center">
                                
                                
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email  </small>
                        <h6>{{Auth::user()->email}}</h6> <small class="text-muted p-t-30 db">Số điện thoại</small>
                        <h6>{{Auth::user()->phone}}</h6> <small class="text-muted p-t-30 db">Địa chỉ</small>
                        <h6>{{Auth::user()->address}}</h6>
                        
                        {{-- <div class="map-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small> --}}
                        <br/>
                        
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        
                        <form class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">

                            
                            <div class="form-group">
                                <label class="col-md-12">Họ và tên</label>
                                <div class="col-md-12">
                                    <input type="text" name='name' class="form-control form-control-line" value = "{{Auth::user()->name}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" disabled    name = 'email' class="form-control form-control-line" name="example-email" id="example-email" value = "{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Mật khẩu</label>
                                <div class="col-md-12">
                                    <input type="password" name = 'password'  placeholder="" class="form-control form-control-line" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số điện thoại</label>
                                <div class="col-md-12">
                                    <input type="text" name = 'phone' value='{{Auth::user()->phone}}' class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa chỉ</label>
                                <div class="col-md-12">
                                    <input type="text" name='address' class="form-control form-control-line" value = "{{Auth::user()->address}}" >
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                    
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-sm-12" >Select Country</label>
                                <div class="col-sm-12">
                                    
                                    <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'id_country'>
                                        
                                     
                                        @foreach($country as $key =>$value)


                                        <option value = '{{$value['id']}}'
                                        <?= 
                                            $value['id'] == Auth::user()->id_country ? "selected" : ""
                                        ?>
                                     
                                        
                                        >{{$value['name']}}</option>
                                        
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Ảnh đại diện</label>
                                <div class="col-md-12">
                                    
                                    <input type="file" name='avatar' class="form-control form-control-line" value = "{{Auth::user()->avatar}}" >
                                    

                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    
                                    
                                    <a href=""><button class = 'btn btn-success' name = 'update' type = 'submit'>Cập nhật</button></a>
                                    
                                </div>
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


                                @if(session('success'))
                                    <div class = "alert alert-success alert-dismissible">
                                        <button type='button' class='close' data-dismiss = 'alert' aria-hidden='true'></button>
                                        <h4><i class='icon fa fa-check'>Thong bao</i></h4>
                                        {{session('success')}}

                                    </div>
                                @endif
                            @csrf
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        {{-- All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>. --}}
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->



    @endsection