<?php

namespace Tests\ServicesTests;

use App\Services\Order;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    public Order $mock;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mock = new Order("Москва", "Смоленск", "40");
    }


    public function testErrorInCaseIncorrectData() : void
    {
        $this->mock = new Order("","", "");
        $this->assertArrayHasKey("error", $this->mock->check());
    }

    public function testReturnsThreeElementsArrayInCaseSuccessCheck() {
        $this->assertCount(3, $this->mock->check());
    }

    public function testWeightIsFloatInCaseSuccess() {
        $this->assertTrue(is_float($this->mock->check()["weight"]));
    }
}