<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\buysDetail\StoreRequest;
use App\Http\Requests\buysDetail\UpdateRequest;
use App\Services\BuysDetailService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class BuysDetailController extends Controller
{
    protected $buysDetailService;

    public function __construct(BuysDetailService $buysDetailService)
    {
        $this->buysDetailService = $buysDetailService;
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->buysDetailService->getAll());
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->buysDetailService->store($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->buysDetailService->delete($request->id));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->buysDetailService->update($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
