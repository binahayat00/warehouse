<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\warehouse\StoreRequest;
use App\Http\Requests\warehouse\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\WarehouseService;
use Exception;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function getAll()
    {
        try {
            $result = $this->warehouseService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->warehouseService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->warehouseService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->warehouseService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllActiveWarehouses()
    {
        try {
            $result = $this->warehouseService->getAllActiveWarehouses();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
