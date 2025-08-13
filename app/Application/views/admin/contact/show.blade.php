@extends(layoutExtend())

@section('title')
    {{ trans('contact.contact') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('contact.contact') , 'model' => 'contact' , 'action' => trans('home.view')  , 'button' => false  ])
    @include('admin.contact.buttons.delete' , ['id' => $item->id])
    @include('admin.contact.buttons.edit' , ['id' => $item->id])


    <table class="table table-bordered  table-striped" >
        <tr>
            <th width="200">{{ trans("website.name") }}</th>
            <td>{{ nl2br($item->name) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.email") }}</th>
            <td>{{ nl2br($item->email) }}</td>
        </tr>

        <tr>
            <th width="200">{{ trans("website.subject") }}</th>
            <td>{{ nl2br($item->subject) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.country_code") }}</th>
            <td>{{ nl2br($item->country_code) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.Phone") }}</th>
            <td>{{ nl2br($item->phone) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.company_name") }}</th>
            <td>{{ nl2br($item->company_name) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.Number_of_trainees") }}</th>
            <td>{{ nl2br($item->Number_of_trainees) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.company_size") }}</th>
            <td>{{ nl2br($item->company_size) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.website_url") }}</th>
            <td>{{ nl2br($item->website_url) }}</td>
        </tr>
        <tr>
            <th width="200">{{ trans("website.message") }}</th>
            <td>{{ nl2br($item->message) }}</td>
        </tr>
    </table>



    @include('admin.contact.replay' , ['id' => $item->id])
    @endcomponent
@endsection
