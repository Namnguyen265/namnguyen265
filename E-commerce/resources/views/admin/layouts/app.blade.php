<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/admin/assets/images/favicon.png')}}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <title>Nice admin Template - The Ultimate Multipurpose admin template</title>
    <title>{{ config('app.name', 'Laravel')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom CSS -->
    <link href="{{asset('/admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('admin/assets/libs/bootstrap/dist/css/bootstrap-grid.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('admin/assets/libs/bootstrap/dist/css/bootstrap-reboot.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    
    {{-- <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{asset('admin/plugins/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/> --}}
    {{-- <link href="{{asset('admin/css-new/style.css')}}" rel="stylesheet" type="text/css"/> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{asset('/admin/assets/libs/taginput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class = 'preloader'>
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    
    @include('admin.layouts.header')
    
    @include('admin.layouts.left-sidebar')
    
    <div class = 'page-wrapper'>
        @yield('content')
    </div>
    

    </div>
    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admin/assets/libs/popper.js/dist/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    {{-- <script src="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script> --}}
    <script src="{{asset('admin/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <script src="{{asset('admin/dist/js/custom.js')}}"></script>
    {{-- <script src="{{asset('admin/assets/libs/jquery/dist/jquery.slim.min.js')}}"></script> --}}
    

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    {{-- new  --}}
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{-- <script src="{{asset('frontend/js/jquery.js')}}"></script> --}}
    <script src="{{asset('/admin/assets/libs/taginput/bootstrap-tagsinput.min.js')}}"></script>
    <!--CKeditor-->
    
    

    
    <script> CKEDITOR.replace( 'demo', {
        enterMode : Number(2),
        
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    </script>
    
    <script>
        $(document).ready(function(){
            chart30daysorder();
            
            // document.getElementById("chart").innerHTML = myFunction(4, 3);
            // $('#khuyenmai').click(function(){ 
            //     var value = $('#khuyenmai').val();
            //     console.log(value);
    
            //     if (value == 1)
            //     {
            //         $('.sale_price').attr('style', "display:block");
            //     }
            //     else
            //     {
            //         $('.sale_price').attr('style', "display:none");
            //     }
            // });
           

                     var chart = new Morris.Bar({
                    
                      element: 'chart',

                      lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56' ],

                      parseTime : false,
                      hideHover : 'auto',
                      
                      

                      xkey: ['period'],
                    
                      ykeys: ['revenue', 'total_quantity' , 'total_order'],
                    
                    
                      labels: ['Doanh thu', 'Số lượng sản phẩm' , 'Số lượng đơn hàng']
                    });



// var chart = new Morris.Line({
//   // ID of the element in which to draw the chart.
//   element: 'chart',
//   // Chart data records -- each entry in this array corresponds to a point on
//   // the chart.

//   lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56' ],

//   pointFillColors: ['#ffffff'],
//   pointStrokeColors: ['black'],
//    fillOpacity: 0.6,
//    hideHover: 'auto',
//    parseTime: false,
// //   data: [
// //     { year: '2008', value: 20 },
// //     { year: '2009', value: 10 },
// //     { year: '2010', value: 5 },
// //     { year: '2011', value: 5 },
// //     { year: '2012', value: 20 }
// //   ],
//   // The name of the data record attribute that contains x-values.
//   xkey: 'period',
//   // A list of names of data record attributes that contain y-values.
//   ykeys: ['income', 'total_order', 'price', 'qty'],
//   behaveLikeLine: true,
//   // Labels for the ykeys -- will be displayed when you hover over the
//   // chart.
//   labels: ['Thu nhập', 'doanh số', 'giá', 'số lượng']
// });


            
            $('#brand').change(function(){
                var xx = $(this).val();
                alert(xx);
            })
    
            $('#khuyenmai').change(function() {
                // alert('HIHIHI');
                var value = $(this).val();
                var sale = $('#sale_value').val();
                // var new = $('#new_product').val();
                console.log(sale);
                // console.log(value);
                if(value==1){
                    //$('input.sale_price').show();
                    $('input.sale_price').val(sale);
                    $('input.sale_price').show();
                    $('span.sale_price').show();
                    // $('.sale_price').hide();
                    // $('input.sale_price').attr('style', "display: inline;")
                    // $('span.sale_price').attr('style', "display:inline")
                }
                else{
                    //$('sale_price').hide();
                    $('input.sale_price').val(0);
                    $('input.sale_price').hide();
                    $('span.sale_price').hide();
                    
                    // $('input.sale_price').attr('style', "display:none");
                    // $('span.sale_price').attr('style', "display:none")
    
                }
    
        });

            $('#sale_value').click(function(){
                var value = $(this).val();
                console.log(value);
            })


            $('.form-control').click(function(){
            var status = $(this).val();
            console.log(status);
        })

        
        
            $("#datepicker").datepicker({
                dateFormat:"yy-mm-dd"
            });
        
            $("#datepicker2").datepicker({
                dateFormat:"yy-mm-dd"
            })

            $("#date-filter").click(function(){
                var _token = $('input[name="_token"]').val();
                var date_from = $('#datepicker').val();
                var to_date = $('#date-filter').val();
                alert('ff')
                // $.ajax({
                //     url: {{url('ajax/filter-date')}},
                //     method: "POST",
                //     dataType: "JSON",
                //     data: {
                //         "_token": '{{csrf_token()}}'
                //         date_from : date_from,
                //         date_to : date_to
                //     }

                //     success:function(data){
                //         chart.setData(data);
                //     }
                // })
            })


            

            function chart30daysorder(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : "{{url('/admin/30dayorder/ajax')}}",
                    method : "POST",
                    dataType : "JSON",
                    data : {
                        "_token": '{{csrf_token()}}',
                    },

                    success:function(data)
                    {
                        chart.setData(data);
                    },
                })
            }

            // function hi(a , b)
            // {
            //     return a * b;
            // }


            $("#datetime").click(function(){
                // alert('dd')
                var _token = $('input[name="_token"]').val();
                var date_from = $('#datepicker').val();
                var date_to = $('#datepicker2').val();
                // alert(date_from);
                // alert(date_to);
                // $.ajax({
                //     url: {{url('ajax/filter-date')}},
                //     method: "POST",
                //     dataType: "JSON",
                //     data: {
                //         "_token": '{{csrf_token()}}'
                //         date_from : date_from,
                //         date_to : date_to
                //     }

                //     success:function(data){
                //         // chart.setData(data);
                //     }
                // })
                $.ajax({
                    method : 'POST',
                    url : '{{url("/admin/filter-date/ajax")}}',
                    dataType : 'JSON',
                    data : {
                        date_from : date_from,
                        date_to : date_to,
                        // id : 1,
                        "_token": '{{csrf_token()}}'

                    },

                    success:function(data)
                    {
                        chart.setData(data);
                    },
                    error: function () {
                    
                        if(alert('Bạn nhập sai khoảng thời gian hoặc không có dữ liệu!')){}
                        else window.location.reload(); 
                    }
                    
                });
            })

            
            $('.dashboard-filter').change(function(){
                var filter_by = $(this).val();
                var _token = $('input[name="_token"]').val();
                // alert(filter_by);

                $.ajax({
                    url: "{{url('admin/ajax/dashboard_filter')}}",
                    method: 'POST',
                    dataType: 'JSON',
                    data: 
                    {
                        filter_by : filter_by,
                        "_token": '{{csrf_token()}}'

                    },

                    success:function(data)
                    {
                        chart.setData(data);
                    },

                    error:function()
                    {
                        if(alert('Chưa có dữ liệu!')){}
                        else window.location.reload(); 
                    },
                })
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#khuyenmai').change(function() {
                // alert('HIHIHI');
                var value = $(this).val();
                var sale = $('#sale_value').val();
                // var new = $('#new_product').val();
                console.log(sale);
                // console.log(value);
                if(value==1){
                    //$('input.sale_price').show();
                    $('input.sale_price').val(sale);
                    $('input.sale_price').show();
                    $('span.sale_price').show();
                    // $('.sale_price').hide();
                    // $('input.sale_price').attr('style', "display: inline;")
                    // $('span.sale_price').attr('style', "display:inline")
                }
                else{
                    //$('sale_price').hide();
                    $('input.sale_price').val(0);
                    $('input.sale_price').hide();
                    $('span.sale_price').hide();
                    
                    // $('input.sale_price').attr('style', "display:none");
                    // $('span.sale_price').attr('style', "display:none")
    
                }
    
        });
        })
    </script>
</body>
</html>