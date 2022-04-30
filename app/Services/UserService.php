<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(){
        return $this->userRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->userRepository->store($validated);
    }

    public function delete($id){
        return $this->userRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->userRepository->update($validated);
    }

    public static function getUserId(){
        return (isset(auth()->user()->id)) ? auth()->user()->id : 1;
    }

}
