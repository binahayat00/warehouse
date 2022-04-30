<?php

namespace Tests\Unit;

use App\Repositories\RequestRepository;
use App\Services\RequestService;
use App\Services\TimeService;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testTime(){
        $timeService = new TimeService();
        $currentYear = ($timeService)->currentYear();
        $currentMonth = ($timeService)->currentMonth();
        $currentDay = ($timeService)->currentDay();
        $currentDate = ($timeService)->currentManualDate();
        //var_dump([$currentYear,$currentMonth,$currentDay,$currentDate]);die;
        //'LKHYgbn776tgubkjhk'
        //var_dump(RequestService::generateRandomNumber());die;
        $this->assertTrue(true);
    }

}
