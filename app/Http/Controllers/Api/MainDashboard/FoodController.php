<?php

namespace App\Http\Controllers\Api\MainDashboard;

use App\Http\Controllers\Controller;
use App\Services\Api\FoodService;
use App\Services\Globals\ResponsesService;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class FoodController extends Controller
{
    protected $foodService;
    public function __construct(FoodService $foodService) {
        $this->foodService = $foodService;
    }
    public function getCountOfDeliveryReservationPerDayOfWeek() {

        try {
            $result = $this->foodService->getCountOfDeliveryReservationPerDayOfWeek();
        } catch (Exception $exception) {
            ResponsesService::exception($exception);
        }
        return response()->json($result,$result['status']);

    }

    public function getCountOfReservationPerDayOfWeek() {

        try {
            $result = $this->foodService->getCountOfReservationPerDayOfWeek();
        } catch (Exception $exception) {
            ResponsesService::exception($exception);
        }
        return response()->json($result,$result['status']);

    }

}
