<?php

namespace App\Services;

use App\Models\UsersUnit;
use App\Repositories\UsersUnitRepository;

/**
 * Class UsersUnitService
 * @package App\Services
 */
class UsersUnitService
{
    protected $usersUnitRepository;
    public function __construct(UsersUnitRepository $usersUnitRepository)
    {
        $this->usersUnitRepository = $usersUnitRepository;
    }

    public function getUnitIdByUserId($userId){
        $user = $this->usersUnitRepository->getUnitIdByUserId($userId);
        return (isset($user->unit_id) ? $user->unit_id : 1);
    }


}
