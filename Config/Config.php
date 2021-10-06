<?php
require_once './vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./');
$dotenv->load();

ini_set('default_charset', 'UTF-8');
date_default_timezone_set('America/Santiago');
