<?php

namespace App\Repositories;

use App\Models\Delivery;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class DeliveryRepository
{
    public function getAll(){
        return Delivery::with('user','vehicle')->get();
    }

    public function store($data){
        return Delivery::create([
            'user_id' => $data['user_id'],
            'vehicle_id' => $data['vehicle_id'],
        ]);
    }

    public function delete($id){
        return Delivery::destroy($id);
    }

    public function update($data){
        return Delivery::where([
            'id' => $data['id']
        ])->update([
            'user_id' => $data['user_id'],
            'vehicle_id' => $data['vehicle_id'],
        ]);
    }
}
