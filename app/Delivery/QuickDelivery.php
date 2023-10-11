<?php

namespace App\Delivery;



class QuickDelivery extends Delivery
{



    public function __construct(string $kladr1, string $kladr2, float $weight)
    {
        parent::__construct($kladr1, $kladr2, $weight);
    }


    /**
     * @return false | string
     */
    public function count() : false | string
    {
        $companies = $this->getCompanies();
        $distance = $this->getDistance();
        $now = getdate();


        $result = [];

        foreach ($companies as $company) {
            $timeCoefficient = round($distance / $company["distance"], 2);
            $weightCoefficient =  self::BASE_WEIGHT * $this->weight;
            $price = round($company["price"] * $timeCoefficient * $weightCoefficient, 2);
            $days = round($timeCoefficient * $company["time"]);

            if($now["hours"] >= 18 && $now["minutes"] >= 0 ) {
                $days += 1;
            }

            $result[$company["name"]] = [
                "price" => $price,
                "period" => $days,
            ];
        }

        return json_encode($result);
    }



}