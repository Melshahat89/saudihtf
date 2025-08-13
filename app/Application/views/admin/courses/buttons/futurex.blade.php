<!-- Duplicated courses with there included courses -->
@if ($futurexid)
    {{$futurexid}}
@else
    <a href="{{ url('/lazyadmin/courses/'.$id.'/createaFuturexIdCourse') }}" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
        + Create Futurex
    </a>
@endif
