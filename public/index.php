<?php

require "../vendor/autoload.php";

use App\Server;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



if(isset($_POST)) {
    Server::work();
}


