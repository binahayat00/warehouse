<?php

namespace App\Services;

use App\Repositories\MeasureUnitRepository;

class MeasureUnitService
{
    protected $measureUnitRepository;
    public function __construct(MeasureUnitRepository $measureUnitRepository)
    {
        $this->measureUnitRepository = $measureUnitRepository;
    }

    public function getAll(){
        return $this->measureUnitRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->measureUnitRepository->store($validated);
    }

    public function delete($id){
        return $this->measureUnitRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->measureUnitRepository->update($validated);
    }

}
