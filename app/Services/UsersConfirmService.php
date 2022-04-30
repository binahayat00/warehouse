<?php

namespace App\Services;

use App\Models\UsersConfirm;
use App\Repositories\UsersConfirmRepository;
/**
 * Class UsersConfirmService
 * @package App\Services
 */
class UsersConfirmService
{
    protected $usersConfirmRepository;
    public function __construct(UsersConfirmRepository $usersConfirmRepository)
    {
        $this->usersConfirmRepository = $usersConfirmRepository;
    }

    public function getAll(){
        return $this->usersConfirmRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->usersConfirmRepository->store($validated);
    }

    public function delete($id){
        return $this->usersConfirmRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->usersConfirmRepository->update($validated);
    }

    public function getByUserId($data){
        $validated = $data->validated();
        $validated['userId'] = isset($validated['userId']) ? $validated['userId'] : UserService::getUserId();
        return $this->usersConfirmRepository->getByUserId($validated['userId']);
    }
}
