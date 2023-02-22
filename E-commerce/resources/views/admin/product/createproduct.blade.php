@extends('admin.layouts.app')
@section('content')




    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Thêm sản phẩm cây</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm cây</li>
                        </ol>
                    </nav>
                </div>

                <div>
                    
                    

                </div>
            </div>
            
        </div>
    </div>

    <div>
        @if ($errors->any())
                            <div class= 'alert alert-danger text-center'>
                                @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                            
                        @if(session('success'))
                            <div class = 'alert alert-success alert-dismissible'>
                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                                <h4><i class="icon fa fa-check"></i>Thêm sản phẩm thành công</h4>
                                {{session('success')}}
                            </div>

                        @endif
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
        <div class="row">
            
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title"></h4>
                    <h5 class="card-subtitle"> </h5>
                    
                    <form class="form-horizontal m-t-30" action = '' method='POST' enctype="multipart/form-data" >
                        
                        <div class="form-group">
                            <label>Tên cây <span class="help"></span><span style="color:red">(*)</span></label>
                            <input type="text" class="form-control" value="" name = 'name'>
                        </div>

                        <div class="form-group">
                            <label>Giá tiền <span class="help"></span><span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" value="" name = 'price'>
                        </div>
                        
                        <div class="form-group">
                            <label>Loại cây <span class="help"></span><span style="color: red">(*)</span></label>
                            <select class="form-control form-control-line" value = '' name = 'category'>
                                        
                                     
                                @foreach($category as $key =>$value)
    
    
                                <option value = '{{$value['id']}}'
                                
                             
                                
                                >{{$value['category']}}</option>
                                
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Nhà cung cấp <span class="help"></span><span style="color: red">(*)</span></label>
                            <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'brand'>
                                        
                                     
                                @foreach($brand as $key =>$value)
    
    
                                <option value = '{{$value['id']}}'
                                
                             
                                
                                >{{$value['brand']}}</option>
                                
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Số lượng <span class="help"></span><span style="color: red">(*)</span></label>
                            <input type="number" class="form-control" value="" name = 'quantity' min = '0'>
                        </div>

                        <div class="form-group">
                            <label>Giảm giá <span class="help"></span></label>
                            <select id = 'khuyenmai1' name = 'status'>
                                <option value = '0' >Không</option>
                                <option value = '1'>Có</option>
                                
                            </select>

                            <input type="text"   class="sale_price" placeholder="Gia sale" name="sale" style="display: none; width:80px; " value="" > <span  class="sale_price" style="display: none" >%</span>

                        </div>

                        <p hidden>Company Profile</p>
                        <input type="text" name="company" value = "0" placeholder="Company" hidden/>
                        <p></p>

                        <div class="form-group">
                            <label for="image">Hình ảnh cây <span class="help"></span><span style="color: red">(*)</span></label>
                            <input type="file" id="image" name="image[]" class="form-control form-control-line" placeholder="" value = '' multiple>
                        </div>
                        
                            
                    
                        
                        
                            
                            
                    
                        <div class="form-group">
                            <label>Thông tin về cây<span style="color: red">(*)</span></label>
                            <textarea class="form-control" rows="5" id = 'demo' name = 'detail'></textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                
                                
                                <button class = 'btn btn-success' name = 'insert' type = 'submit'>Thêm mới</button>
                                
                            </div>
                        </div>
                        
                        @csrf
                        
                        @if ($errors->any())
                            <div class= 'alert alert-danger text-center'>
                                @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                            
                        @if(session('success'))
                            <div class = 'alert alert-success alert-dismissible'>
                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                                <h4><i class="icon fa fa-check"></i>Thêm Blog thành công</h4>
                                {{session('success')}}
                            </div>

                        @endif
                            
                    </form>
                </div>
            </div>
        </div>
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
        {{-- All Rights Reserved by Nice admin. Designed and Developed by --}}
        {{-- <a href="https://wrappixel.com">WrapPixel</a>. --}}
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->


    
@endsection


