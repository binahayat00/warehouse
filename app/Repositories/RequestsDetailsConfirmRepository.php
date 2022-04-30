<?php

namespace App\Repositories;

use App\Models\RequestsDetailsConfirm;
use App\Repositories\Globals\fieldRepository;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RequestsDetailsConfirmRepository.
 */
class RequestsDetailsConfirmRepository
{
    public function getAll()
    {
        return RequestsDetailsConfirm::all();
    }

    public function store($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests_details_confirms');
        return RequestsDetailsConfirm::create($fields);
    }

    public function dalete($id)
    {
        return RequestsDetailsConfirm::destroy($id);
    }

    public function update($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests_details_confirms');
        return RequestsDetailsConfirm::where([
            'id' => $data['id']
        ])->update($fields);
    }

    public function getRequestsDetailsByConfirmUserId($userId)
    {
        return RequestsDetailsConfirm::where([
            'user_id' => $userId
        ])->get();
    }

    public function confirmsOfRequestDetail($requests_detail_id)
    {
        return RequestsDetailsConfirm::where([
            'requests_detail_id' => $requests_detail_id
        ]);
    }

    public function updateByRequestDetailIdUserIdAndConfirmId(array $data){
        return RequestsDetailsConfirm::where([
            'requests_detail_id' => $data['requests_detail_id'],
            'confirm_id' => $data['confirm_id'],
            'user_id' => $data['user_id'],
        ])->update([
            'confirmed' => $data['confirmed'],
            'description' => $data['description'],
        ]);
    }
}
