<?php

namespace App\Repositories;

use App\Models\Request;
use App\Repositories\Globals\fieldRepository;
use Illuminate\Support\Facades\Schema;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RequestRepository.
 */
class RequestRepository
{
    public function getAll()
    {
        return Request::with(
            'unit',
            'user',
            'status',
            'request_detail',
            'request_detail.product',
            'request_detail.status',
            'request_detail.delivery',
            'request_detail.product',
            'request_detail.warehouse',
            'request_detail.request_detail_confirm',
            'request_detail.request_detail_confirm.confirm',
            'request_detail.request_detail_confirm.user',
        )->get();
    }

    public function store($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests');
        return Request::create($fields);
    }

    public function delete($id)
    {
        return Request::destroy($id);
    }

    public function update($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests');
        return Request::where([
            'id' => $data['id']
        ])->update($fields);
    }

    public function allRequestsOfUserId($userId)
    {
        return Request::with(
            'unit',
            'user',
            'status',
            'request_detail',
            'request_detail.product',
            'request_detail.status',
            'request_detail.delivery',
            'request_detail.product',
            'request_detail.warehouse',
            'request_detail.request_detail_confirm',
            'request_detail.request_detail_confirm.user',
            'request_detail.request_detail_confirm.confirm',
        )->where([
            'user_id' => $userId
        ])->get();
    }

    public function allRequestConfirmsByUserId($userId)
    {
        return Request::with(
            'unit',
            'user',
            'status',
            'request_detail',
            'request_detail.product',
            'request_detail.status',
            'request_detail.delivery',
            'request_detail.product',
            'request_detail.warehouse',
            'request_detail.request_detail_confirm.user',
            'request_detail.request_detail_confirm.confirm',
        )->with([
            'request_detail.request_detail_confirm' => function ($query) use ($userId) {
                $query->where('user_id', '=', $userId);
            }
        ])->get();
    }

    public function allRequestsByDeliveryId($deliveryId)
    {
        return Request::with([
            'request_detail' => function ($query) use ($deliveryId) {
                $query->where('delivery_id', '=', $deliveryId);
            }
        ])->whereHas(
            'request_detail',
            function ($query) use ($deliveryId) {
                $query->where('delivery_id', '=', $deliveryId);
            }
        )->get();
    }

    public function allConfirmsOfUserId($userId)
    {
        return Request::with(
            'unit',
            'user',
            'status',
            'request_detail',
            'request_detail.product',
            'request_detail.status',
            'request_detail.delivery',
            'request_detail.product',
            'request_detail.warehouse',
            'request_detail.request_detail_confirm.user',
            'request_detail.request_detail_confirm.confirm',
        )->with([
            'request_detail.request_detail_confirm' => function ($query) use ($userId) {
                $query->where('user_id', '=', $userId);
            }
        ])->get();
    }
}
