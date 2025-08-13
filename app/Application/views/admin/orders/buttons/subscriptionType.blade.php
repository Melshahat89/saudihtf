@switch($subscription_type)
    @case(1)
        <label class="btn btn-warning">Monthly</label>
        @break
    @case(2)
        <label class="btn btn-success">Annual</label>
        @break
    @default

    @endswitch
