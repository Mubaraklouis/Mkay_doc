<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class postExcerption extends Exception
{

    public function report()
    {
        return new  JsonResponse(
            [
                "error" => "error in the post"
            ]
        );
    }

    public function render()
    {
        return new JsonResponse(

            [
                "message"=>$this->getMessage()
            ],$this->code
        );
    }

}
