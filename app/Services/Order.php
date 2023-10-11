<?php

namespace App\Services;



class Order
{

    private string $kladr1;
    private string $kladr2;
    private string $weight;


    public function __construct(string $param1, string $param2, string $param3)
    {
        $this->kladr1 = strip_tags($param1);
        $this->kladr2 = strip_tags($param2);
        $this->weight =  strip_tags($param3);

    }


    public function check() {
        if($this->kladr2 == null || strlen($this->kladr2) < 1) {
            return ["error" => "Введите правильный адрес пункта назначения"];
        }
        if($this->kladr1 == null || strlen($this->kladr1) < 1) {
            return ["error" => "Введите правильный адрес пункта отправления"];
        }
        if($this->weight == null || strlen($this->weight) < 1 || !settype($this->weight,"float")) {
            return ["error" => "Введите корректную массу отправления"];
        }

        return [
            "kladr1" => $this->kladr1,
            "kladr2" => $this->kladr2,
            "weight" => (float) $this->weight
        ];


    }

}