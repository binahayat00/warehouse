<?php

namespace App\Repositories;

use App\Models\CategoriesConfirm;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class CategoriesConfirmRepository
{
    public function getAll(){
        return CategoriesConfirm::all();
    }

    public function store($data){
        return CategoriesConfirm::create([
            'category_id' => $data['category_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }

    public function delete($id){
        return CategoriesConfirm::destroy($id);
    }

    public function update($data){
        return CategoriesConfirm::where([
            'id' => $data['id']
        ])->update([
            'category_id' => $data['category_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }
}
