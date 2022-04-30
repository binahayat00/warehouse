<?php

namespace App\Services;

use App\Repositories\ConfirmRepository;

/**
 * Class ConfirmService
 * @package App\Services
 */
class ConfirmService
{
    protected $confirmRepository;
    public function __construct(ConfirmRepository $confirmRepository)
    {
        $this->confirmRepository = $confirmRepository;
    }

    public function getAll(){
        return $this->confirmRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->confirmRepository->store($validated);
    }

    public function dalate($id){
        return $this->confirmRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->confirmRepository->update($validated);
    }
}
