<?php

namespace Tests\ServicesTests;
use PHPUnit\Framework\TestCase;
use App\Services\GeocodingService;
use ReflectionClass;


class GeocodingServiceTest extends  TestCase {

    public GeocodingService $mock;
    public function __construct( ?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mock = new GeocodingService();
    }

    public function testGetLongLatReturnTwoElementsArray () {
        $this->assertCount(2, $this->mock->getLongLat(),
            "Массив не содержит необходимое количество элементов");
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetDataReturnsNullIfParameterIsNull()
    {
        $class = new ReflectionClass(GeocodingService::class);
        $method = $class->getMethod('getData');
        $method->setAccessible(true);
        $result = $method->invoke($this->mock, null);
        $this->assertNull($result, "Метод вернул null");
    }
}
