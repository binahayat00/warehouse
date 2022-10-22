<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\GetByIdRequest;
use App\Http\Requests\user\StoreRequest;
use App\Http\Requests\user\UpdateOrStoreByPersonnelCodeRequest;
use App\Http\Requests\user\UpdateRequest;
use App\Services\Globals\ResponsesService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function getAll()
    {
        try {
            $result = $this->userService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->userService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->userService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->userService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getById(GetByIdRequest $request)
    {
        try {
            $result = $this->userService->getById($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function updateOrStoreByPersonnelCode(UpdateOrStoreByPersonnelCodeRequest $request)
    {
        Log::info($request->validated());
        try {
            $result = $this->userService->updateOrStoreByPersonnelCode($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function changeUserStatus(Request $request) {
        try {
            $result = $this->userService->changeUserStatus($request);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
