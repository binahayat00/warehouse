<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\file\StoreRequest;
use App\Http\Requests\file\UpdateRequest;
use App\Services\FileService;
use App\Services\Globals\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function getAll(){
        try{
            $result = ResponsesService::success($this->fileService->getAll());
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->fileService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function delete(Request $request){
        try{
            $result = ResponsesService::success($this->fileService->delete($request->id));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function update(UpdateRequest $request){
        try{
            $result = ResponsesService::success($this->fileService->update($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function storeFileInStorageAndFileTable(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->fileService->storeFileInStorageAndFilesTable($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
