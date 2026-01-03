<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// NOTA: Ajustado para buscar en la carpeta hermana 'laravel_core'
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// NOTA: Ajustado para buscar en la carpeta hermana 'laravel_core'
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// NOTA: Ajustado para buscar en la carpeta hermana 'laravel_core'
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
