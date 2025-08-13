<?php
$activation = checkSubscriptionActive($id);
?>
@if($activation)
    <label class="btn btn-success">فعال</label>
@else
    <label class="btn btn-danger">منتهي</label>
@endif