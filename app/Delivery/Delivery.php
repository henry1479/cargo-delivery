<?php

namespace App\Delivery;

use App\Database\DB;
use App\Services\DistanceService;
use App\Services\GeocodingService;

abstract class Delivery
{

    const BASE_WEIGHT = 1.0;

    protected string $kladr1;
    protected string $kladr2;

    protected  float $weight;

    public function __construct( string $kladr1, string $kladr2, float $weight)
    {
        $this->kladr1 = $kladr1;
        $this->kladr2 = $kladr2;
        $this->weight = $weight;
    }

    /**
     * @return false|string
     * модуль подсчета цены доставки,
     * его необходимо реализовать
     * в наследниках
     */
    abstract function count() : false | string;


    /**
     * @return array
     * выбирает все компанни из базы данных
     *
     */
    protected function getCompanies() : array
    {
        return DB::Select("SELECT * FROM companies");
    }


    /**
     * @return float
     * возвращает расстояние между пунктами отправления
     * и получения в виде числа с плавающей точкой
     */
    protected function getDistance () : float
    {
        $geoservice = new GeocodingService();
        $coord1 = $geoservice->getLongLat($this ->kladr1);
        $coord2 = $geoservice->getLongLat($this ->kladr2);

        return  DistanceService::distance(
            (float) $coord1[1],
            (float) $coord1[0],
            (float) $coord2[1],
            (float) $coord2[0],
            "K"
        );

    }

}