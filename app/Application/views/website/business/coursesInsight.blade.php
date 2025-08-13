@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Courses Insight') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection
@section('content')


    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.Courses Insight') }}</h3>
        </div>

        <div class="panel-body">
            <div class="table-res-scroll">
                <table class="table table-striped" id="course-insights-table">
{{--                    <table class="table table-striped" id="enrollments-table">--}}
                    <thead>
                        <tr>

                            <th>{{ trans('businessdata.Course Name') }}</th>

                            <th>
                                {{ trans('businessdata.Number of enrollments') }}
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($Enrollments)
                            @foreach ($Enrollments as $key => $enroll)
                                @if($enroll['Count'] > 0 && $enroll->courses_id)
                                <tr>
                                    <td>{{ $enroll->courses['title_lang'] }}</td>

                                    <td>
                                        {{ $enroll->Count }} {{ trans('businessdata.enrollment') }}
                                    </td>
                                    <td>
                                        <div class="progress" style="  background-color: #9b9b9b;">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $CoutEnrollments > 0 ? ($enroll->Count / $CoutEnrollments) * 100 : 0 }}"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $businessdata->CoutEnrollments > 0 ? ($enroll->Count / $businessdata->CoutEnrollments) * 100 : 0 }}%;   ">
                                                <span>{{ round($CoutEnrollments > 0 ? ($enroll->Count / $CoutEnrollments) * 100 : 0)  }}%</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                        @endisset

                    </tbody>
                </table>
            </div>

            <div class="row mt-40" style="display: none;">
                <div class="col-md-2 text-center">
                    <div id="enrollment-load" class="easy-pie-chart" data-percent="{{ $businessdata->licenses > 0 ? ($businessdata->CoutEnrollments / $businessdata->licenses) * 100 : 0 }}">
                        <span class="percent">{{ $businessdata->licenses > 0 ? ($businessdata->CoutEnrollments / $businessdata->licenses) * 100 : 0 }}</span>
                        <canvas height="130" width="130"></canvas>
                       
                    </div>
                    <h4><strong>{{ trans('businessdata.Enrollments') }}</strong></h4>
                </div>
                <div class="col-md-10 flexCenter">
                    <div>
                        <h3 class="bold">{{ $businessdata->CoutEnrollments }} {{ trans('businessdata.Enrollments') }} </h3>
                        <p>
                        </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('businessdata.Most Enrolled Courses') }} - 10</h3>
                        </div>
                        <div class="panel-body">
                            <div id="demo-line-chart" class="ct-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="{{ asset('business') }}/vendor/chartist/js/chartist.min.js"></script>
<script>
    $(function() {
    var data, options;

    // enrollment-load pie chart
    var sysLoad = $('#enrollment-load').easyPieChart({
        size: 130,
        barColor: function(percent) {
            return (percent < 50 ? '#FF0000' : percent < 85 ? '#00CB14' : '#00CB14');
        },
        trackColor: 'rgba(245, 245, 245, 0.8)',
        scaleColor: false,
        lineWidth: 15,
        lineCap: "square",
        animate: 800
    });

    


});
    </script>
    <script>
        $(function() {
            var options;
    
            var data = {
                labels: [
                    @foreach($EnrollmentsTop as $key => $value)
                    @isset($value->courses)
                        '{{$value->courses['title_lang']}}',
                    @endisset
                    @endforeach

                ],
                series: [
                    
                    [
    
                    @foreach($EnrollmentsTop as $key => $value)
                        @isset($value['Count'])
                        '{{$value['Count']}}',
                        @endisset
                    @endforeach
                    
                    
                    ],
                ]
            };

            // line chart
            options = {
                height: "300px",
                showPoint: true,
                axisX: {
                    showGrid: false
                },
                lineSmooth: true,
            };

            new Chartist.Line('#demo-line-chart', data, options);






            var options = {
                fullWidth: true,
                lineSmooth: false,
                height: "270px",
                low: 0,
                high: 'auto',
                series: {
                    'series-projection': {
                        showArea: true,
                        showPoint: false,
                        showLine: false
                    },
                },
                axisX: {
                    showGrid: false,

                },
                axisY: {
                    showGrid: false,
                    onlyInteger: true,
                    offset: 0,
                },
                chartPadding: {
                    left: 20,
                    right: 20
                }
            };
    
            new Chartist.Line('#multiple-chart', data, options);
    
        });
        </script>

<script>


$(document).ready(function() {

    // Create date inputs
    minDate = new DateTime($('#min'));
    maxDate = new DateTime($('#max'));

    table = $('#course-insights-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    } );

    var data = table.buttons.exportData();
    console.log(table.row().data());

} );

</script>
@endpush