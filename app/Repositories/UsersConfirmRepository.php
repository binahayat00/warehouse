<?php

namespace App\Repositories;

use App\Models\UsersConfirm;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UsersConfirmRepository.
 */
class UsersConfirmRepository
{
    public function getAll(){
        return UsersConfirm::all();
    }

    public function store($data){
        return UsersConfirm::create([
            'user_id' => $data['user_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }

    public function delete($id){
        return UsersConfirm::destroy($id);
    }

    public function update($data){
        return UsersConfirm::where([
            'id' => $data['id']
        ])->update([
            'user_id' => $data['user_id'],
            'confirm_id' => $data['confirm_id'],
        ]);
    }

    public function getByUserId($userId){
        return UsersConfirm::with('user','confirm')->where([
            'user_id' => $userId
        ])->get();
    }
}
