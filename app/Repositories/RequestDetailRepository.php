<?php

namespace App\Repositories;

use App\Models\RequestDetail;
use App\Repositories\Globals\fieldRepository;
use Illuminate\Support\Facades\Schema;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class RequestDetailRepository.
 */
class RequestDetailRepository
{
    public function getAll()
    {
        return RequestDetail::with('request', 'product', 'status', 'file', 'delivery')->get();
    }

    public function store($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests_details');
        return RequestDetail::create($fields);
    }

    public function dalete($id)
    {
        return RequestDetail::destroy($id);
    }

    public function update($data)
    {
        $fields = fieldRepository::tableFields($data, $table = 'requests_details');
        return RequestDetail::where([
            'id' => $data['id']
        ])->update($fields);
    }

    public function updateDeliveryId(array $data){
        return RequestDetail::where([
            'id' => $data['id']
        ])->update([
            'delivery_id' => $data['delivery_id']
        ]);
    }
}
