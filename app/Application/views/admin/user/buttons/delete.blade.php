@if($id != 1)
    <span onclick="deleteThisItem(this)" data-link="{{ url('lazyadmin/user/'.$id.'/delete') }}" class="btn btn-danger" >
         <i class="fa fa-trash"></i>
    </span>
@endif
