<?php

namespace App\Services;

use App\Repositories\UnitRepository;

/**
 * Class UnitService
 * @package App\Services
 */
class UnitService
{
    protected $unitRepository;
    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getAll(){
        return $this->unitRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->unitRepository->store($validated);
    }

    public function delete($id){
        return $this->unitRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->unitRepository->update($validated);
    }
    
}
