@extends('admin.layouts.app')
@section('content')



<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Country</h4>
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
                        <th scope="col">Name Country</th>
                        <th scope='col'>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @if (!empty($country))
                        @foreach ($country as $value )
                    <tr>
                        
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        
                        <td>
                        <a href = "{{route('delete_country', ['id'=>$value->id])}}" class="" id=''><button class = 'btn btn-danger'><i>Delete</i></button></a>
                        
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan='6'>Khong co nguoi dung</td>
                    </tr>
                    @endif
                    <table>
                    
                        
                        
                        
                        <div class = 'pagination justify-content-center'>{!! $country->links() !!}</div>
                        
                    
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
        <a href="{{route('addcountry')}}"><button class = 'btn btn-success' name = '' type = 'submit'>Add</button></a>
    </td>
</div>
</div>
</div>


    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>


    
    

@endsection