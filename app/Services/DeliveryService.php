<?php

namespace App\Services;

use App\Repositories\DeliveryRepository;

class DeliveryService
{
    protected $deliveryRepository;
    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
    }

    public function getAll(){
        return $this->deliveryRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->deliveryRepository->store($validated);
    }

    public function delete($id){
        return $this->deliveryRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->deliveryRepository->update($validated);
    }
}
