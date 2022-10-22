<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\GetAllRecordsOfProductByIdRequest;
use App\Http\Requests\product\ProductsByWarehouseIdRequest;
use App\Http\Requests\product\StoreRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAll()
    {
        try {
            $result = $this->productService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->productService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->productService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->productService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getProductsByWarehouseId(ProductsByWarehouseIdRequest $request): object
    {
        try {
            $result = $this->productService->getProductsByWarehouseId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllRecordsOfProductById(GetAllRecordsOfProductByIdRequest $request){
        try {
            $result = $this->productService->getAllRecordsOfProductById($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
