@extends(layoutPath("layout.app"))

@section('title')Vertical @endsection
@section('css')

    <!-- plugin css -->
{{--    <link href="{{ URL::asset('vuesy/assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--    <!-- swiper css -->--}}
{{--    <link href="{{ URL::asset('vuesy/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">--}}
@endsection
@section('content')
    {{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Layouts @endslot
            @slot('title') Vertical @endslot
        @endcomponent
    @endsection

    <div class="collapse show verti-dash-content" id="dashtoggle">
        <div class="container-fluid">
            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">@@title</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">@@pagetitle</a></li>
                                <li class="breadcrumb-item active">@@title</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div> --}}
            @yield('breadcrumb')
            <!-- end page title -->

            <!-- start dash info -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card dash-header-box shadow-none border-0">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-6 row-cols-md-3 row-cols-1 g-0">
                                <div class="col">
                                    <div class="mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Users </p>
                                        <h3 class="text-white mb-0">{{$data['userCount']}}</h3>
                                    </div>
                                </div><!-- end col -->

                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Instructors</p>
                                        <h3 class="text-white mb-0">{{$data['instructors']}}</h3>
                                    </div>
                                </div><!-- end col -->

                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Orders Count</p>
                                        <h3 class="text-white mb-0">{{$data['ordersCount']}}</h3>
                                    </div>
                                </div><!-- end col -->

                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Revenue</p>
                                        <h3 class="text-white mb-0">{{$data['revenue']}}</h3>
                                    </div>
                                </div><!-- end col -->

                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-3 px-4 mx-2">
                                        <p class="text-white-50 mb-2 text-truncate">Free Orders Count</p>
                                        <h3 class="text-white mb-0">{{$data['freeOrdersCount']}}</h3>
                                    </div>
                                </div><!-- end col -->



                            </div><!-- end row -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end dash info -->
        </div>
    </div>

    <!-- start dash troggle-icon -->
    <div>
        <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
            <i class="bx bx-up-arrow-alt"></i>
        </a>
    </div>
    <!-- end dash troggle-icon -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-flex align-items-start mb-4 mb-xl-0">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Invoice Overview</h5>
                        </div>
                        <div class="flex-shrink-0 d-none">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Yearly</a>
                                    <a class="dropdown-item" href="#">Monthly</a>
                                    <a class="dropdown-item" href="#">Weekly</a>
                                    <a class="dropdown-item" href="#">Today</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-xl-4">
                            <div class="card bg-light mb-0">
                                <div class="card-body">
                                    <div class="py-2">
                                        <h5>Total Revenue:</h5>
                                        <h2 class="mt-4 pt-1 mb-1">e£ {{ $data['revenue'] }}</h2>
                                        <p class="text-muted font-size-15 text-truncate d-none">From Jan 20,2022 to July,2022</p>

                                        <div class="d-flex mt-4 align-items-center d-none">
                                            <div id="mini-1" data-colors='["--bs-success"]' class="apex-charts"></div>
                                            <div class="ms-3">
                                                <span class="badge bg-danger"><i class="mdi mdi-arrow-down me-1"></i>16.3%</span>
                                            </div>
                                        </div>

                                        <div class="row mt-4 d-none">
                                            <div class="col">
                                                <div class="d-flex mt-2">
                                                    <i class="mdi mdi-square-rounded font-size-10 text-success mt-1"></i>
                                                    <div class="flex-grow-1 ms-2 ps-1">
                                                        <h5 class="mb-1">3,526,56</h5>
                                                        <p class="text-muted text-truncate mb-0">Net Profit</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex mt-2">
                                                    <i class="mdi mdi-square-rounded font-size-10 text-primary mt-1"></i>
                                                    <div class="flex-grow-1 ms-2 ps-1">
                                                        <h5 class="mb-1">5,324,85</h5>
                                                        <p class="text-muted text-truncate mb-0">Net Revenue</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div>
                                <div id="column_chart" data-colors='["--bs-primary", "--bs-primary-rgb, 0.2"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-2">Order Stats</h5>
                        </div>
                        <div class="flex-shrink-0 d-none">
                            <div class="dropdown">
                                <i>{{\Carbon\Carbon::now()->format('M-Y')}}</i>
                            </div>
                        </div>
                    </div>

                    <div id="chart-donut" data-colors='["--bs-primary", "--bs-success","--bs-danger"]' class="apex-charts" dir="ltr"></div>

                    <div class="mt-1 px-2">
                        <div class="order-wid-list d-flex justify-content-between border-bottom">
                            <p class="mb-0"><i class="mdi mdi-square-rounded font-size-10 text-primary me-2"></i>Order Completed</p>
                            <div>
                                <span class="pe-5">{{$data['ordersCompleted']}}</span>
                                <span class="badge bg-primary"> {{ round(($data['ordersCompleted'] / $data['ordersAll']) * 100)}} %</span>
                            </div>
                        </div>
                        <div class="order-wid-list d-flex justify-content-between border-bottom">
                            <p class="mb-0"><i class="mdi mdi-square-rounded font-size-10 text-success me-2"></i>Order Processing</p>
                            <div>
                                <span class="pe-5">{{$data['ordersPending']}}</span>
                                <span class="badge bg-success"> {{ round(($data['ordersPending'] / $data['ordersAll']) * 100)}} %</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-3">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2">Top Enrollments</h5>
                                </div>
                                <div class="flex-shrink-0 d-none">
                                    <div class="dropdown">
                                        <a class=" text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{\Carbon\Carbon::now()->format('M-Y')}}</i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 pt-1">
                                @foreach($data['topEnrollments'] as $enroll )
                                    <div class="social-box row align-items-center border-bottom pt-0 g-0">
                                        <div class="col-12 col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded">
{{--                                                            <i class="mdi mdi-facebook font-size-20"></i>--}}
                                                            <img src="{{$enroll->user['image'] ? large($order->user['image']): URL::asset('vuesy/assets/images/users/avatar-2.jpg') }}" alt="" class="avatar rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-15 mb-1 text-truncate">{{isset($enroll->courses['titlelang']) ?  $enroll->courses['titlelang'] : ''}}</h5>
                                                    <p class="text-muted mb-0">{{$enroll->user['email']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-sm-3">
                                            <div class="mt-3 mt-md-0 text-md-end">
                                                <h5 class="font-size-15 mb-1 text-truncate">#{{$enroll->id}}</h5>
                                                <p class="text-muted mb-0 text-truncate">{{$enroll->start_time}}</p>
                                            </div>
                                        </div>
                                        <div class="col-auto col-sm-2">
                                            <div class="mt-3 mt-md-0 text-end">
{{--                                                <h5 class="font-size-15 mb-1 text-truncate">dddd</h5>--}}
                                                <p class="text-muted mb-0">
                                                    <label class="badge bg-success">Active</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Best Selling Course </h5>
                        </div>
                    </div>

                    <div class="slider mt-4">
                        <!-- Add Pagination -->
                        <div class="swiper-button-next"><i class="mdi mdi-arrow-right"></i></div>
                        <div class="swiper-button-prev"><i class="mdi mdi-arrow-left"></i></div>

                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($data['bestSelling'] as $sell)
                                    <div class="swiper-slide">
                                    <div class="card dash-product-box shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="pricing-badge">
                                                <span class="badge bg-success">Sale</span>
                                            </div>
                                            <div class="dash-product-img">
                                                <img src="{{large($sell->courses['image'])}}" class="img-fluid" alt="">
                                            </div>

                                            <h5 class="font-size-17 mt-1">
                                                <a href="/courses/view/{{$sell->courses['slug']}}" class="text-dark lh-base">{{isset($sell->courses['titlelang']) ?  $sell->courses['titlelang'] : ''}}</a>
                                            </h5>

                                            <h5 class="font-size-20 text-primary mt-3 mb-0"> {!! $sell->courses->PriceText !!} </h5>

                                            <div class="font-size-16">
                                                {!! $sell->courses->Rating !!}

                                            </div>

                                            <div class="mt-4 d-none">
                                                <a href="" class="btn btn-primary btn-sm w-lg"><i class="mdi mdi-cart me-1 align-middle"></i> Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="row d-none">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Sales Revenue</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold">Year:</span> <span class="text-muted">2022<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">2019</a>
                                    <a class="dropdown-item" href="#">2020</a>
                                    <a class="dropdown-item" href="#">2021</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div id="world-map-markers" style="height: 230px;"></div>
                    </div>

                    <div>
                        <div id="sales-countries" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pb-3">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-2">Recent Orders</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{\Carbon\Carbon::now()->format('M-Y')}}</i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="table-responsive">
                            <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 210px">Customer</th>
                                    <th scope="col" style="width: 140px">Course Name</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Method</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data['lastOrders'] as $order )
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="{{$order->user['image'] ? large($order->user['image']): URL::asset('vuesy/assets/images/users/avatar-2.jpg') }}" alt="" class="avatar rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">{{str_limit($order->user['name'],15)}}</div>
                                            </div>
                                        </td>
                                        <td>{{isset($order->ordersposition[0]['courses']['titlelang']) ?  str_limit($order->ordersposition[0]['courses']['titlelang'],30) : ''}}</td>
                                        <td>
                                            <span>#{{$order->id}}</span>
                                        </td>
                                        <td>
                                            {{$order->orderAmount .' '. getCurrency($order->currency) }}
                                        </td>
                                        <td>
                                            <p class="mb-0"><i class="mdi mdi-square-rounded font-size-10 text-success me-2"></i>SUCCEEDED</p>
                                        </td>
                                        <td>

                                            <label class="badge bg-success">{{$order->payments['accept_source_data_type']}}</label>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('vuesy/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Vector map-->
    <script src="{{ URL::asset('vuesy/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('vuesy/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::asset('vuesy/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- <script src="{{ URL::asset('vuesy/assets/js/pages/dashboard.init.js') }}"></script> -->


    <script>

        // get colors array from the string
        function getChartColorsArray(chartId) {
            if (document.getElementById(chartId) !== null) {
                var colors = document.getElementById(chartId).getAttribute("data-colors");
                colors = JSON.parse(colors);
                return colors.map(function (value) {
                var newValue = value.replace(" ", "");

                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    if (color) return color;else return newValue;
                    ;
                } else {
                    var val = value.split(',');

                    if (val.length == 2) {
                    var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                    rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                    return rgbaColor;
                    } else {
                    return newValue;
                    }
                }
                });
            }
        } // mini-1

        var chartBarColors = getChartColorsArray("column_chart");
        var revenu = @json($data['revenuePerMonth']);
        
        var options = {
        chart: {
            height: 410,
            type: 'bar',
            toolbar: {
            show: false
            }
        },
        plotOptions: {
            bar: {
            borderRadius: 3,
            horizontal: false,
            columnWidth: '64%',
            endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Revenue',
            data: revenu
        }],
        // colors: chartBarColors,
        colors: ["#776acf", "#e4e1f5"],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'June', 'August', 'September', 'October', 'November', 'December']
        },
        grid: {
            borderColor: '#f1f1f1'
        },
        fill: {
            opacity: 1
        },
        legend: {
            show: false
        },
        tooltip: {
            y: {
            formatter: function formatter(val) {
                return "e£ " + val + " thousands";
            }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#column_chart"), options);
        chart.render(); // Donut chart

        var chartBarColors = getChartColorsArray("chart-donut");
        var options = {
          chart: {
            height: 287,
            type: 'donut'
          },
          plotOptions: {
            pie: {
              donut: {
                size: '75%'
              }
            }
          },
          dataLabels: {
            enabled: false
          },
          series: [{{$data['ordersCompleted']}}, {{$data['ordersPending']}}],
          labels: ["Completed", "Processing"],
        //   colors: chartBarColors,
          colors: ["#776acf", "#6dcba3"],
          legend: {
            show: false
          }
        };
        var chart = new ApexCharts(document.querySelector("#chart-donut"), options);
        chart.render(); // sparkline-1
    </script>
@endsection
