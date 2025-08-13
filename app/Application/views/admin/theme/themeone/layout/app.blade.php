@php
    $VERSION_NUMBER = 9.3;
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Milestone">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Milestone">

    <meta name="theme-color" content="#4C7FF0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
        |
        {{ getSetting('siteTitle') }}
    </title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="{{ url('website') }}/css/admin/jquery-jvectormap-1.2.2.css"/>
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="{{ url('website') }}/css/admin/bootstrap.css"/>
    <link rel="stylesheet" href="{{ url('website') }}/css/admin/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="{{ url('website') }}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ url('website') }}/css/admin/animate.css"/>
    @if(getDir() == 'rtl')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ url('website') }}/css/admin/app-rtl.css?v={{$VERSION_NUMBER}}" id="load_styles_before"/>
        <link rel="stylesheet" href="{{ url('website') }}/css/admin/app.skins-rtl.css?v={{$VERSION_NUMBER}}"/>
    @else
        <link rel="stylesheet" href="{{ url('website') }}/css/admin/app.css?v={{$VERSION_NUMBER}}" id="load_styles_before"/>
        <link rel="stylesheet" href="{{ url('website') }}/css/admin/app.skins.css?v={{$VERSION_NUMBER}}"/>
    @endif
    <link rel="stylesheet" href="{{ url('website') }}/css/admin/custom.css?v={{$VERSION_NUMBER}}" id="load_styles_before"/>

<!-- endbuild -->

    {{ Html::style('website/css/admin/multi-select.css') }}
    {{ Html::style('website/css/admin/bootstrap-select.min.css') }}
    <link rel="stylesheet" href="{{ url('website') }}/css/dataTables.bootstrap4.min.css"/>

    {{ Html::style('website/css/sweetalert.css') }}
    {{ Html::style('website/css/admin/elfinder.full.css') }}
    {{-- Html::style('public/css/rate.css') --}}
    <link rel="stylesheet" href="{{ url('website/css/fontawesome-iconpicker.min.css') }}">
    @yield('style')
    <style>
        .img-responsive {
            width: 100%
        }
        .search input{
            width:140px !important;
        }
    </style>
    <link href="{{ url('/website/css/mainselec2.css') }}" rel="stylesheet" />
    <link href="{{ url('/website/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ url('/website/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
</head>
<body>

<div class="app">
    <!--sidebar panel-->
    <div class="off-canvas-overlay" data-toggle="sidebar"></div>
    <div class="sidebar-panel">
        <div class="brand">
            <!-- toggle offscreen menu -->
            <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up">
                <i class="material-icons">menu</i>
            </a>
            <!-- /toggle offscreen menu -->
            <!-- logo -->
            <a class="brand-logo">
                <img class="expanding-hidden" src="{{ url('website/business/new') }}/images/igts-logo.png" alt=""/>
            </a>
            <!-- /logo -->
        </div>
        <div class="nav-profile dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <div class="user-image">
                    <img src="{{ url('/website/business/new') }}/images/igts-logo.png" class="avatar img-circle" alt="user" title="user"/>
                </div>
                <div class="user-info expanding-hidden">
                    {{ auth()->user()->name }}
                    <small class="bold">{{ auth()->user()->email }}</small>
                </div>
            </a>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" hreflang="{{$localeCode}}"
                       href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>

                <a href="{{ url('/lazyadmin/user/item/'.auth()->user()->id) }}"><i
                            class="material-icons">person</i>{{ trans('home.profile') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="material-icons">input</i>{{ trans('home.sign_out') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- main navigation -->
        <nav>
            <p class="nav-title">NAVIGATION</p>
            <ul class="nav">
                @include(layoutMenu())
            </ul>
        </nav>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
        <!-- top header -->
        <nav class="header navbar">
            <div class="header-inner">
                <div class="navbar-item navbar-spacer-right brand hidden-lg-up">
                    <!-- toggle offscreen menu -->
                    <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen">
                        <i class="material-icons">menu</i>
                    </a>
                    <!-- /toggle offscreen menu -->
                    <!-- logo -->
                    <a class="brand-logo hidden-xs-down">
                        <img src="{{ url('/style') }}/images/logo_white.png" alt="logo"/>
                    </a>
                    <!-- /logo -->
                </div>
                <a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#">
                    <span>
                        @yield('title')
                    </span>
                </a>

            </div>
        </nav>
        <!-- /top header -->

        <!-- main area -->
        <div class="main-content">
            <div class="content-view">
                @yield('content')
            </div>
            <!-- bottom footer -->
            <div class="content-footer">
                <nav class="footer-left">
                    <ul class="nav">
                        <li>
                            <a href="javascript:;">
                                <span>Copyright</span>
                                &copy; 2022 {{ getSetting('siteTitle')  }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /bottom footer -->
        </div>
        <!-- /main area -->
    </div>
    <!-- /content panel -->


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                ...
            </div>

        </div>
    </div>
</div>

</div>


<script src="{{ url('website') }}/js/admin/jquery.min.js"></script>
<script src="{{ url('website') }}/js/app.min.js"></script>
<script src="{{ url('website') }}/js/admin/pace.js"></script>
<script src="{{ url('website') }}/js/admin/tether.js"></script>
<!-- <script src="{{ asset('website') }}/js/bootstrap.min.js?v={{$VERSION_NUMBER}}"></script> -->
<script src="{{ url('website') }}/js/admin/bootstrap.js"></script>
<script src="{{ url('website') }}/js/admin/constants.js"></script>
<script src="{{ url('website') }}/js/admin/main.js"></script>
<!-- endbuild -->

{{ Html::script('website/js/admin/jquery.dataTables.min.js') }}
<script src="{{ url('website') }}/js/dataTables.bootstrap4.js"></script>

{{ Html::script('website/js/sweetalert.min.js') }}

<script src="{{ url('website/js/select2.min.js') }}"></script>
<script src="{{ url('website/js/moment.js') }}"></script>
<script src="{{ url('website/js/bootstrap-datetimepicker.js') }}"></script>

<script type="application/javascript">
    $('.select2').select2({
        theme: "bootstrap",
        dir:"{{ getDirection() }}"
    });
    $('.datepicker').datetimepicker({
        defaultDate: "{{ date('Y/m/d') }}",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format: 'Y/MM/DD H:m:s'
    });
    $('.datepicker2').datetimepicker({
        defaultDate: "",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format: 'Y/MM/DD'
    });

    $('.time').datetimepicker({
        format: 'LT',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });
    function deleteThisItem(e) {
        var link = $(e).data('link');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Item Again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function () {
                window.location = link;
            });
    }

    function checkAll() {
        $('input[name="id[]"]').each(function () {
            if (!$(this).prop('checked')) {
                $(this).prop('checked' , true);
            }
        });
    }

    function unCheckAll() {
        $('input[name="id[]"]').each(function () {
            if ($(this).prop('checked')) {
                $(this).prop('checked' , false);
            }
        });
    }

    function deleteThemAll(e) {
        var link = $(e).data('link');
        var check = [];
        $('input[name="id[]"]').each(function () {
            if ($(this).prop('checked')) {
                check.push($(this).val());
            }
        });
        if (check.length > 0) {
            swal({
                    title: "@lang('admin.Are you sure?')",
                    text: "@lang('admin.You will not be able to recover this Item Again!')",
                    type: "@lang('admin.warning')",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('admin.Yes, delete it!')",
                    closeOnConfirm: false
                },
                function () {
                    window.location = link + '?id[]=' + check;
                });
        } else {
            alert("@lang('admin.Please Select Some items')");
        }
    }

    $('.nav-item').on('click', function (e) {
        $(this).siblings().removeClass('active');
        $(this).siblings().find('a').removeClass('active');
        $(this).addClass('active');
        $(this).find('a').addClass('active');
        $(this).closest('ul.nav').next('.tab-content').children('.tab-pane').each(function () {
            $(this).removeClass('active');
        });
        var id = $(this).find('a').attr('href');
        $(id).addClass('active');
    });
</script>
<script src="{{ url('website/js/fontawesome-iconpicker.min.js') }}"></script>
<script>
    $('.icon-field').iconpicker();
</script>

<script src="{{ url('website/js/admin/custom-admin.js') }}?v={{$VERSION_NUMBER}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@include('sweet::alert')
@yield('script')
@stack('js')
</body>
</html>
