<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestDetail\getFilesRequest;
use App\Http\Requests\requestDetail\IsConfirmedRequest;
use App\Http\Requests\requestDetail\SetDeliveredRequest;
use App\Http\Requests\requestDetail\SetWarehouseDeliveryIdRequest;
use App\Http\Requests\requestDetail\StoreRequest;
use App\Http\Requests\requestDetail\UpdateDeliveryIdRequest;
use App\Http\Requests\requestDetail\UpdateRequest;
use App\Http\Requests\requestDetail\UpdateWarehouseDeliveryIdRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestDetailService;
use App\Services\RequestsDetailsConfirmService;
use Exception;
use Illuminate\Http\Request;

class RequestDetailController extends Controller
{
    protected $requestDetailService, $requestsDetailsConfirmService;
    public function __construct(RequestDetailService $requestDetailService, RequestsDetailsConfirmService $requestsDetailsConfirmService)
    {
        $this->requestDetailService = $requestDetailService;
        $this->requestsDetailsConfirmService = $requestsDetailsConfirmService;
    }

    public function getAll()
    {
        try {
            $result = $this->requestDetailService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->requestDetailService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->requestDetailService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->requestDetailService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateDeliveryId(UpdateDeliveryIdRequest $request)
    {
        try {
            $result = $this->requestDetailService->updateDeliveryId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function requestDetailIsConfirmed(IsConfirmedRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->requestDetailIsConfirmed($request->validated()['requestDetailId']);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function setDelivered(SetDeliveredRequest $request)
    {
        try {
            $result = $this->requestDetailService->setDelivered($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateWarehouseDeliveryId(UpdateWarehouseDeliveryIdRequest $request)
    {
        try {
            $result = $this->requestDetailService->updateWarehouseDeliveryId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function setWarehouseDeliveryId(SetWarehouseDeliveryIdRequest $request)
    {
        try {
            $result = $this->requestDetailService->setWarehouseDeliveryId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
