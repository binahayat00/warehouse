<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\buysConfirm\StoreRequest;
use App\Http\Requests\buysConfirm\UpdateRequest;
use Exception;
use Illuminate\Http\Request;
use App\Services\BuysConfirmService;
use App\Services\Globals\ResponsesService;

class BuysConfirmController extends Controller
{
    protected $buysConfirmService;
    public function __construct(BuysConfirmService $buysConfirmService)
    {
        $this->buysConfirmService = $buysConfirmService;
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->buysConfirmService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->buysConfirmService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->buysConfirmService->delete($request->id));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->buysConfirmService->update($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    
}
