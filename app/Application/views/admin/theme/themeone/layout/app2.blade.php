@yield('content')
<script src="{{ url('website') }}/js/admin/jquery.min.js"></script>
<script src="{{ url('website/js/select2.min.js') }}"></script>
<script type="application/javascript">
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
