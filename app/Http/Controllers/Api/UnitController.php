<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\unit\StoreRequest;
use App\Http\Requests\unit\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\UnitService;
use Exception;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitService;
    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function getAll()
    {
        try {
            $result = $this->unitService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->unitService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->unitService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->unitService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
