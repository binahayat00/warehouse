<?php

namespace App\Services;

use App\Repositories\VehicleRepository;

/**
 * Class VehicleService
 * @package App\Services
 */
class VehicleService
{
    protected $vehicleRepository;
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    
    public function getAll(){
        return $this->vehicleRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->vehicleRepository->store($validated);
    }

    public function delete($id){
        return $this->vehicleRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->vehicleRepository->update($validated);
    }
}
