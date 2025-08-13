@extends(layoutExtend())
 @section('title')
    {{ trans('consultationsrequests.consultationsrequests') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('consultationsrequests.consultationsrequests') , 'model' => 'consultationsrequests' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/consultationsrequests/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('consultationsrequests.consultationsrequests') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection

@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection
