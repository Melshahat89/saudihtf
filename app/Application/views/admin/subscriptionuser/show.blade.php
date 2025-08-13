@extends(layoutExtend())
@section('title')
    {{ trans('subscriptionuser.subscriptionuser') }} {{ trans('home.view') }}
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('subscriptionuser.subscriptionuser') , 'model' => 'subscriptionuser' , 'action' => trans('home.view')  ])
        <table class="table table-bordered  table-striped" >
            <tr>
                <th width="200">{{ trans("subscriptionuser.subscription_id") }}</th>
                <td>{{ nl2br($item->id) }}</td>
            </tr>
            <tr>
                <th width="200">بريد الكتروني المشترك</th>
                <td>{{ nl2br($item->user->email) }}</td>
            </tr>
            <tr>
                <th width="200"> رقم جوال المشترك</th>
                <td>{{ nl2br($item->user->mobile) }}</td>
            </tr>
            <tr>
                <th width="200">{{ trans("subscriptionuser.start_date") }}</th>
                <td>{{ nl2br($item->start_date) }}</td>
            </tr>
            <tr>
                <th width="200">{{ trans("subscriptionuser.end_date") }}</th>
                <td>{{ nl2br($item->end_date) }}</td>
            </tr>
            <tr>
                <th width="200">{{ trans("subscriptionuser.amount") }}</th>
                <td>{{ nl2br($item->amount) }}</td>
            </tr>
            <tr>
                <th width="200">{{ trans("subscriptionuser.b_type") }}</th>
                <td>

                    @switch($item->b_type)
                        @case(1)
                            <label class="btn btn-warning">شهري</label>
                            @break
                        @case(2)
                            <label class="btn btn-success">سنوي</label>
                            @break
                        @default

                    @endswitch



                </td>
            </tr>
            <tr>
                <th width="200">{{ trans("subscriptionuser.is_active") }}</th>
                <td>
                    <?php
                    $activation = checkSubscriptionActive($item->id);
                    ?>
                    @if($activation)
                        <label class="btn btn-success">فعال </label>
                    @else
                        <label class="btn btn-danger">منتهي</label>
                    @endif

                </td>
            </tr>
            {{--            <tr>--}}
            {{--                <th width="200">{{ trans("subscriptionuser.is_collected") }}</th>--}}
            {{--                <td>--}}
            {{--                    {{ $item->is_collected == 1 ? trans("subscriptionuser.Yes") : trans("subscriptionuser.No")  }}--}}
            {{--                </td>--}}
            {{--            </tr>--}}
        </table>

        <hr>
        <br>
        <br>
        <br>



        <div class="form-group">
            <h2 class="">
                دورات هذا الاشتراك</h2>

            <hr>

            @isset($item->courseenrollment)
                <table class="table table-bordered  table-striped" >

                    <tr>
                        <th>رقم الدورة</th>
                        <th>أسم الدورة</th>
                        <th width="200"> تاريخ الاشتراك</th>
                        <th width="200"> نهاية الاشتراك</th>
                        <th width="200">صورة الدورة</th>


                    </tr>
                    @foreach($item->courseenrollment as $courseenrollment)

                        <tr>
                            <td>
                                    {{ $courseenrollment->courses->id }}
                            </td>
                            <td>
                                    {{ $courseenrollment->courses->title_ar }}
                            </td>
                            <td>
                                    {{$courseenrollment->start_time}}
                            </td>
                            <td>
                                {{$courseenrollment->end_time}}
                            </td>
                            <td>
                                <img src="{{ large1($courseenrollment->courses->image) }}" class="img-fluid" alt="{{ $courseenrollment->courses->title_ar }}">
                            </td>
                        </tr>

                    @endforeach
                </table>
            @endif

        </div>



        {{--         @include('admin.subscriptionuser.buttons.delete' , ['id' => $item->id])--}}
        {{--        @include('admin.subscriptionuser.buttons.edit' , ['id' => $item->id])--}}
    @endcomponent
@endsection
