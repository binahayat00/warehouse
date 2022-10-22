<?php

namespace App\Http\Controllers\Api\RolePermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\rolePermission\AddRoleToUserRequest;
use App\Http\Requests\rolePermission\AssignPermissionToRoleRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RolePermission\RoleService;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    public function getAllRoles()
    {
        try {
            $result = $this->roleService->getAllRoles();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function addRoleToUser(AddRoleToUserRequest $request)
    {
        try {
            $result = $this->roleService->addRoleToUser($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function assignPermissionToRole(AssignPermissionToRoleRequest $request)
    {
        try {
            $result = $this->roleService->assignPermissionToRole($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
