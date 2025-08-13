<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">


    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('/')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{URL::asset('vuesy/assets/images/logo-sm.svg')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('vuesy/assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Meduo</span>
            </span>
        </a>

        <a href="{{url('/')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{URL::asset('vuesy/assets/images/logo-sm.svg')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('vuesy/assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Meduo</span>
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

{{--                <li>--}}
{{--                    <a href="{{url('/')}}">--}}
{{--                        <i class="bx bx-home-circle nav-icon"></i>--}}
{{--                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                @php
                    $p = permissionArray();
                @endphp

                @foreach(getMenu('Admin') as $admin)
                    @if($admin['item']['id'] == 21 || $admin['item']['id'] == 28)
                        @if(env('APP_ENV') == 'local' )
                            <li>
                                @if(array_key_exists('item' , $admin))
                                    @if(array_intersect($admin['item']['controller_path']  ,$p))
                                        <a href="{{ array_key_exists('sub' , $admin) ? 'javascript:void(0);' : url($admin['item']['link']) }}"
                                           class="{{ array_key_exists('sub' , $admin) ? 'menu-toggle has-arrow' : '' }}">
                                            <i class="bx bx-book nav-icon"></i>

                                        @if(array_key_exists('sub' , $admin))
{{--                                                <span class="menu-caret">--}}
{{--                                                  <i class="material-icons">arrow_drop_down</i>--}}
{{--                                                </span>--}}

                                            @endif
{{--                                            {!! $admin['item']['icon'] != null ? $admin['item']['icon']:  '' !!}--}}
                                            <span>
                                                {{ getDefaultValueKey($admin['item']['name']) }}
                                            </span>
                                        </a>
                                    @endif
                                @endif
                                @if(array_key_exists('sub' , $admin))
                                    <ul class="sub-menu">
                                        @foreach($admin['sub']  as $sub)
                                            @if(array_intersect($sub['controller_path']  ,$p))
                                                <li>
                                                    <a href="{{ url($sub['link']) }}" class=" waves-effect waves-block">
                                                        {!! $sub['icon'] != null ? $sub['icon']:  '' !!}
                                                        <span>
                                     {{ getDefaultValueKey($sub['name']) }}
                                </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @else
                        <li>
                            @if(array_key_exists('item' , $admin))
                                @if(array_intersect($admin['item']['controller_path']  ,$p))
                                    <a href="{{ array_key_exists('sub' , $admin) ? 'javascript:void(0);' : url($admin['item']['link']) }}"
                                       class="{{ array_key_exists('sub' , $admin) ? 'menu-toggle has-arrow' : '' }}">
                                        <i class="bx bx-book nav-icon"></i>
                                        @if(array_key_exists('sub' , $admin))
{{--                                            <span class="menu-caret">--}}
{{--                              <i class="material-icons">arrow_drop_down</i>--}}
{{--                            </span>--}}
                                            <span class="menu-item" data-key="t-timeline"></span>
                                        @endif

{{--                                        {!! $admin['item']['icon'] != null ? $admin['item']['icon']:  '' !!}--}}
                                        <span>
                            {{ getDefaultValueKey($admin['item']['name']) }}
                        </span>
                                    </a>
                                @endif
                            @endif

                            @if(array_key_exists('sub' , $admin))

                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach($admin['sub']  as $sub)
                                        @if(array_intersect($sub['controller_path'] ,$p))
                                            @if($sub['id'] == 13 ||$sub['id'] == 12 ||$sub['id'] == 11||$sub['id'] == 14||$sub['id'] == 15 )
                                                @if(env('APP_ENV') == 'local' )
                                                    <li>
                                                        <a href="{{ url($sub['link']) }}" class=" waves-effect waves-block">
                                                            {!! $sub['icon'] != null ? $sub['icon']:  '' !!}
                                                            <span>
                                                 {{ getDefaultValueKey($sub['name']) }}
                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @else
                                                <li>
                                                    <a href="{{ url($sub['link']) }}" class=" waves-effect waves-block">
                                                        {!! $sub['icon'] != null ? $sub['icon']:  '' !!}
                                                        <span>
                                                 {{ getDefaultValueKey($sub['name']) }}
                                            </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endif
                @endforeach



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->