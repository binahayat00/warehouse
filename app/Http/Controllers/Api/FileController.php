<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\file\DownloadRequest;
use App\Http\Requests\file\ShowRequest;
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
    public function getAll()
    {
        try {
            $result = $this->fileService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->fileService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->fileService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->fileService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function storeFileInStorageAndFileTable(StoreRequest $request)
    {
        try {
            $result = $this->fileService->storeFileInStorageAndFilesTable($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function download(DownloadRequest $request)
    {
        try {
            $result = $this->fileService->download($request->validated());
            return $result['data']; //for download just send data
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
            return response()->json($result, $result['status']);
        }
    }

    public function show(ShowRequest $request)
    {
        try {
            $result = $this->fileService->show($request->validated());
            return $result['data']; //for show just send data
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
            return response()->json($result, $result['status']);
        }
    }
}
