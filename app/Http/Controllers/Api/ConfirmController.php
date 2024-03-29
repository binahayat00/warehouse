<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\confirm\StoreRequest;
use App\Http\Requests\confirm\UpdateRequest;
use App\Services\ConfirmService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    protected $confirmService;
    public function __construct(ConfirmService $confirmService)
    {
        $this->confirmService = $confirmService;
    }
    public function getAll()
    {
        try {
            $result = $this->confirmService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->confirmService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->confirmService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->confirmService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
