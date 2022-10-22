<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Globals\ResponsesService;
use App\Services\ItemConsumptionTypeService;
use Exception;
use Illuminate\Http\Request;

class ItemConsumptionTypeController extends Controller
{
    protected $itemConsumptionTypeService;

    public function __construct()
    {
        $this->itemConsumptionTypeService = new ItemConsumptionTypeService();
    }

    public function getAllActive()
    {
        try {
            $result = $this->itemConsumptionTypeService->getAllActive();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }}
