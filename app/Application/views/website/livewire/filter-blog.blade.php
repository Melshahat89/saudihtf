<div class="row" style="width: -webkit-fill-available;">
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
                        <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Search') }} </h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <input type="text" id="key" style="width: -webkit-fill-available" name="key" wire:model="key" placeholder="{{trans('website.Search Placeholder')}}">
                                </div>
                                </label>
                            </div>
                        </div>
                        <div class="filter-title">
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
                        </div>
                        <div class="filter-title">
                            <h6 class="mb-10"> {{ trans('website.Speciality') }}</h6>
                            <div class="rating-filter">
                                <div class="form-check">
                                    <select class="form-control input-item user-login-ico" id="categories" name="categories" wire:model="speciality">
                                        <option value="">{{trans('account.Select specialization')}}</option>
                                        @foreach(allBlogCategories() as $category)
                                        <option value="{{$category->slug}}"> {{$category->title_lang}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex">

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
</div>
<div class="{{ (count($items) < 1) ? 'col-12' : 'col-md-9' }}" style="background-color: unset !important;">
    @foreach($items as $item)
    @include('website.blog.postsCardList', ['data' => $item])
    @endforeach

    <div class="global-pagenation flexBetween">
        {{ $items->links('website.livewire.livewire-pagination') }}
    </div>
</div>
</div>