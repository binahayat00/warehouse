<?php

namespace App\Services;

use App\Repositories\FileRepository;
use App\Repositories\FileRequestDetailRepository;
use App\Repositories\RequestDetailRepository;
use App\Repositories\RequestRepository;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\App;

/**
 * Class RequestService
 * @package App\Services
 */
class RequestService
{
    protected $requestRepository, $requestDetailRepository, $usersUnitService, $fileRepository, $fileService, $fileRequestDetailRepository, $fileRequestDetailService, $timeService;
    public function __construct(
        RequestRepository $requestRepository,
        RequestDetailRepository $requestDetailRepository,
        UsersUnitService $usersUnitService,
        FileRepository $fileRepository,
        FileService $fileService,
        FileRequestDetailRepository $fileRequestDetailRepository,
        FileRequestDetailService $fileRequestDetailService
    ) {
        $this->requestRepository = $requestRepository;
        $this->requestDetailRepository = $requestDetailRepository;
        $this->usersUnitService = $usersUnitService;
        $this->fileRepository = $fileRepository;
        $this->fileService = $fileService;
        $this->FileRequestDetailRepository = $fileRequestDetailRepository;
        $this->fileRequestDetailService = $fileRequestDetailService;
        $this->timeService = new TimeService();
    }

    public function getAll()
    {
        return $this->requestRepository->getAll();
    }

    public function store($data)
    {
        $validated = $data->validated();
        return $this->requestRepository->store($validated);
    }

    public function delete($id)
    {
        return $this->requestRepository->delete($id);
    }

    public function update($data)
    {
        $validated = $data->validated();
        return $this->requestRepository->update($validated);
    }
    //
    public function storeRequestAndRequestDetails($data)
    {
        $validated = $data->validated();
        $validated['request'] = $this->getParamsForRequestsTable();
        $validated['request']['date'] = $this->timeService->currentManualDate();
        $requestData = $this->requestRepository->store($validated['request']);

        $requestDetailsData = [];
        foreach ($validated['requestDetails'] as $requestDetail) {
            $requestDetail['request_id'] = $requestData->id;
            $requestDetailsDatum = $this->requestDetailRepository->store($requestDetail);
            if (isset($requestDetail['file_id'])) {
                $this->fileRequestDetailService->storeArrayfileids($requestDetail['file_id'], $requestDetailsDatum->id);
            }
            array_push($requestDetailsData, $requestDetailsDatum);
        }
        return ['requestData' => $requestData, 'requestDetailsData' => $requestDetailsData];
    }

    public function allRequestConfirmsByUserId($data)
    {
        $validated = $data->validated();
        return $this->requestRepository->allRequestConfirmsByUserId($validated['user_id']);
    }

    public function getParamsForRequestsTable()
    {
        $result['user_id'] = UserService::getUserId();
        $result['unit_id'] = $this->usersUnitService->getUnitIdByUserId($result['user_id']);
        return $result;
    }

    public function allRequestsOfUserId($data)
    {
        $validated = $data->validated();
        $validated['user_id'] = isset($validated['user_id']) ? $validated['user_id'] : UserService::getUserId();
        return $this->requestRepository->allRequestsOfUserId($validated['user_id']);
    }

    public function buildRequestNumber()
    {
        date_default_timezone_set('Asia/Tehran');
        $number = time(); //$date->year.$date->month.$date->day;//14010109124203//
    }

    public static function generateRandomNumber($length = 5)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        date_default_timezone_set('Asia/Tehran');
        $timezone = date_default_timezone_get();

        echo "The current server timezone is: " . $timezone;
        return [time(), date('mdyhis', time())];
        //return date('mdyhis', time());
    }

    public function allRequestsByDeliveryId($data)
    {
        $validated = $data->validated();
        $validated['delivery_id'] = isset($validated['delivery_id']) ? $validated['delivery_id'] : UserService::getUserId();//temporary
        return $this->requestRepository->allRequestsByDeliveryId($validated['delivery_id']);
    }

    public function allConfirmsOfUserId($data)
    {
        $validated = $data->validated();
        $validated['userId'] = isset($validated['userId']) ? $validated['userId'] : UserService::getUserId();
        return $this->requestRepository->allConfirmsOfUserId($validated['userId']);
    }

    
}
