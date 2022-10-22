<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\productsConfirm\GetByProductIdRequest;
use App\Http\Requests\productsConfirm\StoreRequest;
use App\Services\Globals\ResponsesService;
use App\Services\ProductsConfirmService;
use Exception;
use Illuminate\Http\Request;

class ProductsConfirmController extends Controller
{
    protected $productsConfirmService;
    public function __construct(ProductsConfirmService $productsConfirmService)
    {
        $this->productsConfirmService = $productsConfirmService;
    }

    public function getAll()
    {
        try {
            $result = $this->productsConfirmService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->productsConfirmService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getByProductId(GetByProductIdRequest $request)
    {
        try {
            $result = $this->productsConfirmService->getByProductId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
