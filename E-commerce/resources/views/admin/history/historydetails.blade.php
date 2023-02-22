@extends('admin.layouts.app')
@section('content')





<div class = 'page-breadcrumb'>
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Chi tiết đơn hàng</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="header">
                                @if(session('success'))
                                    <div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
                                        <h4><i class = 'icon fa fa-check'></i>Thông báo</h4>
                                        {{session('success')}}
                                    </div>
                                @endif

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
                                @foreach($customer as $value)
                                <h5 class="text-info" style="margin-bottom:20px;"> <i class="fa fa-signal"></i>
                                    Trạng
                                    thái đơn hàng:
                                    @if ($value->order_status == 0)
                                    <span class="badge badge-warning">Đang chờ xử lí</span></h5>
                                    @elseif ($value->order_status == 1)
                                    <span class="badge badge-primary">Đang vận chuyển</span></h5>
                                    @elseif ($value->order_status == 2)
                                    <span class="badge badge-success">Đã giao hàng</span></h5>
                                    @elseif ($value->order_status == 3)
                                    <span class="badge badge-danger">Đã huỷ</span></h5>
                                    @endif
                                    @endforeach
                                <div class="col-6 mb-4">
                                    <div class="form-action form-inline">
                                        <form class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">
                                        @foreach($customer as $value)
                                            @if ($value->order_status != 2)
                                        
                                        <select class="form-control mr-1" id="" name="order_status">
                                            @foreach($customer as $value)
                                                @if($value->order_status == 0)
                                                <option value = '3'>Huỷ đơn hàng</option>

                                                <option value = '0' selected>Đang chờ xử lí</option>
                                                <option value = '1'>Đang vận chuyển</option>
                                                <option value = '2'>Đã giao hàng</option>
                                        
                                                @elseif ($value->order_status == 1)
                                                {{-- <option value = '3'>Huỷ đơn hàng</option> --}}

                                                {{-- <option value="0" >Đang chờ xử lí</option> --}}
                                                <option value = '1' selected>Đang vận chuyển</option>
                                                <option value = '2'>Đã giao hàng</option>

                                                @elseif ($value->order_status == 3)
                                                <option value = '3' selected>Huỷ đơn hàng</option>

                                                <option value="0" >Đang chờ xử lí</option>
                                                <option value = '1'>Đang vận chuyển</option>
                                                <option value = '2'>Đã giao hàng</option>
                                                @else
                                                <option value="0" >Đang chờ xử lí</option>
                                                <option value = '1'>Đang vận chuyển</option>
                                                <option value = '2' selected>Đã giao hàng</option>
                                                @endif
                                                @endforeach
                                                
                                                
                                                
                                        </select>
                                            @else
                                                <select>
                                                    {{-- <option value="0" >Đang chờ xử lí</option>
                                                <option value = '1'>Đang vận chuyển</option> --}}
                                                <option value = '2' disabled  selected>Đã giao hàng</option>
                                                </select>
                                            @endif
                                        @endforeach
                                        @php $sum = 0 ; $total = 0 @endphp
                                        @foreach ($detail as $v => $k )
                                        @php 
                                            $sum += $k->product_sold_quantity;
                                            $total += $k->product_price * $k->product_sold_quantity;
                                        @endphp
                                        @endforeach
                                        <input name = 'total_quantity' class = 'total_product_detail' value = {{$sum}} hidden>
                                        <input name = 'revenue' value = {{$total}} hidden>
                                        @foreach($customer as $value)
                                            @if($value->order_status != 2 )
                                        <input type="submit" name="btn-search" value="Cập nhật" class="btn btn-primary">
                                            @endif
                                            @endforeach

                                        
                                    @csrf
                                </form>
                                    </div>
                                </div>


                                <form class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="header">
                                <h5 class="text-info" style="margin-bottom:20px;"> <i
                                        class="fa fa-info-circle"></i>
                                    Thông tin sản phẩm</h5>
                            </div>
                            <table class="table table-striped table-checkall">
                                <thead>
                                    <th scope="col">#ID</th>
                                    <th scope="col">ID đơn hàng</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col"> Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </thead>
                                <tbody>
                                            @if (!empty($detail))
                    
                                            @foreach($detail as $value)
                                            <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->id_history}}</td>
                                            <td>{{$value->name_product}}</td>
                                            @foreach($product as $item)
                                            @if($item->id == $value->id_product)
                                            <?php 
                                            $getArrImage = json_decode($item->image, true);
                                            // var_dump($getArrImage);  
                                            ?>
                                            {{-- <td>9,200,000đ</td>
                                            <td>3</td>
                                            <td>27,600,000đ</td> --}}
                                            <td>
                                                <a href = ""><img src="{{asset('upload/product/small/'. $getArrImage[0])}}" alt=""></a>
                                            </td>

                                            @endif
                                            @endforeach
                                            <td>{{$value->product_price}}</td>
                                            <td>{{$value->product_sold_quantity}}</td>
                                            <td>{{$value->product_price * $value->product_sold_quantity}}</td>
                                            </tr>
                                            
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan='6'>Khong co nguoi dung</td>

                                    </tr>
                                    @endif
                                        {{-- <td></td> --}}
                                        {{-- <tr>
                                            <td colspan="4"></td>
                                            <td style="font-weight:bold">Phí vận chuyển</td>
                                            <td style="font-weight:bold">0 VNĐ</td>
                                            <td style="font-weight:bold">Miễn phí</td>
                                        </tr> --}}
                                        <tr>
                                        <td colspan="4"></td>
                                        <td style="font-weight:bold">Tổng</td>
                                        @php $sum = 0 @endphp
                                        @foreach ($detail as $value)
                                        
                                         @php $sum += $value->product_sold_quantity @endphp
                                        @endforeach
                                        <td style="font-weight:bold">{{$sum}}</td>
                                        @foreach($customer as $value)
                                        <td style="font-weight:bold">{{$value->price}}</td>
                                        @endforeach
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
                <div class="col-3">
                    <div class="header">
                        <h5 class="text-info" style="margin-bottom:20px;"> <i class="fa fa-question-circle"></i>
                            Khách
                            hàng</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if (!empty($customer))
                            @foreach($customer as $value)
                            <h6 class="card-title">Họ và tên</h6>
                            <p class="card-text"><b>{{$value->name}}</b></p>
                            <h6 class="card-title">Số điện thoại</h6>
                            <p class="card-text"><b>{{$value->phone}}</b></p>
                            <h6 class="card-title">Email</h6>
                            <p class="card-text"><b>{{$value->email}}</b></p>
                            <h6 class="card-title">Địa chỉ nhận hàng</h6>
                            <p class="card-text"><b>{{$value->delivery_address}}</b></p>
                            <h6 class="card-title">Ngày đặt hàng</h6>
                            <p class="card-text"><b>{{($value->created_at)->format('d-m-Y, H:i:s')}}</b></p>
                            <h6 class="card-title">Chú thích</h6>
                            <p class="card-text"></p>
                            @endforeach
                            @else
                            <tr>
                                <td colspan='6'>Khong co nguoi dung</td>
                            </tr>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>          
        
    </div>
    <td>
        {{-- <a href="{{route('addblog')}}"><button class = 'btn btn-success' name = '' type = 'submit'>Add Blog</button></a> --}}
    </td>
</div>
</div>
</div>

    <footer class="footer text-center">
        {{-- All Rights Reserved by Nice admin. Designed and Developed by --}}
        {{-- <a href="https://wrappixel.com">WrapPixel</a>. --}}
    </footer>


</div>
    

@endsection