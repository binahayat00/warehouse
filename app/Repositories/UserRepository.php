<?php

namespace App\Repositories;

use App\Models\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository
{
    public function getAll(){
        return User::all();
    }

    public function store($data){
        return User::create([
            'user_id' => $data['user_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }

    public function delete($id){
        return User::destroy($id);
    }

    public function update($data){
        return User::where([
            'id' => $data['id']
        ])->update([
            'user_id' => $data['user_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }
}
