
<header class="p-3">
    <div class="wrapper">
        <nav class="p-0 navbar navbar-expand-lg navbar-new d-flex justify-content-between">
            <a class="m-0 navbar-brand" href="/">
                <img src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png" loading="lazy" alt="" width="150">
            </a>

            <a href="#" data-toggle="modal" data-target="#searchmodal"><i class="fas fa-search d-none" id="header-search-icon"></i></a>
            <div class="d-flex align-items-center">
                
            <div class="dropdown">
                <button class="dropbtn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" ></span>
                </button>
                <div class="dropdown-content">
                    <div class="navigation-primary">
                        <ul class="pl-2 pr-2 collapse navbar-collapse navbar-nav " id="navbarSupportedContent" style="margin: revert;">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">{{trans('home.home')}} <span class="sr-only">(current)</span></a>
                            </li>
{{--                            <li><a class="nav-link dropdown-toggle"> تخصصات العمل الحر</a>--}}
{{--                                <ul class="sub-menu">--}}
{{--                                    @foreach(menuFutureWorkCategories() as $catF)--}}
{{--                                        @if(!$catF->childs->isEmpty())--}}
{{--                                            <li><a>  {{$catF->name_lang}}  <i class="fas fa-angle-down"></i> </a>--}}
{{--                                                <ul class="sub-menu">--}}
{{--                                                    @foreach($catF->childs as $childF)--}}
{{--                                                        @if($childF->show_menu)--}}
{{--                                                            <li><a href="/allcourses/category/{{$childF->slug}}">{{$childF->name_lang}}</a></li>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        @else--}}
{{--                                            @if(!$catF->parent_id)--}}
{{--                                                <li><a class="dropdown-item" href="/allcourses/category/{{$catF->slug}}">{{$catF->name_lang}}</a></li>--}}
{{--                                            @endif--}}

{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li><a class="nav-link dropdown-toggle">                                    تخصصات عامة
                                </a>
                                <ul class="sub-menu">
                                    @foreach(menuCategories() as $cat)
                                        @if(!$cat->childs->isEmpty())
                                            <li><a>  {{$cat->name_lang}}  <i class="fas fa-angle-down"></i> </a>
                                                <ul class="sub-menu">
                                                    @foreach($cat->childs as $child)
                                                        @if($child->show_menu)
                                                            <li><a href="/allcourses/category/{{$child->slug}}">{{$child->name_lang}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            @if(!$cat->parent_id)
                                                <li><a class="dropdown-item" href="/allcourses/category/{{$cat->slug}}">{{$cat->name_lang}}</a></li>
                                            @endif

                                        @endif
                                    @endforeach
                                </ul>
                            </li>

{{--                            <li class="nav-item active">--}}
{{--                                <a class="nav-link" href="https://igtsservice.com/blog">{{trans('home.blog')}} <span class="sr-only"></span></a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item active">--}}
{{--                                <a class="nav-link button home-slider-button button_small text_capitalize slider-cta" href="{{url('/subscriptions')}}">{{trans('b2b.subscriptions')}} <span class="sr-only"></span></a>--}}
{{--                            </li>--}}

                            <li class="nav-item active">
                                <a class="nav-link" href="#">{{ trans('home.Professional Certificates') }}</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="pl-2 pr-2 collapse navbar-collapse" id="navbarSupportedContent">
                <form class="pl-2 pr-2 search-bar desktop-search" action="/allcourses/category" method="GET">
                    <div class="search-input">
                        <a href="" target="_blank" hidden></a>
                        <label for="key" class="ml-3 mr-3 search-bar-label"><i class="fas fa-search"></i></label>
                        <input class="pt-4 pb-4 pl-5 pr-5 search-input-input" type="text" placeholder="{{trans('home.search placeholder')}}" name='key' autocomplete="off">
                        <div class="autocom-box" style="position: absolute;width: 100%;background: #fff;border-radius: 5px;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);margin-top: 8px; font-size: 15px; z-index: 3;"></div>
                    </div>
                </form>
            </div>

            </div>
            @if(Auth::check())
                <div class="pt-2 {{ isMobile() ? 'w-100 d-flex justify-content-between' : ''}}">
{{--                    <div class="d-inline-block desktop-account-info-padding align-self-center"><a href="{{LaravelLocalization::getLocalizedURL((config('app.locale') == 'en') ? 'ar':'en') }}" style="color: #326478;font-weight: bold;"><i class="fas fa-globe"></i> {{trans('website.other lang')}} </a></div>--}}
{{--                    <a href="/cart"><div class="head_cart d-inline-block align-self-center"><span class="floated_count">{{ count(getShoppingCart()) }}</span><a href="/cart" class="head_cart_icon"></a></div></a>--}}
                    <div class="d-inline-block desktop-account-info-padding">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="{{ large1(Auth::user()->image) }}" width="38">
                            <span class="avatar_name">
{{--                                {{ charlimit(Auth::user()->name, 10) }}--}}
                                {{ explode(' ', Auth::user()->name)[0] }}

                            </span>
                        </a>
                        <div class="nav-item dropdown d-block">
                            <div class="dropdown-menu" aria-labelledby="userMenuDropdown">
                                @if(Auth::user()->group_id == 1 || Auth::user()->group_id == 9 || Auth::user()->group_id == 10 || Auth::user()->group_id == 11 || Auth::user()->group_id == 12 || Auth::user()->group_id == 13 || Auth::user()->group_id == 14 || Auth::user()->group_id == 15 || Auth::user()->group_id == 19 || Auth::user()->group_id == 16)
                                    <a href="/lazyadmin" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('home.UserType1')}}</a>
                                @endif
                                @if((Auth::user()->group_id == 6))
                                    <a class="dropdown-item" href="{{url('business/home')}}">{{trans('businessdata.Dashboard')}}</a>
                                @endif

                                @if(isValidBusiness(Auth::user()->businessdata_id))
                                    @php
                                        $businessdata = \App\Application\Model\Businessdata::findOrfail(Auth::user()->businessdata_id);
                                    @endphp


                                    <a class="dropdown-item" href="{{url('business/businessCourses')}}">
                                        <i class="fas fa-home"></i>
                                        {{trans('courses.businessCourses')}} ({{$businessdata->name_lang}})
                                    </a>

                                    @if((Auth::user()->group_id == App\Application\Model\User::TYPE_GROUP_ADMIN) AND Auth::user()->businessGroupAdmin)
                                        <a class="dropdown-item" href="{{url('business/mygroup')}}">
                                            <i class="fas fa-home"></i>
                                            {{trans('courses.my group')}} ({{$businessdata->name_lang}})
                                        </a>
                                    @endif


                                @endif


                                @if(Auth::user()->is_affiliate OR Auth::user()->group_id == 3)
                                    <a href="/account/analysis" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('home.analysis')}}</a>
                                @endif
                                @if(Auth::user()->group_id == 17)
                                    <a href="/account/consultantanalysis" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('home.analysis')}}</a>
                                @endif
                                <a href="/account/myCourses" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('home.my courses')}}</a>
                                <a href="/account/myProgress#weekly_goal" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('account.My Progress')}}</a>
                                <a href="/account/myProgress" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('account.my notes')}}</a>
                                <a href="/account/myFavourites" class="dropdown-item"><i class="fas fa-heart"></i> {{trans('home.my favorites')}}</a>
                                <a href="/account/myCertificates" class="dropdown-item"><i class="fas fa-certificate"></i> {{trans('home.my certificates')}}</a>

                                @isset(Auth::user()->subscription)
                                    <a href="/account/mySubscriptions" class="dropdown-item"><i class="fas fa-graduation-cap"></i> {{trans('courses.mySubscriptions')}}</a>
                                @endisset


                                <div class="divider"></div>
                                <a href="/account/edit" class="dropdown-item"><i class="fas fa-cog"></i> {{trans('home.account info')}}</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> {{trans('home.logout')}}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="pt-2 {{ isMobile() ? 'w-100 d-flex justify-content-between' : ''}}">                       
                    <button type="button" data-dismiss="modal" data-remote="/register" data-toggle="modal" data-target="#registerModal" class="m-1 bg-transparent border-0 reg-button">{{trans('home.signup')}}</button>   
                    <button type="button"  data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="m-1 login-button">{{trans('home.signin')}}</button>
                </div>
            @endif
        </nav>
    </div>
</header>

<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background: transparent; border: 0;">
            <div class="modal-header flexRight">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-0 modal-body">
                <div class="m-search-modal">
                    <form class="pl-2 pr-2 search-bar" action="/allcourses/category" method="GET">
                        <div class="mobile-search-input">
                            <a href="" target="_blank" hidden></a>
                            <label for="key" class="ml-3 mr-3 search-bar-label"><i class="fas fa-search"></i></label>
                            <input class="pt-4 pb-4 pl-5 pr-5 search-input-input" type="text" placeholder="{{trans('home.search placeholder')}}" name='key' value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}" autocomplete="off">
                            <div class="autocom-box" style="position: absolute;width: 89%;background: #fff;border-radius: 5px;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);margin-top: 8px; font-size: 15px; z-index: 3;"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('click', function (event) {
            var dropdown = document.getElementById('navbarSupportedContent');
            var toggleButton = document.querySelector('.navbar-toggler');

            // إذا كانت القائمة مفتوحة وتم الضغط خارجها وخارج زر التفعيل
            if (
                dropdown.classList.contains('show') &&
                !dropdown.contains(event.target) &&
                !toggleButton.contains(event.target)
            ) {
                // إغلاق القائمة يدويًا باستخدام jQuery أو Bootstrap collapse
                $('#navbarSupportedContent').collapse('hide');
            }
        });
    });
</script>


@include('website.theme.bootstrap.layout.igts.shared.search-box-scripts')