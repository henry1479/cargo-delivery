<?php

namespace Tests\DeliveryTests;

use App\Delivery\Delivery;
use App\Delivery\QuickDelivery;
use App\Services\GeocodingService;
use App\Services\Order;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class DeliveryTest extends TestCase
{
    public Delivery $mock;

      public function __construct(?string $name = null, array $data = [], $dataName = '')
      {
          parent::__construct($name, $data, $dataName);
          $this->mock = new QuickDelivery("Калининград", "Астана", 23.0);
      }

    /**
     * @return void
     * @throws \ReflectionException
     *  проверяет, что метод получения дистанции между пунктами
     *  возвращает вещественное число
     */
      public function testGetDistanceReturnsFloat()
      {
          $class = new ReflectionClass(Delivery::class);
          $method = $class->getMethod('getDistance');
          $method->setAccessible(true);
          $result = $method->invoke($this->mock, null);
          $this->assertTrue(is_float($result));
      }




}