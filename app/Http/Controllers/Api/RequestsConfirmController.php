<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsConfirm\StoreRequest;
use App\Http\Requests\requestsConfirm\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestsConfirmService;
use Exception;

class RequestsConfirmController extends Controller
{
    protected $requestsConfirmService;
    public function __construct(RequestsConfirmService $requestsConfirmService)
    {
        $this->requestsConfirmService = $requestsConfirmService;
    }

    public function getAll()
    {
        try {
            $result = $this->requestsConfirmService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->requestsConfirmService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->requestsConfirmService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->requestsConfirmService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
