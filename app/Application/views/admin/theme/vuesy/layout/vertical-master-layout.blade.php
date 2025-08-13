<!doctype html>
<html dir="{{(getDir() == 'rtl')?'rtl':'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
        |
        {{ getSetting('siteTitle') }}
    </title>
    <meta content="Meduo" name="description" />
    <meta content="Meduo" name="author" />

    @include(layoutPath("layout.head"))

</head>
<body data-topbar="dark" data-sidebar="dark" data-layout-mode="dark" data-gr-ext-installed="">
<!-- Begin page -->
<div id="layout-wrapper">
    @include(layoutPath("layout.topbar"))
    @include(layoutPath("layout.sidebar"))

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <!-- Start content -->
            <div class="container-fluid">
                @yield('content')
            </div> <!-- content -->
        </div>
        @include(layoutPath("layout.footer"))
        <a href="javascript:void(0)" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

{{-- right sidebar file here  --}}
@include(layoutPath("layout.right-sidebar"))
@include(layoutPath("layout.vendor-script"))
</body>
</html>
