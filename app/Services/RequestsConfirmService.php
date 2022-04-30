<?php

namespace App\Services;

use App\Repositories\RequestsConfirmRepository;

/**
 * Class RequestsConfirmService
 * @package App\Services
 */
class RequestsConfirmService
{
    protected $requestsConfirmRepository;
    public function __construct(RequestsConfirmRepository $requestsConfirmRepository)
    {
        $this->requestsConfirmRepository = $requestsConfirmRepository;
    }

    public function getAll(){
        return $this->requestsConfirmRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->requestsConfirmRepository->store($validated);
    }

    public function delete($id){
        return $this->requestsConfirmRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->requestsConfirmRepository->update($validated);
    }

    public function getRequestsByDeliveryId($data){
        $validated = $data->validated();
        return $this->requestsConfirmRepository->getRequestsByDeliveryId($validated['user_id']);
    }
}
