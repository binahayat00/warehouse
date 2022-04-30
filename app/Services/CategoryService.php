<?php

namespace App\Services;

use App\Repositories\CategoryRepository;


class CategoryService
{
    protected $categoryrepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryrepository = $categoryRepository;
    }

    public function getAll(){
        return $this->categoryrepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->categoryrepository->store($validated);
    }

    public function delete($id){
        return $this->categoryrepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->categoryrepository->update($validated);
    }
}
