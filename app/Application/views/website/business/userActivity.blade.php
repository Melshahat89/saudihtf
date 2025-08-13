@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.User activity log') }}
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
            <h3 class="panel-title">{{ trans('businessdata.User activity log') }}</h3>

        </div>

        <div class="panel-body">
            <div class="row brdr-top brdr-bottom ptm-20 m-0">
                <div class="flexCenter col-md-6">
                    {{-- <span class="mr-15">{{ trans('businessdata.Filter') }}</span>
                    <select class="form-control">
                        <option value="Courses">Most Enrolled Courses</option>

                    </select> --}}
                </div>
                <div class="col-md-6 mt-res-15">
                    {{-- <form>
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Search users by Course Name ...">
                            <span class="input-group-btn"><button type="button" class="btn btn-primary"><i
                                        class="lnr lnr-magnifier"></i></button></span>
                        </div>
                    </form> --}}
                </div>
            </div>

            <span class="dividar-grey"></span>
            <div class="table-res-scroll">
                <table class="table table-striped" id="user-activity-table">
                    <thead>
                        <tr>
                            <th>{{ trans('businessdata.User Name') }}</th>
                            <th>{{ trans('website.Email') }}</th>
                            <th>{{ trans('website.Courses') }}</th>
                            <th>
                                {{ trans('businessdata.Activity Type') }}
                            </th>
                            <th>
                                {{ trans('businessdata.Activity Date') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($logs)
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->user->email }}</td>
                                    <td>{{ $log->courses->title_lang }}</td>
                                    <td>{{ $log->getActionType() }}</td>
                                    <td>
                                        {{ $log->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('business') }}/vendor/chartist/js/chartist.min.js"></script>
    <script>
        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'));
            maxDate = new DateTime($('#max'));

            table = $('#user-activity-table').DataTable( {
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