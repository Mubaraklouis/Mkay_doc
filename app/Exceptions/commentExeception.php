<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class commentExeception extends Exception
{
    //this function overrides the main render function
    public function render()
    {

        return new JsonResponse([
            "message" => $this->getMessage()
        ],$this->code);
    }
}
