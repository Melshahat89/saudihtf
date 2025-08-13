{{--@include(layoutBreadcrumb())--}}
<div class="container-fluid">
    <div class="card">
        <div class="card-block">
            @php $button = isset($button) ? $button : true @endphp
            <div class="card-header no-bg b-a-0">
                @if(getDir() == 'rtl')
                    <h2 class="pull-right">
                        @else
                            <h2 class="pull-left">
                                @endif
                                {{ isset($action) ? ucfirst($action) : trans('home.control') }}  {{ ucfirst($title) }}
                            </h2>
                            @if($button == true)
                                @if(getDir() == 'rtl')
                                    <h2 class="pull-left">
                                        @else
                                            <h2 class="pull-right">
                                                @endif
                                                <a href="{{ url('lazyadmin/'.$model.'/item') }}"
                                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                                <i class="mdi mdi-plus me-1"></i> {{ trans('home.add') }} {{ ucfirst($title) }}
                                                </a>
                                                </span>
                                                @endif
                                                <div class="clearfix"></div>
            </div>

            <div class="search" >
                <div class="pull-{{ getDirection() }}">
                    @stack('header')
                </div>
                <div class="pull-{{ getDirection() }}" style="padding-{{ getDirection() }}: 10px;">
                    @stack('search')
                </div>
            </div>
            <div class="clearfix" style="margin-bottom: 20px"></div>
            <div class="body">
                {!! $table !!}
            </div>
            <div class="clearfix"></div>
            <div class="search" style="padding-bottom: 10px">
                <div class="pull-{{ getDirection() }}">
                    @stack('header')
                </div>
                <div class="pull-{{ getDirection() }}" style="padding-{{ getDirection() }}: 10px;">
                    @stack('search')
                </div>
            </div>
        </div>
    </div>
</div>
