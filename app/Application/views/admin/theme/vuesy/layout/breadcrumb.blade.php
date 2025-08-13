<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/lazyadmin/home') }}"><i class="material-icons">home</i>
            {{ trans('home.home') }}
        </a>
    </li>
    @isset($title)
        <li class="breadcrumb-item"><a href="{{ url('/lazyadmin/'.$model) }}"><i class="uil uil-book"></i>{{ ucfirst($title) }}</a></li>
    @endisset
    @isset($action)
         <li class="breadcrumb-item active">
            {{ $action }}  {{ ucfirst($title) }}
         </li>
    @endisset
</ol>