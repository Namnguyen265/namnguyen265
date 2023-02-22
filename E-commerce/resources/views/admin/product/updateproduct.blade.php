@extends('admin.layouts.app')
@section('content')




    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Chi tiết về cây</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết về cây</li>
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
                                <h4><i class="icon fa fa-check"></i>Cập nhật thành công</h4>
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
                    @foreach($product as $item)
                    <?php 
                        $getArrImage = json_decode($item['image'], true);
                    ?>
                    <form class="form-horizontal m-t-30" action = '' method='POST' enctype="multipart/form-data" >
                        
                        <div class="form-group">
                            <label>Tên cây <span class="help"></span></label>
                            <input type="text" class="form-control" value="{{$item->name}}" name = 'name'>
                        </div>

                        <div class="form-group">
                            <label>Giá tiền <span class="help"></span></label>
                            <input type="text" class="form-control" value="{{$item->price}}" name = 'price'>
                        </div>
                        
                        <div class="form-group">
                            <label>Loại cây <span class="help"></span></label>
                            <select class="form-control form-control-line" value = '' name = 'category'>
                                        
                                     
                                @foreach($category as $key =>$value)
    
    
                                <option value = '{{$value['id']}}'
                                <?=
                                $value['id'] == $item->id_category ? "selected" : ""
                                ?>
                             
                                
                                >{{$value['category']}}</option>
                                
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Nhà cung cấp <span class="help"></span></label>
                            <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'brand'>
                                        
                                     
                                @foreach($brand as $key =>$value)
    
    
                                <option value = '{{$value['id']}}'
                                <?=
                                $value['id'] == $item->id_brand ? "selected" : ""
                                ?>
                             
                                
                                >{{$value['brand']}}</option>
                                
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                            <label>Số lượng <span class="help"></span></label>
                            <input type="number" class="form-control" value="{{$item->quantity}}" name = 'quantity' min="0">
                            </div>
                                <div class="col-4">
                                    <label>Đã bán</label>
                                    <input type="number" class="form-control" value="{{$item->sold_quantity}}" name = '' min="0" disabled>

                                </div>
                                <div class="col-4">
                                    <label>Doanh thu (VNĐ)</label>
                                    <input type="number" class="form-control" value="{{$item->product_revenue}}" name = '' min="0" disabled>

                                </div>
                            </div>
                        </div>


                        <input id = 'sale_value' value = '{{$item->sale}}' hidden/>
                        <input id = 'new_product' value = 0 hidden />
                        <div class="form-group">
                            <label>Giảm giá <span class="help"></span></label>
                            <select id = 'khuyenmai' name = 'status' placeholder = '{{$item->status}}' value = '{{$item->status}}'>
                                @if ($item->status == 0)
                                <option value = '0' selected>Không</option>
                                <option value = '1'>Có</option>
                                <input class = 'sale_price' type = 'number' style='width: 80px; display:none' placeholder="Moi nhap giam gia" name = 'sale' value = '0'  /> <span class="sale_price" style="display:none">%</span>

                                @else
                                <option value='0'>Không</option>
                                <option value='1' selected>Có</option>
                                <input class = 'sale_price' type = 'number' style='width: 80px; display:block' placeholder="Moi nhap giam gia" name = 'sale' value="{{$item->sale}}"  /> 
                                <span class="sale_price" style="display:block" ></span>
                                @endif
                            </select>

                            {{-- <input type="text"   class="sale_price" placeholder="Gia sale" name="sale" style="display: none; width:80px; " value="" > <span  class="sale_price" style="display: none" >%</span> --}}

                        </div>

                        <p hidden>Company Profile</p>
                        <input type="text" name="company" value = "0" placeholder="Company" hidden/>
                        <p></p>

                        <div class="form-group">
                            <label>Hình ảnh về cây <span class="help"></span></label>

                        <input type = "file" name = "image[]" value = "" class = "form-control form-control-line" multiple/>
                        </div>


                        <div class="form-group">
                            <label for="image">Ảnh đã đăng, tick để chọn xoá <span class="help"></span></label>
                            <br>
                            @foreach($getArrImage as $key)
                            <div class = 'box' style = 'display: inline-block'>
                                <img src="{{asset('upload/product/small/'. $key)}}" alt="" id = '{{$key}}'>
                                <br>
                            {{-- <input type="file" id="image" name="image[]" class="form-control form-control-line" placeholder="" value = '' multiple> --}}
                            <input type="checkbox" class="" id="{{$key}}" value="{{$key}}" name = "checked[]"/>

                            </div>
                            @endforeach
                        </div>
                        
                            
                    
                        
                        
                            
                            
                    
                        <div class="form-group">
                            <label>Thông tin về cây</label>
                            <textarea class="form-control" rows="5" id = 'demo' name = 'detail' value = "">{{$item->detail}}</textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                
                                
                                <button class = 'btn btn-success'  type = 'submit'>Cập nhật</button>
                                
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
                            
                        {{-- @if(session('success'))
                            <div class = 'alert alert-success alert-dismissible'>
                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                                <h4><i class="icon fa fa-check"></i>Cập nhật thành công</h4>
                                {{session('success')}}
                            </div>

                        @endif --}}
                            
                    </form>
                    @endforeach
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


    {{-- <script>
        $(documeny).ready(function(){
            $('#khuyenmai12').click(function(){
                var value = $(this).val();
                alert(value);
            })
        })
    </script> --}}
@endsection


