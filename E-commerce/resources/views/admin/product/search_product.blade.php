@extends('admin.layouts.app')
@section('content')



<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Product</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                </nav>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action='{{route('search_admin_product')}}' method = "POST" enctype="multipart/form-data" autocomplete="off">
            <div class="search_box pull-right">
                <input type="text" name = 'keyword' placeholder="Search"/>
                {{-- <input type="submit" class="btn btn-primary btn-sm" name='update' value='Tìm kiếm' style='margin-top:0; color:#666'/> --}}
                <a><button type = 'submit' class='btn btn-warning btn-sm'>Search</button></a>

            </div>
            @csrf
            </form>
        </div>
    </div>
</div>
<div class = 'container-fluid'>
<div class = 'row'>
<div class="col-12">
    <div class="card">
        
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    @if(session('success'))
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
                                <h4><i class = 'icon fa fa-check'></i>Thông báo</h4>
                                {{session('success')}}
                            </div>
                        @endif
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Tên sản phẩm cây</th>
                        <th scope='col'>Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    @if (!empty($product))
                        @foreach ($product as $value )
                    <tr>
                        
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        
                        <td>
                        <a onclick="return confirm('Are you sure?')" href = "{{route('delete_product', ['id'=>$value->id])}}" class="" id=''><i class = 'fa fa-trash' style="font-size: 28px;color:red"></i></a>
                        <a href = "{{route('update_product', ['id'=>$value->id])}}" class="" id=''><i class = 'fa fa-pencil' style="font-size: 28px; color:green"></i></a>
                        
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan='6'>Khong co nguoi dung</td>
                    </tr>
                    @endif
                    <table>
                    
                        
                        
                        
                        <div class = 'pagination justify-content-center'></div>
                        
                    
                    </table>
                    
                </tbody>
                <tfoot>
                    
                    
                </tfoot>
                <tr>
                    
                    
                    
                    
                </tr>
            </table>
            <div class = 'pagination justify-content-center'>
                        
                    
            
            </div>
        </div>
    </div>
    <td>
        <a href="{{route('create_product')}}"><button class = 'btn btn-success' name = '' type = 'submit'>Add</button></a>
    </td>
</div>
</div>
</div>


    <footer class="footer text-center">
        {{-- All Rights Reserved by Nice admin. Designed and Developed by --}}
        {{-- <a href="https://wrappixel.com">WrapPixel</a>. --}}
    </footer>


    
    

@endsection