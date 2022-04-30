<?php

namespace App\Services;

use App\Repositories\RequestsDetailsConfirmRepository;

/**
 * Class RequestsDetailsConfirmService
 * @package App\Services
 */
class RequestsDetailsConfirmService
{
    protected $requestsDetailsConfirmRepository;
    public function __construct(RequestsDetailsConfirmRepository $requestsDetailsConfirmRepository)
    {
        $this->requestsDetailsConfirmRepository = $requestsDetailsConfirmRepository;
    }

    public function getAll()
    {
        return $this->requestsDetailsConfirmRepository->getAll();
    }

    public function store($data)
    {
        $validated = $data->validated();
        return $this->requestsDetailsConfirmRepository->store($validated);
    }

    public function delete($id)
    {
        return $this->requestsDetailsConfirmRepository->delete($id);
    }

    public function update($data)
    {
        $validated = $data->validated();
        return $this->requestsDetailsConfirmRepository->update($validated);
    }

    public function getRequestsDetailsByConfirmUserId($data)
    {
        $validated = $data->validated();
        return $this->requestsDetailsConfirmRepository->getRequestsDetailsByConfirmUserId($validated['user_id']);
    }

    public function confirmsOfRequestDetail($data)
    {
        $validated = $data->validated();
        return $this->requestsDetailsConfirmRepository->confirmsOfRequestDetail($validated['requests_detail_id']);
    }

    public function updateByRequestDetailIdUserIdAndConfirmId($data)
    {
        $result = [];
        $validates = $data->validated();
        foreach($validates as $validate){
            $validate['user_id'] = isset($validate['user_id']) ? $validate['user_id'] : UserService::getUserId();
            array_push($result , $this->requestsDetailsConfirmRepository->updateByRequestDetailIdUserIdAndConfirmId($validate));
        }
        return $result;
    }
    
}
