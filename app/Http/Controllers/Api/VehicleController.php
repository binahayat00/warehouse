<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\vehicle\StoreRequest;
use App\Http\Requests\vehicle\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $vehicleService;
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function getAll()
    {
        try {
            $result = $this->vehicleService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->vehicleService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->vehicleService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->vehicleService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
