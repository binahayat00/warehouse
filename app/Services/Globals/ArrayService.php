<?php

namespace App\Services\Globals;

/**
 * Class ArrayService
 * @package App\Services
 */
class ArrayService
{
    public function removeNullFromArray($fields)
    {
        return array_diff($fields,array(null));
    }
}
