<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestDetail\StoreRequest;
use App\Http\Requests\requestDetail\UpdateDeliveryIdRequest;
use App\Http\Requests\requestDetail\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestDetailService;
use Exception;
use Illuminate\Http\Request;

class RequestDetailController extends Controller
{
    protected $requestDetailService;
    public function __construct(RequestDetailService $requestDetailService)
    {
        $this->requestDetailService = $requestDetailService;
        $this->middleware('permission:requestDetail-list|requestDetail-create|requestDetail-edit|requestDetail-delete', ['only' => ['index','show']]);
        $this->middleware('permission:requestDetail-create', ['only' => ['create','store']]);
        $this->middleware('permission:requestDetail-edit', ['only' => ['updateDeliveryId','update']]);
        $this->middleware('permission:requestDetail-delete', ['only' => ['destroy']]);
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->requestDetailService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->requestDetailService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->requestDetailService->delete($request->id));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->requestDetailService->update($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function updateDeliveryId(UpdateDeliveryIdRequest $request){
        try{
            $result = ResponsesService::success($this->requestDetailService->updateDeliveryId($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
