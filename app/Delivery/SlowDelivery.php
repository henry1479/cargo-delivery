<?php

namespace App\Delivery;



use App\Database\DB;
use App\Services\DistanceService;
use App\Services\GeocodingService;

use DateTime;

class SlowDelivery extends Delivery
{

    const BASE_COST = 150;
    public function __construct(string $kladr1, string $kladr2, float $weight)
    {
        parent::__construct($kladr1, $kladr2, $weight);
    }


    /**
     * @return false | string
     */
    public function count() : false|string
    {
        $distance = $this->getDistance();
        $companies = $this->getCompanies();

        $result = [];
        foreach ($companies as $company) {
            $price = ($company["price"] <= self::BASE_COST) ? $company["price"] : self::BASE_COST;
            $timeCoefficient = round($distance / $company["distance"], 2);
            $weightCoefficient =  self::BASE_WEIGHT * $this-> weight;
            $totalCoefficient = $timeCoefficient * $weightCoefficient;
            $result[$company["name"]] = [
                "coefficient" => round($totalCoefficient,2),
                "timestamp" => self::addInterval(floor($timeCoefficient * $company["time"])),
            ];
        }


        return json_encode($result);
    }

    /**
     * @param float $interval
     * @return string|null
     */
    public static function addInterval(float $interval) : string | null
    {
        $dt = new DateTime();
        try {
            $dt->add(\DateInterval::createFromDateString($interval . " days"));


        } catch (\Exception $error) {
            return null;
    }
         return $dt->format("Y-m-d");
    }






}