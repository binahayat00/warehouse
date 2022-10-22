<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\warehouseDelivery\StoreRequest;
use App\Http\Requests\warehouseDelivery\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\WarehouseDeliveryService;
use Exception;
use Illuminate\Http\Request;

class WarehouseDeliveryController extends Controller
{
    protected $warehouseDeliveryService;

    public function __construct(WarehouseDeliveryService $warehouseDeliveryService)
    {
        $this->warehouseDeliveryService = $warehouseDeliveryService;
    }

    public function getAll()
    {
        try {
            $result = $this->warehouseDeliveryService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->warehouseDeliveryService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->warehouseDeliveryService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->warehouseDeliveryService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
