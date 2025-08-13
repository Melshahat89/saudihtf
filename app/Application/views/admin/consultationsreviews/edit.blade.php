@extends(layoutExtend())
 @section('title')
    {{ trans('consultationsreviews.consultationsreviews') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('consultationsreviews.consultationsreviews') , 'model' => 'consultationsreviews' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/consultationsreviews/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('consultationsreviews.consultationsreviews') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection

@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection
