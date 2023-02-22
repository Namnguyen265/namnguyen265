@extends('admin.layouts.app')
@section('content')


<style>
    .label-doing{
        padding: 10px; 
        font-size: 14px;
        background-color: #137eff;
    }

    .label-waiting{
        padding: 10px;
        font-size: 14px;
        background-color: orange;
    }

    .label-success{
        padding: 10px;
        font-size: 14px;
        background-color: #73ad21;
    }
    
    .label{
        padding: 10px;
        font-size: 14px;
    }
</style>


<div class = 'page-breadcrumb'>
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Đơn hàng</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
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
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên thành viên</th>
                        <th scope='col'>Số điện thoại</th>
                        <th scope='col'>Ngày tạo</th>
                        <th scope='col'>Tình trạng</th>
                        <th scope='col'>Tổng giá đơn hàng</th>
                        <th scope='col'>Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    @if (!empty($history))
                    @foreach($history as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->created_at->format("M d, Y - H:i:s")}}</td>
                        <td>
                            @if ($value->order_status == 0 && $value->cancel == 0)
                            <span class="label label-waiting label-rounded">Đang chờ xử lý</span>
                            @elseif ($value->order_status == 1 && $value->cancel == 0)
                            <span class="label label-doing label-rounded">Đang vận chuyển</span>
                            @elseif ($value->order_status == 2 && $value->cancel == 0)
                            <span class="label label-success label-rounded">Đã giao hàng</span>
                            @else
                            <span class="label label-danger label-rounded">Đã huỷ</span>

                            @endif
                        </td>
                        <td>{{$value->price}}</td>
                        {{-- <td>{{$value->}}</td> --}}

                        {{-- <td>{!!$value->content!!}</td> --}}
                        
                        
                        <td>
                        <a href = "" class="delete_history" id=''><button class = 'btn btn-danger'><i class="fa fa-trash"> Xoá</i></button></a>
                        <a href = '{{route('detail_order', $value->id)}}' class= '' id= ''><button class = "btn btn-success"><i class="fa fa-pencil"> Chi tiết</i></button>
                        </td>
                            
                        
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan='6'>Khong co nguoi dung</td>
                    </tr>
                    @endif
                    <table>
                    
                        
                        
                        
                        <div class = 'pagination justify-content-center'>{!! $history->links() !!}</div>
                        
                    
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