<?php

namespace App\Services;

use App\Repositories\StatusRepository;

/**
 * Class StatusService
 * @package App\Services
 */
class StatusService
{
    protected $statusRepository;
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function getAll(){
        return $this->statusRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->statusRepository->store($validated);
    }

    public function delete($id){
        return $this->statusRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->statusRepository->update($validated);
    }
}
