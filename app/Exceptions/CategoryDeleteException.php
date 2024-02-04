<?php

namespace App\Exceptions;

use Exception;

class CategoryDeleteException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'You cannot delete a category associated with a car.'], 422);
    }
}
