<?php

use DI\ContainerBuilder;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/config/global.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(require __DIR__ . '/config/config.php'); // Cargar las definiciones establecidas en config.

try {
    return $containerBuilder->build();
} catch (Exception $e) {
    echo $e->getMessage(); // No do this in real life
}