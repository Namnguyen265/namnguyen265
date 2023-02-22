@extends('admin.layouts.app')
@section('content')




    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Chỉnh sửa blog hỗ trợ chăm sóc cây cảnh</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa blog hỗ trợ chăm sóc cây cảnh</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title"></h4>
                    <h5 class="card-subtitle"> </h5>
                    @foreach($blog as $value)
                    <form class="form-horizontal m-t-30" action = '' method='POST' enctype="multipart/form-data" >
                        
                        <div class="form-group">
                            <label>Tiêu đề <span class="help"></span></label>
                            <input type="text" class="form-control" value="{{$value->title}}" name = 'title'>
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh minh hoạ <span class="help"></span></label>
                            <input type="file" id="image" name="image" class="form-control" placeholder="" value = '{{$value->image}}'>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea type="text" class="form-control" value="{{$value->description}}" name = 'description'>{{$value->description}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Thẻ tag</label><br>
                            <input type="text" class="form-control" data-role = "tagsinput" name="blog_tags" value="{{$value->blog_tags}}">
                        </div>    
                            
                    
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="5" id = 'demo' name = 'content' value="{{$value->content}}">{{$value->content}}</textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                
                                
                                <button class = 'btn btn-success' name = '' type = 'submit'>Cập nhật</button>
                                
                            </div>
                        </div>
                        
                        @csrf
                        @if ($errors->any())
                            <div class= 'alert alert-danger text-center'>
                                @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                                @endforeach
                        @endif
                        
                            
                            
                        @if(session('success'))
                            <div class = 'alert alert-success alert-dismissible'>
                                <button type = 'button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                                <h4><i class="icon fa fa-check"></i>Cập nhật Blog thành công</h4>
                                {{session('success')}}
                            </div>

                        @endif
                            
                            
                            
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

@endsection