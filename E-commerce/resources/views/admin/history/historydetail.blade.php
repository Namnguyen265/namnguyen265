@extends('admin.layouts.app')
@section('content')





<div class = 'page-breadcrumb'>
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Chi tiết lịch sử đơn hàng</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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

            @if(session('success'))
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
                    <h4><i class = 'icon fa fa-check'></i>Thông báo</h4>
                    {{session('success')}}
                </div>
            @endif
            <table class = 'table'>
                <thead>
                    <tr>
                        <th class='col-sm-2'>Tên người dùng</th>
                        <th class='col-sm-1'>Email</th>
                        <th scope='col'>Địa chỉ nhận hàng</th>
                        <th scope='col'>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($customer))
                    @foreach($customer as $value)
                        
                    <tr>
                        
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->delivery_address}}</td>
                        <td>{{$value->phone}}</td>
                    </tr>
                        
                    @endforeach
                    @else
                    <tr>
                        <td colspan='6'>Khong co nguoi dung</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">ID đơn hàng</th>
                        <th scope="col">Tên sản phẩm cây</th>
                        <th scope='col'>Hình ảnh</th>
                        <th scope='col'>Giá</th>
                        <th scope='col'>Số lượng</th>
                        <th scope='col'>Tổng</th>
                        {{-- <th scope='col'>Hành động</th> --}}

                    </tr>
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
                        {{-- @foreach($getArrImage as $key => $end) --}}
                        <td>
                            <a href = ""><img src="{{asset('upload/product/small/'. $getArrImage[0])}}" alt=""></a>
                        </td>
                        {{-- @endforeach --}}
                        @endif
                        @endforeach
                        <td>{{$value->product_price}}</td>
                        <td>{{$value->product_sold_quantity}}</td>
                        <td>{{$value->product_price * $value->product_sold_quantity}}</td>
                        {{-- <td>{{$value->}}</td> --}}

                        {{-- <td>{!!$value->content!!}</td> --}}
                       
                        
                        {{-- <td> --}}
                        {{-- <a href = "" class="dele" id=''><button class = 'btn btn-danger'><i>Delete</i></button></a> --}}
                        {{-- <a href = '{{route('detail_order', $value->id)}}' class= '' id= ''><button class = "btn btn-success"><i>Edit</i></button> --}}
                        {{-- </td> --}}
                            
                        
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan='6'>Khong co nguoi dung</td>
                    </tr>
                    @endif
                    {{-- <table>
                    
                        
                        
                        
                        <div class = 'pagination justify-content-center'>{!! $detail->links() !!}</div>
                        
                    
                    </table> --}}
                   
                </tbody>
                <tfoot>
                    
                    
                </tfoot>
                <tr>
                    
                    
                    
                    
                </tr>
            </table>
            <div class = 'pagination justify-content-center'>
                        
                    
            
            </div>
            <table>
            <thead>
            <tr>
                <td colspan="3" style = 'border-top: 1px solid #ccc;'></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Cart Sub Total:  </td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Eco Taxc:  0$</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Phí vận chuyển:  Free  </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                @foreach($customer as $value)
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Tổng cộng:  {{$value->price}}  </td>
                @endforeach
            </tr>
            </thead>
            </table>

            <form class="form-horizontal form-material" method = 'post' enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="col-sm-12" >Trạng thái đơn hàng </label>
                <div class="col-sm-12">
                    @foreach($customer as $value)
                    <p>{{$value->order_status}}</p>
                    @endforeach
                    <select class="form-control form-control-line" value = '{{old('id_country')}}' name = 'order_status'>
                        
                     
                        {{-- @foreach($country as $key =>$value) --}}
                        @foreach($customer as $value)
                          @if($value->order_status == 0)
                        <option value = '0' selected>Đang chờ xử lí</option>
                        <option value = '1'>Đang vận chuyển</option>
                        <option value = '2'>Đã giao hàng</option>
                        {{-- <?= 
                            $value['id'] == Auth::user()->id_country ? "selected" : ""
                        ?>
                     
                        
                        >{{$value['name']}}</option> --}}
                            @elseif ($value->order_status == 1)
                        <option value="0" >Đang chờ xử lí</option>
                        <option value = '1' selected>Đang vận chuyển</option>
                        <option value = '2'>Đã giao hàng</option>

                            @else
                            <option value="0" >Đang chờ xử lí</option>
                        <option value = '1'>Đang vận chuyển</option>
                        <option value = '2' selected>Đã giao hàng</option>
                        @endif
                        @endforeach
                        
                    </select>
                </div>

                @php $sum = 0 ; $total = 0 @endphp
                    @foreach ($detail as $v => $k )
                    @php 
                        $sum += $k->product_sold_quantity;
                        $total += $k->product_price * $k->product_sold_quantity;
                    @endphp
                    @endforeach
                    <input name = 'total_quantity' class = 'total_product_detail' value = {{$sum}} hidden>
                    <input name = 'revenue' value = {{$total}} hidden>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">HTML</a></li>
                      <li><a href="#">CSS</a></li>
                      <li><a href="#">JavaScript</a></li>
                    </ul>
                  </div>
                <button class="btn btn-success" type="submit">Cập nhật trạng thái đơn hàng</button>
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
            @csrf
            </form>
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