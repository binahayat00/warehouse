<?php

namespace App\Services;

use App\Repositories\BuyRepository;

/**
 * Class BuyService
 * @package App\Services
 */
class BuyService
{
    protected $buyRepository;
    public function __construct(BuyRepository $buyRepository)
    {
        $this->buyRepository = $buyRepository;
    }

    public function getAll(){
        return $this->buyRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->buyRepository->store($validated);
    }

    public function delete($id){
        return $this->buyRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->buyRepository->update($validated);
    }
    
}
