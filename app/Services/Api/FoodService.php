<?php

namespace App\Services\Api;

use App\Models\User;
use App\Services\Globals\ResponsesService;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Class FoodService
 * @package App\Services
 */
class FoodService
{
    public function getCountOfDeliveryReservationPerDayOfWeek()
    {

        $client = new Client();
        $response = $client->request('GET', '172.16.20.51/api/food/delivery/statistics/count', ['verify' => false]);
        if ($response->getStatusCode() == 200) {
            $response = json_decode($response->getBody());
            if ($response->status == 0) {
                return 'ASDASDASDA';//redirect()->back()->withErrors(['error'=>'کاربری با این کد پرسنلی در بانک اطلاعاتی یافت نشد']);
            }
            return ResponsesService::success($response);
        }
    }
    public function getCountOfReservationPerDayOfWeek()
    {

        $client = new Client();
        $response = $client->request('GET', '172.16.20.51/api/food/reservation/statistics/count', ['verify' => false]);
        if ($response->getStatusCode() == 200) {
            $response = json_decode($response->getBody());
            if ($response->status == 0) {
                return 'ASDASDASDA';//redirect()->back()->withErrors(['error'=>'کاربری با این کد پرسنلی در بانک اطلاعاتی یافت نشد']);
            }
            return ResponsesService::success($response);
        }
    }
}
