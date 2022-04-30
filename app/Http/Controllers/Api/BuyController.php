<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\buy\StoreRequest;
use App\Http\Requests\buy\UpdateRequest;
use App\Services\BuyService;
use App\Services\Globals\ResponsesService;
use Illuminate\Http\Request;
use Exception;

class BuyController extends Controller
{
    protected $buyService;
    public function __construct(BuyService $buyService)
    {
        $this->buyService = $buyService;
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->buyService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->buyService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->buyService->delete($request->id));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->buyService->update($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
    
}
