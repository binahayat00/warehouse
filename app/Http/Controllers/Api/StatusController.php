<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\status\StoreRequest;
use App\Http\Requests\status\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\StatusService;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusService;
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
        $this->middleware('permission:status-list|status-store|status-update|status-delete', ['only' => ['getAll']]);
        $this->middleware('permission:status-store', ['only' => ['store']]);
        $this->middleware('permission:status-delete', ['only' => ['delete']]);
        $this->middleware('permission:status-update', ['only' => ['update']]);
    }

    public function getAll()
    {
        try {
            $result = $this->statusService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->statusService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete($id)
    {
        try {
            $result = $this->statusService->delete($id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->statusService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
