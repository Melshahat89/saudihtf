<?php
 namespace App\Application\Requests\Website\Consultationsreviews;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestConsultationsreviews
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	// "consultation_id" => "required|integer",
        //  "user_id" => "required|integer",
            "review" => "",
   "rating" => "required",
            ];
    }
}
