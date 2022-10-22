<?php

namespace App\Http\Controllers\Rayvarz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\RayvarzMiddleware;
use App\Http\Requests\Rayvarz\Product\CheckAmountOfEachProductRequest;
use App\Http\Requests\Rayvarz\Product\SyncWarehouseWithRayvarzRequest;
use App\Services\Globals\ResponsesService;
use App\Services\Rayvarz\ProductService;
use Exception;
use Facade\FlareClient\Http\Response;

class ProductController extends Controller
{
    protected $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function getLastProducts(): object
    {
        return response()->json($this->productService->getLastProducts());
    }

    public function syncWarehouseProductTableWithRayvarz(SyncWarehouseWithRayvarzRequest $request): object
    {
        return response()->json($this->productService->syncWarehouseProductTableWithRayvarz($request->validated()));
    }

    public function checkAmountOfEachProduct(CheckAmountOfEachProductRequest $request){
        return response()->json($this->productService->checkAmountOfEachProduct($request->validated()));
    }
}
