<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\delivery\StoreRequest;
use App\Http\Requests\delivery\UpdateRequest;
use App\Services\DeliveryService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $deliveryService;
    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->deliveryService->getAll());
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->deliveryService->store($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete($id){
        try{
            $result = ResponsesService::success($this->deliveryService->delete($id));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $data){
        try{
            $result = ResponsesService::success($this->deliveryService->update($data));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
