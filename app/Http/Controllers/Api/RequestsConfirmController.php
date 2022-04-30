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

    public function getAll(){
        try{
            $result = ResponsesService::success($this->requestsConfirmService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->requestsConfirmService->store($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->requestsConfirmService->delete($request->id));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->requestsConfirmService->update($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function storeById(Request $request){
        try{
            $result = ResponsesService::success($this->requestsConfirmService->store($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
