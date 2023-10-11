<?php

namespace App;

use App\Delivery\QuickDelivery;
use App\Delivery\SlowDelivery;
use App\Services\Order;

class Server
{

    public static function work(): void {
            $result = (new Order($_POST["klad1"], $_POST["klad2"], $_POST["weight"]))->check();
            if(array_key_exists("error", $result)) {
                echo json_encode($result["error"], JSON_UNESCAPED_SLASHES);
            } else{
                if($_POST["delivery"] == "slow") {
                    echo (new SlowDelivery($result["kladr1"], $result["kladr2"], $result["weight"]))->count();
                } else {
                    echo (new QuickDelivery($result["kladr1"], $result["kladr2"], $result["weight"]))->count();

                }
            }
    }
}