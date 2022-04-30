<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\request\GetByDeliveryIdRequest;
use App\Http\Requests\request\GetByUserIdRequest;
use App\Http\Requests\request\StoreRequest;
use App\Http\Requests\request\StoreRequestAndRequestDetailsRequest;
use App\Http\Requests\request\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestService;
use App\Services\TimeService;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    protected $requestService, $timeService;
    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
        $this->timeService = new TimeService();
    }

    public function getAll()
    {
        try {
            $result = ResponsesService::success($this->requestService->getAll());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->store($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->delete($request->id));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->update($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function storeRequestAndRequestDetails(StoreRequestAndRequestDetailsRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->storeRequestAndRequestDetails($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getCurrentDate()
    {
        try {
            $result = ResponsesService::success($this->timeService->currentManualDate());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function allRequestsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->allRequestsOfUserId($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }


    public function allRequestConfirmsByUserId(GetByUserIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->allRequestConfirmsByUserId($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function allRequestsByDeliveryId(GetByDeliveryIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->allRequestsByDeliveryId($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    
    public function allConfirmsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->allConfirmsOfUserId($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
