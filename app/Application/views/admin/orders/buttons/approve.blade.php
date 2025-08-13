<a href="{{ url('/lazyadmin/orders/'.$id.'/approve') }}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float {{ ($status == \App\Application\Model\Orders::STATUS_SUCCEEDED) ? 'disabled' : '' }}">
    Click
</a>