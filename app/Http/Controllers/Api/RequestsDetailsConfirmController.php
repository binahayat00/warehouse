<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsDetailsConfirm\GetByRequestIdRequest;
use App\Http\Requests\RequestsDetailsConfirm\GetByRequestsDetailIdRequest;
use App\Http\Requests\RequestsDetailsConfirm\StoreRequest;
use App\Http\Requests\RequestsDetailsConfirm\UpdateByRequestDetailUserConfirmIdRequest;
use App\Http\Requests\RequestsDetailsConfirm\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestsDetailsConfirmService;
use Exception;

class RequestsDetailsConfirmController extends Controller
{
    protected $requestsDetailsConfirmService;
    public function __construct(RequestsDetailsConfirmService $requestsDetailsConfirmService)
    {
        $this->requestsDetailsConfirmService = $requestsDetailsConfirmService;
    }

    public function getAll()
    {
        try {
            $result = $this->requestsDetailsConfirmService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function confirmsOfRequestDetail(GetByRequestsDetailIdRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->confirmsOfRequestDetail($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function confirmsOfRequest(GetByRequestIdRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->confirmsOfRequest($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateByRequestDetailIdUserIdAndConfirmId(UpdateByRequestDetailUserConfirmIdRequest $request)
    {
        try {
            $result = $this->requestsDetailsConfirmService->updateByRequestDetailIdUserIdAndConfirmId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
