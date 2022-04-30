<?php

namespace App\Services;

use App\Repositories\RequestDetailRepository;

/**
 * Class RequestDetailService
 * @package App\Services
 */
class RequestDetailService
{
    protected $requestDetailRepository;
    public function __construct(RequestDetailRepository $requestDetailRepository)
    {
        $this->requestDetailRepository = $requestDetailRepository;
    }

    public function getAll(){
        return $this->requestDetailRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->requestDetailRepository->store($validated);
    }

    public function delete($id){
        return $this->requestDetailRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->requestDetailRepository->update($validated);
    }

    public function updateDeliveryId($data){
        $validated = $data->validated();
        return $this->requestDetailRepository->updateDeliveryId($validated);
    }
}
