@extends(layoutExtend())

@section('title')
    {{ trans('blog.blogcategories') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('blog.blogcategories') , 'model' => 'faq' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				
		</table>

        @include('admin.blogcategories.buttons.delete' , ['id' => $item->id])
        @include('admin.blogcategories.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
