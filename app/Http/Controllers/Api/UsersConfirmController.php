<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserConfirm\GetByUserIdRequest;
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
            $result = ResponsesService::success($this->usersConfirmService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->usersConfirmService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->usersConfirmService->delete($request->id));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->usersConfirmService->update($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
    
    public function getByUserId(GetByUserIdRequest $request){
        try{
            $result = ResponsesService::success($this->usersConfirmService->getByUserId($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
