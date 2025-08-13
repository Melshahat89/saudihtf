<div class="row d-flex  w-100 m-0">
{{--    <div class="col-md-3 filter-container">--}}
{{--        <div class="" style="border: none;" id="{{(isMobile() || (count($items) < 2)) ? '' : 'test1'}}">--}}


{{--            <div class="p-0 filters">--}}
{{--                <div class="filter-title d-flex justify-content-between">--}}
{{--                    <span class="add-to-cart align-self-center">--}}
{{--                        {{ trans('website.Filter') }}--}}
{{--                    </span>--}}
{{--                    <a class="filter-toggle" data-toggle="collapse" href="#multiCollapseExample1" role="button"--}}
{{--                       aria-expanded="true" aria-controls="multiCollapseExample1">--}}
{{--                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}


{{--                <div class="collapse multi-collapse {{(isMobile()) ? '' : 'show'}}" id="multiCollapseExample1">--}}
{{--                    <form action="" method="GET" wire:submit.prevent="updateFilter">--}}
{{--                        <div class="filter-title">--}}
{{--                            <h6 class="mb-10"> {{ trans('website.Search') }} </h6>--}}
{{--                            <div class="rating-filter">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input style="    width: -webkit-fill-available;" type="text" id="key" name="key"--}}
{{--                                           wire:model="key" placeholder="{{trans('website.Search Placeholder')}}">--}}
{{--                                </div>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="filter-title">--}}
{{--                            <h6 class="mb-10"> {{ trans('website.Sort By') }} </h6>--}}
{{--                            <div class="rating-filter">--}}
{{--                                <div class="form-check">--}}
{{--                                    <select class="form-control input-item user-login-ico" id="sort" name="sort"--}}
{{--                                            wire:model="sortBy">--}}
{{--                                        <option value="">{{ trans('website.Release Date') }}</option>--}}
{{--                                        <option value="0"> {{ trans('website.New to old') }} </option>--}}
{{--                                        <option value="1"> {{ trans('website.Old to new') }} </option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="filter-title">--}}
{{--                            <h6 class="mb-10"> {{ trans('website.Speciality') }}</h6>--}}
{{--                            <div class="rating-filter">--}}
{{--                                <div class="form-check">--}}
{{--                                    <select class="form-control input-item user-login-ico" id="categories"--}}
{{--                                            name="categories" wire:model="speciality">--}}
{{--                                        <option value="">{{trans('account.Select specialization')}}</option>--}}
{{--                                        @foreach(allCategories() as $category)--}}
{{--                                            <option value="{{$category->slug}}"> {{$category->name_lang}} </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="filter-title">--}}
{{--                            <h6 class="mb-10"> {{ trans('website.Ratings') }}</h6>--}}
{{--                            <div class="rating-filter">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios1"--}}
{{--                                           value="5" wire:model="rating">--}}
{{--                                    <label class="form-check-label" for="gridRadios1">--}}
{{--                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <span>5.0</span>--}}
{{--                                        </div>--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios2"--}}
{{--                                           value="4" wire:model="rating">--}}
{{--                                    <label class="form-check-label" for="gridRadios2">--}}
{{--                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <span>4.0</span>--}}
{{--                                        </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios3"--}}
{{--                                           value="3" wire:model="rating">--}}
{{--                                    <label class="form-check-label" for="gridRadios3">--}}
{{--                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <span>3.0</span>--}}
{{--                                        </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios4"--}}
{{--                                           value="2" wire:model="rating">--}}
{{--                                    <label class="form-check-label" for="gridRadios4">--}}
{{--                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating checked"></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <i class="star-rating "></i>--}}
{{--                                            <span>2.0</span>--}}
{{--                                        </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if(!$talks && !$events)--}}
{{--                            <div class="filter-title">--}}
{{--                                <h6 class="mb-10"> {{ trans('website.Duration') }}</h6>--}}
{{--                                <div class="rating-filter">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="duration" id="checkoption1"--}}
{{--                                               value="0:2" wire:model="duration">--}}
{{--                                        <label class="form-check-label {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}"--}}
{{--                                               for="checkoption1">--}}
{{--                                            <span>0-2 {{ trans('website.hours') }}</span>--}}
{{--                                    </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="rating-filter">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="duration" id="checkoption2"--}}
{{--                                               value="3:6" wire:model="duration">--}}
{{--                                        <label class="form-check-label {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}"--}}
{{--                                               for="checkoption2">--}}
{{--                                            <span>3-6 {{ trans('website.hours') }}</span>--}}
{{--                                    </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="rating-filter">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="duration" id="checkoption3"--}}
{{--                                               value="7:16" wire:model="duration">--}}
{{--                                        <label class="form-check-label {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}"--}}
{{--                                               for="checkoption3">--}}
{{--                                            <span>7-16 {{ trans('website.hours') }}</span>--}}
{{--                                    </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="rating-filter">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="duration" id="checkoption4"--}}
{{--                                               value="17:100" wire:model="duration">--}}
{{--                                        <label class="form-check-label {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}"--}}
{{--                                               for="checkoption4">--}}
{{--                                            <span>17+ {{ trans('website.hours') }}</span>--}}
{{--                                    </div>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="d-flex">--}}

{{--                    </form>--}}
{{--                    <div class="filter-title">--}}
{{--                        <form class="reset_filter" action="" method="GET" wire:submit.prevent="updateFilter">--}}
{{--                            <button wire:click="resetFilter" type="submit" class="add-to-cart">--}}
{{--                                {{ trans('website.Reset Filter') }}--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
</div>

<!-- المحتوى -->
<div class="col-md-12 d-flex flex-column" style="background-color: #f8f8f8;">
    <div class="flex-grow-1 w-100">
        @if(count($items) > 0)
            @foreach($items as $item)
                @include('website.courses.assets.courseCardList', ['data' => $item])
            @endforeach
        @else
            <div class="w-100 text-center text-muted py-5" >
                {{trans('home.No results found in the search')}}
                <br>
                .....................................................................................................
                .....................................................................................................
                ..............................................................................
            </div>
        @endif
    </div>

    <div class="global-pagenation flexBetween mt-auto">
        {{ $items->links('website.livewire.livewire-pagination') }}
    </div>
</div>
</div>

