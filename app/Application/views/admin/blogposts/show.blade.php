@extends(layoutExtend())

@section('title')
    {{ trans('blog.blogposts') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('blog.blogposts') , 'model' => 'faq' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				
		</table>

        @include('admin.blogposts.buttons.delete' , ['id' => $item->id])
        @include('admin.blogposts.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
