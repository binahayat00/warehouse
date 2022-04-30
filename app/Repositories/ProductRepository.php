<?php

namespace App\Repositories;

use App\Models\Product;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductRepository.
 */
class ProductRepository
{
    public function getAll(){
        return Product::all();
    }

    public function store($data){
        return Product::create([
            'name'=>$data['name'],
            'Attributes'=>$data['Attributes'],
            'worn'=>$data['worn'],
            'descriptions'=>$data['descriptions'],
            'file_id'=>$data['file_id'],
            'category_id'=>$data['category_id'],
            'rayvarz_id'=>$data['rayvarz_id'],
            'technical_index_id'=>$data['technical_index_id'],
        ]);
    }

    public function delete($id){
        return Product::destroy($id);
    }

    public function update($data){
        return Product::where([
                'id'=>$data['id']
            ])->update([
                'name'=>$data['name'],
                'Attributes'=>$data['Attributes'],
                'worn'=>$data['worn'],
                'descriptions'=>$data['descriptions'],
                'file_id'=>$data['file_id'],
                'category_id'=>$data['category_id'],
                'rayvarz_id'=>$data['rayvarz_id'],
                'technical_index_id'=>$data['technical_index_id'],
        ]);
    }
}
