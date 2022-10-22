<?php

namespace App\Http\Controllers\Api\RolePermission;

use App\Http\Controllers\Controller;
use App\Services\Globals\ResponsesService;
use App\Services\RolePermission\PermissionService;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;
    
    public function __construct()
    {
        $this->permissionService = new PermissionService();
    }

    /*
     * list of permission for set to user
     * 
     */
    public function getAllPermissions()
    {
        try {
            $result = $this->permissionService->getAllPermissions();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    /*
     * list of permission of user id
     */
    public function getLoginUserPermissions()
    {
        try {
            $result = $this->permissionService->getLoginUserPermissions();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
