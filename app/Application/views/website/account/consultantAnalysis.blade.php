@extends(layoutExtend('website'))
@section('title')
    {{ trans('website.Analysis') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection
<?php

use App\Application\Model\Consultationsrequests;
use App\Application\Model\User;
use App\Application\Model\Transactions;
?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">

@section('content')

    <div class="bread-crumb">
        <div class="container">
            <a href="/">{{ trans('website.home') }}</a> > 
            <span> {{ trans('website.Analysis') }} </span>
        </div>
    </div>

    <div class="page-title general-gred">
        <div class="container">
            <h1>{{ trans('website.Analysis') }}</h1>
            <p class="mt-15">
            </p>
        </div>
    </div>


    <div class="page-title profile-area dark-gred">
        <div class="container">
    
            <div class="flexLeft">
                <div class="mr-20">
                    <a href="#">
                        <img    src="{{ large(Auth::user()->image) }}"  class="rounded">
    
                    </a>
                </div>
                <div>
                    <h3>{{ Auth::user()->fullname_lang  }}</h3>
                    <p>{{ Auth::user()->title_lang  }}</p>
                </div>
            </div>
    
        </div>
    </div>

    <section class="about-instructor talk-course-content">
        <div class="container">
    
    
            <div class="flexBetween">
    
                <h1 class="mb-20"> {{ trans('account.analysis') }} </h1>
    
                <!-- <a class="view-more-section" id="go-to-next-question" href="{{ url('instructors') }}">
                    <span> {{ trans('account.Instructors List') }}</span> <i class="flaticon-right-arrow-1"></i></a> -->
    
            </div>
    
                <form method="GET" action="#">
                <div class="form-group col-md-6 d-flex">
                    <div class="p-2">
                        <input type="text" id="all_from" name="from" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
                    </div>
                    <div class="p-2">
                        <input type="text" id="all_to" name="to" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">    
                    </div>
                    <div class="p-2">
                        <button type="submit" style="font-weight: bold;background: #147ba6;" class="btn btn-primary">{{trans('account.Filter')}}</button>
                    </div>
                    <div class="p-2">
                        <a type="button" href="/account/analysis" style="font-weight: bold;" class="btn btn-danger">X</a>
                    </div>
                </div>
            </form>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="flexCol total-student content-block">
                        <p> {{ trans('account.Total Consultations') }} </p>
                        <h1>{{ $enrolledStudents }}</h1>
                        </div>
                    </div>
    
                <div class="col-md-6 ">
                    <div class="flexCol total-courses content-block">
                        <p>{{ trans('account.Total Pages') }}</p>
                        <h1><?= count($model->consultantConsultations);?></h1>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="flexCol total-Reviews content-block">
                        <p>{{ trans('account.Reviews') }}</p>
                        <h1><?= $model->ConsultantRating;?></h1>
                    </div>
                </div>
    
                <div class="col-md-6 ">
                    <div class="flexCol total-student content-block">
                        <p>
                            {{ trans('account.Revenue') }}
                        </p>
                        <h1>
                            {{ round($totalRevenue) }}
                        </h1>
                    </div>
                </div>
            </div>
            
            <div class="Statistics mt-40 mb-40">
                <h5 class="mb-20"> <i class="statistics-ico"> </i> 
                    <strong>
                    {{ trans('account.Consultations Statistics') }}
                    </strong>
                </h5>
                @foreach ($myConsultations as $consultation)
                    <div class="Statistics-line">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-img">
                                            <img class="w-100" src="{{large($consultation->image)}}" alt="{{ nl2br($consultation->title_lang) }}" >                                               
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-item">
                                            <p class="card-date">{{trans('website.Last updated')}}: {{$consultation->created_at }}</p>
                                            <h6>
                                                {{ nl2br($consultation->title_lang) }}
                                            </h6>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="st-block">
                                            <p>  {{ trans('account.Total Consultations') }} </p>
                                            <h1>{{ isset($from) && isset($to) ? $consultation->getConsultationCountStudentsFromTo($from, $to) : $consultation->ConsultationCountStudents }}</h1>
                                        </div>
    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="re-block">
                                            <p> {{ trans('account.Reviews') }} </p></p>
                                            <h1>{{ round($consultation->ConsultationRating,2)  }}  </h1>
                                        </div>
    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="rn-block">
                                            <p>{{ trans('account.Revenue') }}</p>
                                            <h1>
                                                {{ isset($from) && isset($to) ? round($course->getConsultationRevenueFromTo($from, $to)) : round($consultation->ConsultationRevenue) }}
                                            </h1>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
    

    <section class="about-instructor talk-course-content">
        <div class="container">
            <div class="Statistics mt-40 mb-40">
                <h5 class="mb-20"> <i class="statistics-ico"> </i> 
                    <strong>
                    {{ trans('account.Consultation Requests') }}
                    </strong>
                </h5>
            </div>

            <!-- <div class="form-group col-md-6 d-flex">
                <div class="p-2">
                    <input type="text" id="min" name="min" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
                </div>
                <div class="p-2">
                    <input type="text" id="max" name="max" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">    
                </div>
                <div class="p-2">
                    <button type="button" onclick="resetDataTableFilter()" style="font-weight: bold;" class="btn btn-danger">X</button>
                </div>
            </div> -->

                <table class="table table-striped nopaddingmargin p-4" id="consultationrequests-table">
                    <thead>
                        <tr>
                            <th class="{{ (isMobile()) ? 'd-none' : '' }}">{{ trans('account.ID') }}</th>
                            <th>{{ trans('account.Consultation') }}</th>
                            <th>{{ trans('account.User') }}</th>
                            <th>{{ trans('account.Message') }}</th>
                            <th>
                                {{ trans('account.Scheduled At') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($model->consultantConsultations as $consultation)
                        @foreach($consultation->consultationrequests as $request)
                        @if($request->status == Consultationsrequests::STATUS_DONE)
                        <tr>
                            <td class="{{ (isMobile()) ? 'd-none' : '' }}">{{ $request->id }}</td>
                            <td>{{ $consultation->title_lang }}</td>
                            <td>{{ $request->user->email }}</td>
                            <td>{{ $request->request }}</td>
                            <td>{{ $request->scheduled_at }}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach  
                    </tbody>
                </table>
        </div>
    </section>

     {{--   <section class="about-instructor talk-course-content">
        <div class="container">
            <div class="Statistics mt-40 mb-40">
                <h5 class="mb-20"> <i class="statistics-ico"> </i> 
                    <strong>
                    {{ trans('account.Transactions History') }}
                    </strong>
                </h5>
            </div>

            <div class="form-group col-md-6 d-flex">
                <div class="p-2">
                    <input type="text" id="min" name="min" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
                </div>
                <div class="p-2">
                    <input type="text" id="max" name="max" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">    
                </div>
                <div class="p-2">
                    <button type="button" onclick="resetDataTableFilter()" style="font-weight: bold;" class="btn btn-danger">X</button>
                </div>
            </div>

                <table class="table table-striped nopaddingmargin p-4" id="transactions-table">
                    <thead>
                        <tr>
                            <th class="{{ (isMobile()) ? 'd-none' : '' }}">{{ trans('account.ID') }}</th>
                            <th>{{ trans('account.Course') }}</th>
                            <th>{{ trans('account.Total Amount') }}</th>
                            <th class="{{ (isMobile()) ? 'd-none' : '' }}">{{ trans('account.Percentage') }}</th>
                            <th>
                                {{ trans('account.Your Cut') }}
                            </th>
                            <th>
                                {{ trans('account.Date') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td class="{{ (isMobile()) ? 'd-none' : '' }}">{{ $transaction->id }}</td>
                            <td>{{ $transaction->courses->title_lang }}</td>
                            <td>{{ $transaction->price }}</td>
                            <td class="{{ (isMobile()) ? 'd-none' : '' }}">{{ $transaction->percent }}%</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->date }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </section>
    
    --}}
    
    <div class="modal fade" id="revenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header flexRight">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-rev p-0">
                    <h1>
                        Amount
                    </h1>
    
                    <div  class="text-center">
                        <p>
                            Total
                        </p>
                        <h2><strong>$4500.52</strong></h2>
                    </div>
    
                    <form>
                        <div class="input-group mb-20">
                            <input type="text" class="form-control input-item" placeholder="Your Amount ex: $50" aria-label="Username">
                        </div>
                        <a class="view-more-section w-100 text-center mb-20" href="Payment-request.html">Next</a>
                    </form>
    
    
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>

<script>

var minDate, maxDate, table;


// Custom filtering function which will search data in column four between two values
// $.fn.dataTable.ext.search.push(
//     function( settings, data, dataIndex ) {

//         var min = minDate.val();
//         var max = (!maxDate.val()) ? Date.now() : maxDate.val();
//         var date = new Date( data[5] );
        
//         if (
//             ( min === null && max === null ) ||
//             ( min === null && date <= max ) ||
//             ( min <= date   && max === null ) ||
//             ( min <= date   && date <= max ) 
//         ) {
//             return true;
//         }
//         return false;
//     }
// );



$(document).ready(function() {
    $.noConflict();

        // Create date inputs
        minDate = new DateTime($('#min'), {
    });
    maxDate = new DateTime($('#max'), {

    });

    var dateFrom = new DateTime($('#all_from'));
    var dateTo = new DateTime($('#all_to'));

    // courseValue = $('#courses option:selected').text();

 
    // DataTables initialisation
    table = $('#transactions-table').DataTable( {
        dom: 'Bfrtip',
        pagingType: "simple",
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    } );

    $table2 = $('#consultationrequests-table').DataTable({
        dom: 'Bfrtip',
        pagingType: "simple",
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });
 
    // Refilter the table
    $('#min, #max, #courses, #filter-group option:selected').on('change', function () {
        //alert('test');
        table.draw();
    });

 
    

} );

function resetDataTableFilter(){
    $('#min').val(null);
    $('#max').val(null);
    $('#courses').val(null);

    $.fn.dataTableExt.afnFiltering.length = 0;
        table.draw();


}


</script>