<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\request\CheckValidatedCodeRequest;
use App\Http\Requests\request\GetAllDetailsByIdRequest;
use App\Http\Requests\request\GetAllForWarehouseDeliveryIdIsNotArchiveAndCancelRequest;
use App\Http\Requests\request\GetByDeliveryIdRequest;
use App\Http\Requests\request\GetByUserIdRequest;
use App\Http\Requests\request\StoreRequest;
use App\Http\Requests\request\StoreRequestAndRequestDetailsRequest;
use App\Http\Requests\request\UpdateRequest;
use App\Http\Requests\request\IsConfirmedRequest;
use App\Http\Requests\request\ProcessOfSetReturnDeliveryIdRequest;
use App\Http\Requests\request\ProcessOfSetReturnToWarehouseStatusRequest;
use App\Http\Requests\request\ProcessOfValidCodeForReturnToDeliveryRequest;
use App\Http\Requests\request\ProcessOfValidCodeForReturnToWarehouse;
use App\Http\Requests\request\SetRequestStatusRequest;
use App\Http\Requests\request\StoreRequestAndRequestDetailsWithoutConfirmsRequest;
use App\Services\Globals\ResponsesService;
use App\Services\RequestsDetailsConfirmService;
use App\Services\RequestService;
use App\Services\TimeService;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    protected $requestService, $timeService, $requestsDetailsConfirmService;
    public function __construct(RequestService $requestService, RequestsDetailsConfirmService $requestsDetailsConfirmService)
    {
        $this->requestService = $requestService;
        $this->requestsDetailsConfirmService = $requestsDetailsConfirmService;
        $this->timeService = new TimeService();
    }

    public function getAll()
    {
        try {
            $result = $this->requestService->getAll();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->requestService->store($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function delete(Request $request)
    {
        try {
            $result = $this->requestService->delete($request->id);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $result = $this->requestService->update($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function storeRequestAndRequestDetails(StoreRequestAndRequestDetailsRequest $request)
    {
        try {
            $result = $this->requestService->storeRequestAndRequestDetails($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getCurrentDate()
    {
        try {
            $result = ResponsesService::success($this->timeService->currentManualDate());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function allRequestsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = $this->requestService->allRequestsOfUserId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }



    public function archivedRequestsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = $this->requestService->archivedRequestsOfUserId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function notArchivedRequestsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestService->notArchivedRequestsOfUserId($request->validated()));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function allRequestConfirmsByUserId(GetByUserIdRequest $request)
    {
        try {
            $result = $this->requestService->allRequestConfirmsByUserId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function allRequestsByDeliveryId(GetByDeliveryIdRequest $request)
    {
        try {
            $result = $this->requestService->allRequestsByDeliveryId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }


    public function allConfirmsOfUserId(GetByUserIdRequest $request)
    {
        try {
            $result = $this->requestService->allConfirmsOfUserId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function requestIsConfirmed(IsConfirmedRequest $request)
    {
        try {
            $result = ResponsesService::success($this->requestsDetailsConfirmService->requestIsConfirmed($request->validated()['requestId']));
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllArchiveStatus()
    {
        try {
            $result = $this->requestService->getAllArchiveStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllCancelStatus()
    {
        try {
            $result = $this->requestService->getAllCancelStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllIsNotArchiveStatus()
    {
        try {
            $result = $this->requestService->getAllIsNotArchiveStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllIsNotArchiveAndCancelStatus()
    {
        try {
            $result = $this->requestService->getAllIsNotArchiveAndCancelStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function checkValidatedCode(CheckValidatedCodeRequest $request)
    {
        try {
            $result = $this->requestService->processOfValidCode($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function setStatusForRequestAndItsRequestDetails(SetRequestStatusRequest $request, int $statusId)
    {
        try {
            $result = $this->requestService->setStatusForRequestAndItsRequestDetails($request->validated(), $statusId);
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function showDeliveriesStatus()
    {
        try {
            $result = $this->requestService->showDeliveriesStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function showDeliveriesStatusWithoutDelivery()
    {
        try {
            $result = $this->requestService->showDeliveriesStatusWithoutDelivery();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function showDeliveriesStatusWithDelivery()
    {
        try {
            $result = $this->requestService->showDeliveriesStatusWithDelivery();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllDetailsById(GetAllDetailsByIdRequest $request)
    {
        try {
            $result = $this->requestService->getAllDetailsById($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllForWarehouseDeliveryIdIsNotArchiveAndCancel(GetAllForWarehouseDeliveryIdIsNotArchiveAndCancelRequest $request)
    {
        try {
            $result = $this->requestService->getAllForWarehouseDeliveryIdIsNotArchiveAndCancel($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function processOfSetReturnToWarehouseStatus(ProcessOfSetReturnToWarehouseStatusRequest $request)
    {
        try {
            $result = $this->requestService->processOfSetReturnToWarehouseStatus($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function processOfSetReturnDeliveryId(ProcessOfSetReturnDeliveryIdRequest $request)
    {
        try {
            $result = $this->requestService->processOfSetReturnDeliveryId($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function processOfValidCodeForReturnToDelivery(ProcessOfValidCodeForReturnToDeliveryRequest $request)
    {
        try {
            $result = $this->requestService->processOfValidCodeForReturnToDelivery($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function processOfValidCodeForReturnToWarehouse(ProcessOfValidCodeForReturnToWarehouse $request)
    {
        try {
            $result = $this->requestService->processOfValidCodeForReturnToWarehouse($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function storeRequestAndRequestDetailsWithoutConfirms(StoreRequestAndRequestDetailsWithoutConfirmsRequest $request)
    {
        try {
            $result = $this->requestService->storeRequestAndRequestDetailsWithoutConfirms($request->validated());
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }

    public function getAllReturnToWarehouseStatus(){
        try {
            $result = $this->requestService->getAllReturnToWarehouseStatus();
        } catch (Exception $e) {
            $result = ResponsesService::exception($e);
        }
        return response()->json($result, $result['status']);
    }
}
