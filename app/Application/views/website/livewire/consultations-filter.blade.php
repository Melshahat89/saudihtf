<div class="row">
    <div class="col-md-3">
        <div class="ptmd pbmd prmd plmd b_all" style="border: none; width: 300px;" id="{{(isMobile() || (count($items) < 2)) ? '' : 'test1'}}">
            <div class="filters p-0">
                <div class="filter-title  d-flex justify-content-between">
                    <span class="add-to-cart align-self-center">
                        {{ trans('website.Filter') }}
                    </span>
                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1"><i class="fas fa-bars"></i></a>
                </div>
                <div class="collapse multi-collapse {{(isMobile()) ? '' : 'show'}}" id="multiCollapseExample1">
                    <form action="" method="GET" wire:submit.prevent="updateFilter">
                    <!-- <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Search') }} </h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <input type="text" id="key" name="key" wire:model="key" placeholder="{{trans('website.Search Placeholder')}}">
                                </div>
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Sort By') }} </h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <select class="form-control input-item user-login-ico" id="sort" name="sort" wire:model="sortBy">
                                        <option value="">{{ trans('website.Release Date') }}</option>
                                        <option value="0"> {{ trans('website.New to old') }} </option>
                                        <option value="1"> {{ trans('website.Old to new') }} </option>
                                    </select>
                                </div>
                                </label>
                            </div>
                        </div> -->
                        <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Speciality') }}</h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <select class="form-control input-item user-login-ico" id="categories" name="categories" wire:model="speciality">
                                        <option value="">{{trans('account.Select specialization')}}</option>
                                        @foreach(allConsultationCategories() as $category)
                                            <option value="{{$category->slug}}"> {{$category->name_lang}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                </label>
                            </div>
                        </div>
                        <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Ratings') }}</h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios1" value="5" wire:model="rating">
                                    <label class="form-check-label" for="gridRadios1">
                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <span>5.0</span>
                                        </div>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios2" value="4" wire:model="rating">
                                    <label class="form-check-label" for="gridRadios2">
                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating "></i>
                                            <span>4.0</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios3" value="3" wire:model="rating">
                                    <label class="form-check-label" for="gridRadios3">
                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating "></i>
                                            <i class="star-rating "></i>
                                            <span>3.0</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="gridRadios4" value="2" wire:model="rating">
                                    <label class="form-check-label" for="gridRadios4">
                                        <div class="card-rating {{ (getDir() == 'rtl') ? 'mr-4' : 'ml-4' }}">
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating checked"></i>
                                            <i class="star-rating "></i>
                                            <i class="star-rating "></i>
                                            <i class="star-rating "></i>
                                            <span>2.0</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                                                   
                    </form>
                    <div class="filter-title">
                        <form class="reset_filter" action="" method="GET" wire:submit.prevent="updateFilter">
                            <button wire:click="resetFilter" type="submit" class="add-to-cart">
                                {{ trans('website.Reset Filter') }}
                            </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-9" style="background-color: unset !important;">
        @foreach($items as $item)
            @include('website.consultations.assets.consultantsCardList', ['data' => $item])
        @endforeach
    </div>
</div>
