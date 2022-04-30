<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $result = ResponsesService::success($this->requestsDetailsConfirmService->getAll());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->store($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->delete($request->id));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->update($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function confirmsOfRequestDetail(GetByRequestsDetailIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->confirmsOfRequestDetail($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateByRequestDetailIdUserIdAndConfirmId(UpdateByRequestDetailUserConfirmIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->updateByRequestDetailIdUserIdAndConfirmId($request));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
    
}
