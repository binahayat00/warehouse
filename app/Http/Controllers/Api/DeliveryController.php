<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\delivery\StoreRequest;
use App\Http\Requests\delivery\UpdateOnlineStatusRequest;
use App\Http\Requests\delivery\UpdateRequest;
use App\Services\DeliveryService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $deliveryService;
    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function getAll()
    {
        try {
            $result = $this->deliveryService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->deliveryService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete($id)
    {
        try {
            $result = $this->deliveryService->delete($id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->deliveryService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateOnlineStatus(UpdateOnlineStatusRequest $request)
    {
        try {
            $result = $this->deliveryService->updateOnlineStatus($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
