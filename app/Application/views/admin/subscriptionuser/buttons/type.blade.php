@switch($subscription_id)
    @case(1)
        <label class="btn btn-warning">شهري</label>
        @break
    @case(2)
        <label class="btn btn-success">سنوي</label>
        @break
    @default

@endswitch
