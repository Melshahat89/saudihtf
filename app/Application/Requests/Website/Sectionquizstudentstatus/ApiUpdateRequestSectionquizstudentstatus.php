<?php
 namespace App\Application\Requests\Website\Sectionquizstudentstatus;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSectionquizstudentstatus
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"sectionquiz_id" => "required|integer",
         "user_id" => "required|integer",
            "passed" => "status",
   "end_time" => "",
            ];
    }
}
