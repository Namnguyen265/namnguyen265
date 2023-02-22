@extends('admin.layouts.app')
@section('content')





<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Add Brand</h4>
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

</div>


<div class="container-fluid">
<div class = 'row'>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Brand</h4>
            <h6 class="card-subtitle"></h6>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    
                    <form class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">
                        @if(session('success'))
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
                                <h4><i class = 'icon fa fa-check'></i>Thông báo</h4>
                                {{session('success')}}
                            </div>
                        @endif


                        @if ($errors->any())
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach 
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-12">Brand Name</label>
                            <div class="col-md-12">
                                <input type="text" name='brand' class="form-control form-control-line" value = "" >
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                
                                
                                <a href=""><button class = 'btn btn-success' name = 'insert' type = 'submit'>Add</button></a>
                                
                            </div>
                        </div>
                            
                        @csrf
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>


    </div>
    

@endsection