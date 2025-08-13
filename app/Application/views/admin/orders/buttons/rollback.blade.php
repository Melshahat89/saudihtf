@if($status == App\Application\Model\Orders::STATUS_SUCCEEDED)
<a href="{{ url('/lazyadmin/orders/rollback/'.$id) }}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
    Rollback
</a>
@endif