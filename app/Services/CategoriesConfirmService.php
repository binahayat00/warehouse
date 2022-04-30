<?php

namespace App\Services;

use App\Repositories\CategoriesConfirmRepository;

/**
 * Class CategoriesConfirmService
 * @package App\Services
 */
class CategoriesConfirmService
{
    protected $categoriesConfirmRepository;
    public function __construct(CategoriesConfirmRepository $categoriesConfirmRepository)
    {
        $this->categoriesConfirmRepository = $categoriesConfirmRepository;
    }

    public function getAll(){
        return $this->categoriesConfirmRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->categoriesConfirmRepository->store($validated);
    }

    public function delete($id){
        return $this->categoriesConfirmRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->categoriesConfirmRepository->update($validated);
    }

}
