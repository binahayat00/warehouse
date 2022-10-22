<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CenterService;
use App\Services\Globals\ResponsesService;
use Exception;

class CenterController extends Controller
{
    protected $centerService;

    public function __construct()
    {
        $this->centerService = new CenterService();
    }

    public function getAll()
    {
        try {
            $result = $this->centerService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllActive()
    {
        try {
            $result = $this->centerService->getAllActive();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
