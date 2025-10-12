@php $user = App\Application\Model\User::find($instructor_id);  @endphp
{{ isset($user) ?  $user->fullname_lang : 'لا يوجد محاضر' }}