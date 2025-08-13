@if(isset($user))
    {{ isset($user['mobile']) ? $user['mobile'] : null }}
@endif