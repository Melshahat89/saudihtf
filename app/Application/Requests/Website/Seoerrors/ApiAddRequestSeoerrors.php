<?php

namespace App\Application\Requests\Website\Seoerrors;


class ApiAddRequestSeoerrors
{
    public function rules()
    {
        return [
            "link" => "code",
			"comment" => "",
			
        ];
    }
}
