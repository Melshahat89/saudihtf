@yield('scripts')
<!-- JAVASCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="{{ URL::asset('vuesy/assets/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('vuesy/assets/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ URL::asset('vuesy/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('vuesy/assets/libs/feather-icons/feather.min.js') }}"></script>


@yield('script')
<!-- {{--<script src="{{ URL::asset('vuesy/assets/js/pages/dashboard.init.js') }}"></script>--}} -->
<script src="{{ URL::asset('vuesy/assets/js/app.js') }}"></script>
@yield('script-bottom')


{{ Html::script('js/sweetalert.min.js') }}

<script src="{{ url('website/js/moment.js') }}"></script>
<script src="{{ url('website/js/bootstrap-datetimepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
<!-- {{--<script src="{{ url('website/js/fontawesome-iconpicker.min.js') }}"></script>--}}
{{--<script>--}}
{{--    $('.icon-field').iconpicker();--}}
{{--</script>--}} -->

<script src="{{ url('website/js/admin/custom-admin.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@include('sweet::alert')
@endyield