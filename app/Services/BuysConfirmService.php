<?php

namespace App\Services;

use App\Repositories\BuysConfirmRepository;

/**
 * Class BuysConfirmService
 * @package App\Services
 */
class BuysConfirmService
{
    protected $buysConfirmRepository;
    public function __construct(BuysConfirmRepository $buysConfirmRepository)
    {
        $this->buysConfirmRepository = $buysConfirmRepository;
    }

    public function getAll(){
        return $this->buysConfirmRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->buysConfirmRepository->store($validated);
    }

    public function delete($id){
        return $this->buysConfirmRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->buysConfirmRepository->update($validated);
    }
}
