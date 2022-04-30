<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\RequestDetailRepository;
/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll(){
        return $this->productRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->productRepository->store($validated);
    }

    public function dalete($id){
        return $this->productRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->productRepository->update($validated);
    }
}
