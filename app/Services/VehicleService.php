<?php

namespace App\Services;

use App\Repositories\VehicleRepository;
use App\Services\Globals\ResponsesService;

/**
 * Class VehicleService
 * @package App\Services
 */
class VehicleService
{
    protected $vehicleRepository, $deliveryService;
    public function __construct(VehicleRepository $vehicleRepository, DeliveryService $deliveryService)
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->deliveryService = $deliveryService;
    }

    public function getAll()
    {
        return ResponsesService::success($this->vehicleRepository->getAll());
    }

    public function store(array $data)
    {
        return ResponsesService::success($this->vehicleRepository->store($data));
    }

    public function delete(int $id)
    {
        return ($this->deliveryService->checkVehicleExist($id)) ? ResponsesService::error($id, 'وسیله نقلیه قبلا تعریف شده و قابل حذف نمیباشد!') :ResponsesService::success($this->vehicleRepository->delete($id)) ;
    }

    public function update(array $data)
    {
        return ResponsesService::success($this->vehicleRepository->update($data));
    }
}
