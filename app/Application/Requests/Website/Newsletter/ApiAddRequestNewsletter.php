<?php

namespace App\Application\Requests\Website\Newsletter;


class ApiAddRequestNewsletter
{
    public function rules()
    {
        return [
            "email" => "email",
			"active" => "",
			
        ];
    }
}
