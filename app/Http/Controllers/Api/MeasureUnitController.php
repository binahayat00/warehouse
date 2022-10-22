<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\measureUnit\StoreRequest;
use App\Http\Requests\measureUnit\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\MeasureUnitService;
use Exception;
use Illuminate\Http\Request;

class MeasureUnitController extends Controller
{
    protected $measureUnitService;
    public function __construct(MeasureUnitService $measureUnitService)
    {
        $this->measureUnitService = $measureUnitService;
    }

    public function getAll()
    {
        try {
            $result = $this->measureUnitService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->measureUnitService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete($id)
    {
        try {
            $result = $this->measureUnitService->dalete($id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->measureUnitService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
