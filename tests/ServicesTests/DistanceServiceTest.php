<?php

namespace ServicesTests;


use App\Services\DistanceService;
use PHPUnit\Framework\TestCase;

class DistanceServiceTest extends TestCase
{

    public function testDistanceReturnsFloatInCaseCorrectParameters()
    {
        $testClass = new DistanceService();

        $this->assertIsFloat($testClass->distance(1.2, 2.5, 4.5,5.6, "K"),
            "Метод не возвращает дробное число"
        );


    }

}