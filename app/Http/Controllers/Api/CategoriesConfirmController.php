<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoriesConfirm\StoreRequest;
use App\Http\Requests\categoriesConfirm\UpdateRequest;
use App\Services\CategoriesConfirmService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class CategoriesConfirmController extends Controller
{
    protected $categoriesConfirmService;

    public function __construct(CategoriesConfirmService $categoriesConfirmService)
    {
        $this->categoriesConfirmService = $categoriesConfirmService;
    }

    public function getAll(){
        try{
            $result = $this->categoriesConfirmService->getAll();
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = $this->categoriesConfirmService->store($request->validated());
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = $this->categoriesConfirmService->delete($request->id);
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = $this->categoriesConfirmService->update($request->validated());
        }catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
    
}
