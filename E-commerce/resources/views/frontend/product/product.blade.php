@extends('frontend.layouts.app')
@section('content')

{{-- <section id="form"><!--form--> --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Account</h2>
                    
                    <li><a href="{{route('account')}}"><i class="fa fa-user"></i> Account</a></li>
                    <li><a href="{{route('product')}}"><i class="fa fa-star"></i> My product</a></li>
                </div><!--/login form-->
            </div>
            {{-- <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div> --}}
            <div class = "col-sm-4">
            <section id="cart_items">
                <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info col-sm-10">
                        <table class="table table-condensed" >
                            <thead>
                                <tr class="cart_menu">
                                    <td class="">ID</td>
                                    <td class="description">Name Product</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Image</td>
                                    <td class="total">Action</td>
                                    
                                    <td></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                    @foreach($product as $item)                
                                    <?php
                                        $getArrImage = json_decode($item['image'], true);
                                        // var_dump( $getArrayImage);
                                    ?>
                                    <tr>
                                                            
                                        <td class="cart_product">
                                                        <h4>{{$item->id}}</h4>
                                                    </td>
                                                    <td class="cart_description">
                                                        <h4>{{$item->name}}</h4>
                                                    
                                                    </td>
                                                    <td class="cart_price">
                                                        <p>{{$item->price}}</p>
                                                    </td>
                                                    <td class="cart_quantity">
                                                        <div class="cart_quantity_button">
                                                            
                                                            <img src = '{{asset('upload/product/small/'. $getArrImage[0])}}' />
                                                            {{-- <p>{{$getArrImage}}</p> --}}
                                                            
                                                        
                                                        </div>
                                                    </td>
                                                    <td class="cart_total">
                                                        <a href = "{{route('updateform', ['id'=>$item->id])}}"><i class="fa fa-pencil"></i></td>
                                                    </td>
                                                    <td class="cart_delete">
                                                        <a href = "{{route('delete_product', ['id'=>$item->id])}}"><i class="fa fa-times"></i></a>
                                                    </td>
                                    </tr>
                                    
                                    @endforeach
                                 <?php  ?> 
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <a href = "{{route('createproduct')}}" ><button id = "button">Add New</button></a>
                                    </td>
                                </tr>
                            </tfoot>
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
                        </table>
                    </div>
                </div>
            </section> <!--/#cart_items-->
        </div>
        </div>
    </div>
{{-- </section><!--/form--> --}}


@endsection