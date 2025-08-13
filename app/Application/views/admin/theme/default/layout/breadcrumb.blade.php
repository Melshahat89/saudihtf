<ol class="breadcrumb breadcrumb-col-cyan">
    <li>
        <a href="{{ url('/lazyadmin/home') }}"><i class="material-icons">home</i>
            {{ trans('home.home') }}
        </a>
    </li>
    @isset($title)
        <li><a href="{{ url('/lazyadmin/'.$model) }}"><i class="uil uil-book"></i>{{ ucfirst($title) }}</a></li>
    @endisset
    @isset($action)
         <li class="active">
            {{ $action }}  {{ ucfirst($title) }}
         </li>
    @endisset
</ol>