<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserConfirm\GetByUserIdRequest;
use App\Http\Requests\userConfirm\SetActiveStatusUserConfirmIdRequest;
use App\Http\Requests\userConfirm\StoreRequest;
use App\Http\Requests\userConfirm\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\UsersConfirmService;
use Exception;
use Illuminate\Http\Request;

class UsersConfirmController extends Controller
{
    protected $usersConfirmService;
    public function __construct(UsersConfirmService $usersConfirmService)
    {
        $this->usersConfirmService = $usersConfirmService;
    }
    public function getAll(){
        try{
            $result = $this->usersConfirmService->getAll();
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = $this->usersConfirmService->store($request->validated());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = $this->usersConfirmService->delete($request->id);
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = $this->usersConfirmService->update($request->validated());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
    
    public function getByUserId(GetByUserIdRequest $request){
        try{
            $result = $this->usersConfirmService->getByUserId($request->validated());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function setInactiveStatusByUserConfirmId(SetActiveStatusUserConfirmIdRequest $request)
    {
        try{
            $result = $this->usersConfirmService->setInactiveStatusByUserConfirmId($request->validated());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']); 
    }
}
