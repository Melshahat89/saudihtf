@php
$VERSION_NUMBER = 1.0;
@endphp
@yield('css')
<link href="{{ URL::asset('vuesy/assets/images/favicon.ico')}}" rel="icon">
<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- End Google Fonts -->
<link href="{{ URL::asset('vuesy/assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('vuesy/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@if(getDir() == 'rtl')
    <link href="{{ URL::asset('vuesy/assets/css/bootstrap-rtl.min.css') }}?v={{$VERSION_NUMBER}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('vuesy/assets/css/app-rtl.min.css') }}?v={{$VERSION_NUMBER}}" id="app-style" rel="stylesheet" type="text/css" />
@else
    <link href="{{ URL::asset('vuesy/assets/css/bootstrap.min.css') }}?v={{$VERSION_NUMBER}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('vuesy/assets/css/app.min.css') }}?v={{$VERSION_NUMBER}}" id="app-style" rel="stylesheet" type="text/css" />
@endif
<link href="{{ URL::asset('vuesy/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link media="all" type="text/css" rel="stylesheet" href="{{asset('admin')}}/plugins/multi-select/css/multi-select.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ url('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
{{ Html::style('css/sweetalert.css') }}
@endyield

