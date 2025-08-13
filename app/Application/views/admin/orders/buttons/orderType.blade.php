@switch($type)
    @case(1)
        <label class="btn btn-warning">ONLINE</label>
        @break
    @case(2)
        <label class="btn btn-success">OFFLINE</label>
        @break
    @case(3)
        <label class="btn btn-success">B2B</label>
        @break
    @case(4)
        <label class="btn btn-danger">B2C</label>
        @break
    @default
        <label class="btn btn-warning">ONLINE</label>
@endswitch
