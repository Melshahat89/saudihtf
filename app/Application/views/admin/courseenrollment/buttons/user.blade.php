@if(isset($user))
{{ (isset($user['email'])) ? $user['email'] : '' }}
@endif