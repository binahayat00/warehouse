<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\status\StoreRequest;
use App\Http\Requests\status\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\StatusService;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusService;
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function getAll(){
        try{
            $result = ResponsesService::success($this->statusService->getAll());
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->statusService->store($request));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete($id){
        try{
            $result = ResponsesService::success($this->statusService->delete($id));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $data){
        try{
            $result = ResponsesService::success($this->statusService->update($data));
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
