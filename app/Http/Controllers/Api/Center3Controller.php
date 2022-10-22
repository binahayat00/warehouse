<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Center3Service;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class Center3Controller extends Controller
{
    protected $center3Service;

    public function __construct()
    {
        $this->center3Service = new Center3Service();
    }

    public function getAllActive()
    {
        try {
            $result = $this->center3Service->getAllActive();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
