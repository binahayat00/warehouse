<?php

namespace App\Services;

use App\Repositories\WarehouseRepository;

/**
 * Class WarehouseService
 * @package App\Services
 */
class WarehouseService
{
    protected $warehouseRepository;
    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function getAll(){
        return $this->warehouseRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->warehouseRepository->store($validated);
    }

    public function delete($id){
        return $this->warehouseRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->warehouseRepository->update($validated);
    }
}
