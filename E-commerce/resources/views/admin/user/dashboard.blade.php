@extends('admin.layouts.app')
@section('content')



    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- Email campaign chart -->
        <!-- ============================================================== -->

        {{-- <div class="row-fluid">
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="icon-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            1349
                        </div>
                        <div class="desc">                           
                            New Feedbacks
                        </div>
                    </div>
                    <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>                 
                </div>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="icon-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">549</div>
                        <div class="desc">New Orders</div>
                    </div>
                    <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>                 
                </div>
            </div>
            <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">+89%</div>
                        <div class="desc">Brand Popularity</div>
                    </div>
                    <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>                 
                </div>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="details">
                        <div class="number">12,5M$</div>
                        <div class="desc">Total Profit</div>
                    </div>
                    <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>                 
                </div>
            </div>
        </div> --}}


        <div class="row">
          <div class="col-3">
              <div class="card text-white bg-success mb-3">
                  <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$count_order_success}} ĐƠN</h5>
                      <p class="card-text">Đơn hàng giao dịch thành công</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-primary mb-3">
                  <div class="card-header">ĐANG CHỜ XỬ LÝ</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$count_order_waiting}} ĐƠN</h5>
                      <p class="card-text">Đơn hàng đang chờ xử lý</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-danger mb-3">
                  <div class="card-header">ĐANG VẬN CHUYỂN</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$count_order_delivering}} ĐƠN</h5>
                      <p class="card-text">Đơn hàng đang vận chuyển</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-warning mb-3">
                  <div class="card-header">DOANH THU</div>
                  <div class="card-body">
                      <h5 class="card-title">{{number_format($sum_revenue).' VNĐ'}}</h5>
                      <p class="card-text">Doanh thu hệ thống</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-dark mb-3">
                  <div class="card-header">ĐƠN HÀNG HỦY</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$count_order_cancel}} ĐƠN</h5>
                      <p class="card-text">Đơn hàng bị hủy</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-info mb-3">
                  <div class="card-header">TỔNG SẢN PHẨM TRONG KHO</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$sum_quantity}} SẢN PHẨM</h5>
                      <p class="card-text">Số lượng sản phẩm trong kho</p>
                  </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card text-white bg-light mb-3" style="color:#000!important;">
                  <div class="card-header">TỔNG SẢN PHẨM BÁN RA</div>
                  <div class="card-body">
                      <h5 class="card-title">{{$sum_sold_quantity}} SẢN PHẨM</h5>
                      <p class="card-text">Số lượng sản phẩm đã bán</p>
                  </div>
              </div>
          </div>
      </div>


        <div class="row-fluid">
            <p>Thống kê đơn hàng doanh số</p>
            <form autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <p>Từ ngày: <input type="text" id = 'datepicker' class="form-control" ></p>
                        <input type = "button" id = 'datetime' class="btn btn-primary btn-sm" value="Lọc kết quả">
                        
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày: <input type="text" id = 'datepicker2' class="form-control" ></p>
                        
                    </div>
                

                <div class="col-md-2">
                    <p>
                        Lọc theo: 
                        <select class="dashboard-filter form-control">
                            <option>--Chọn--</option>
                            <option value="week">7 ngày qua</option>
                            <option value="lastmonth">Tháng trước</option>
                            <option value="thismonth">Tháng này</option>
                            <option value="year"> 365 ngày qua</option>
                            
                        </select>
                    </p>
                </div>
                </div>
                
            </form>
            
            <div class = "col-md-12">
                <div id = "chart" style="height: 250px"></div>
            </div>

            
        </div>

        <div class="row" style="">
            <div class="col-12 text-center">
                <p style="font-size: 20px"><b>Biểu đồ doanh thu trong 30 ngày vừa qua</b></p>
            </div>
        </div>
        
        

        
        <div class="row">
            <div class="col-6">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Top 5 sản phẩm có doanh thu cao nhất <span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr class="table-info">
                        <th scope="col"></th>
                        <th scope="col">Sản phẩm cây</th>
                        <th scope="col">Giá (VNĐ)</th>
                        <th scope="col">Doanh số</th>
                        <th scope="col">Doanh thu</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (!empty($top_revenue))
                      @foreach ($top_revenue as $key => $value)
                      <tr>
                        @php $getArrImage = json_decode($value->image, true); @endphp
                        <th scope="row"><a href="#"><img src="{{asset('upload/product/small/'. $getArrImage[0])}}" alt="" style="height:55px; width:55px"></a></th>
                        <td><a href="#" class="text-primary fw-bold">{{$value->name}}</a></td>
                        <td>{{$value->price}}</td>
                        <td class="fw-bold">{{$value->sold_quantity}}</td>
                        <td>{{$value->product_revenue}}</td>
                        
                      </tr>
                      @endforeach
                      {{-- <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr> --}}
                      @else 
                          <tr>
                              <td colspan="6">Khong co du lieu</td>
                          </tr>
                      @endif
                      
                      {{-- <div class="pagination-area">
                          {!! $top_revenue->links() !!}
                      </div> --}}
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Top 5 sản phẩm bán ra nhiều nhất <span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr class="table-info">
                        <th scope="col"></th>
                        <th scope="col">Sản phẩm cây</th>
                        <th scope="col">Giá (VNĐ)</th>
                        <th scope="col">Doanh số</th>
                        <th scope="col">Doanh thu</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (!empty($top_sell_qty))
                      @foreach ($top_sell_qty as $key => $value)
                      <tr>
                        @php $getArrImage = json_decode($value->image, true); @endphp
                        <th scope="row"><a href="#"><img src="{{asset('upload/product/small/'. $getArrImage[0])}}" alt="" style="height:55px; width:55px"></a></th>
                        <td><a href="#" class="text-primary fw-bold">{{$value->name}}</a></td>
                        <td>{{$value->price}}</td>
                        <td class="fw-bold">{{$value->sold_quantity}}</td>
                        <td>{{$value->product_revenue}}</td>
                        
                      </tr>
                      @endforeach
                      {{-- <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr> --}}
                      @else 
                          <tr>
                              <td colspan="6">Khong co du lieu</td>
                          </tr>
                      @endif
                      
                      {{-- <div class="pagination-area">
                          {!! $top_revenue->links() !!}
                      </div> --}}
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            
            {{-- <div class="col-6">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-5">Tổng doanh thu</h5>
                    <h3 class="font-light">{{$sum_revenue}} VNĐ</h3>
                    <div class="m-t-20 text-center">
                        <div id="earnings"></div>
                    </div>
                </div>
            </div>
            </div> --}}
        </div>
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        {{-- <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Sales</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NAME</th>
                                    <th class="border-top-0">STATUS</th>
                                    <th class="border-top-0">DATE</th>
                                    <th class="border-top-0">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td class="txt-oflo">Elite admin</td>
                                    <td><span class="label label-success label-rounded">SALE</span> </td>
                                    <td class="txt-oflo">April 18, 2017</td>
                                    <td><span class="font-medium">$24</span></td>
                                </tr>
                                <tr>
                                    
                                    <td class="txt-oflo">Real Homes WP Theme</td>
                                    <td><span class="label label-info label-rounded">EXTENDED</span></td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="font-medium">$1250</span></td>
                                </tr>
                                <tr>
                                    
                                    <td class="txt-oflo">Ample Admin</td>
                                    <td><span class="label label-purple label-rounded">Tax</span></td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="font-medium">$1250</span></td>
                                </tr>
                                <tr>
                                    
                                    <td class="txt-oflo">Medical Pro WP Theme</td>
                                    <td><span class="label label-success label-rounded">Sale</span></td>
                                    <td class="txt-oflo">April 20, 2017</td>
                                    <td><span class="font-medium">-$24</span></td>
                                </tr>
                                <tr>
                                    
                                    <td class="txt-oflo">Hosting press html</td>
                                    <td><span class="label label-success label-rounded">SALE</span></td>
                                    <td class="txt-oflo">April 21, 2017</td>
                                    <td><span class="font-medium">$24</span></td>
                                </tr>
                                <tr>
                                    
                                    <td class="txt-oflo">Digital Agency PSD</td>
                                    <td><span class="label label-danger label-rounded">Tax</span> </td>
                                    <td class="txt-oflo">April 23, 2017</td>
                                    <td><span class="font-medium">-$14</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Comments</h4>
                    </div>
                    <div class="comment-widgets" style="height:430px;">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{asset('\admin\assets\images\users\1.jpg')}}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">James Anderson</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('\admin\assets\images\users\4.jpg')}}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Michael Jorden</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer ">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-success label-rounded">Approved</span>
                                    <span class="action-icons active">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="icon-close"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart text-danger"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('/admin/assets/images/users/5.jpg')}}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Johnathan Doeting</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-danger">Rejected</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{asset('/admin/assets/images/users/2.jpg')}}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Steve Jobs</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- column -->
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Temp Guide</h4>
                        <div class="d-flex align-items-center flex-row m-t-30">
                            <div class="display-5 text-info"><i class="wi wi-day-showers"></i> <span>73<sup>°</sup></span></div>
                            <div class="m-l-10">
                                <h3 class="m-b-0">Saturday</h3><small>Ahmedabad, India</small>
                            </div>
                        </div>
                        <table class="table no-border mini-table m-t-20">
                            <tbody>
                                <tr>
                                    <td class="text-muted">Wind</td>
                                    <td class="font-medium">ESE 17 mph</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Humidity</td>
                                    <td class="font-medium">83%</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pressure</td>
                                    <td class="font-medium">28.56 in</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Cloud Cover</td>
                                    <td class="font-medium">78%</td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="row list-style-none text-center m-t-30">
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                <span class="d-block text-muted">09:30</span>
                                <h3 class="m-t-5">70<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                <span class="d-block text-muted">11:30</span>
                                <h3 class="m-t-5">72<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                <span class="d-block text-muted">13:30</span>
                                <h3 class="m-t-5">75<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                <span class="d-block text-muted">15:30</span>
                                <h3 class="m-t-5">76<sup>°</sup></h3>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> --}}
            
            
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        {{-- All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>. --}}
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->

    
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $("#date-filter").clicj({

            });
        });
        

    </script> --}}
@endsection