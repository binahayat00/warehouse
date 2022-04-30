<?php

namespace App\Services;

use App\Repositories\BuysDetailRepository;

/**
 * Class BuysDetailService
 * @package App\Services
 */
class BuysDetailService
{
    protected $buysDetailRepository;
    public function __construct(BuysDetailRepository $buysDetailRepository)
    {
        $this->buysDetailRepository = $buysDetailRepository;
    }

    public function getAll(){
        return $this->buysDetailRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->buysDetailRepository->store($validated);
    }

    public function delete($id){
        return $this->buysDetailRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->buysDetailRepository->update($validated);
    }
}
