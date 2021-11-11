<?php
require_once './vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./');
$dotenv->load();

ini_set('default_charset', 'UTF-8');
date_default_timezone_set('America/Santiago');

# Generar conexion principal
$_SESSION['conexion'] = new PDO('mysql:host=' . $_ENV['host_db'] . ';dbname=' . $_ENV['name_db'] . ';charset=utf8;', $_ENV['user_db'], $_ENV['pass_db'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
