<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
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
        <button type="button" class="btn btn-sm px-3 header-item vertical-menu-btn noti-icon">
                        <i class="fa fa-fw fa-bars font-size-16"></i>
                    </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-block d-lg-none">
                <button type="button" class="btn header-item noti-icon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-search icon-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

           <div class="dropdown d-inline-block language-switch">
                <button type="button" class="btn header-item noti-icon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-globe"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item"  class="dropdown-item notify-item language" hreflang="{{$localeCode}}"
                           href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                            <span class="align-middle">{{ $properties['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>



            <div class="dropdown d-inline-block d-none">
                <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                    <i class="bx bx-cog icon-sm"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{large(auth()->user()->image)}}"
                    alt="Header Avatar">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name">{{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                    <a class="dropdown-item" href="/lazyadmin/user/item/{{auth()->user()->id}}"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Logout</span></a>
                </div>
            </div>
        </div>
    </div>




</header>