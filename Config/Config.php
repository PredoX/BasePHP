<?php
require_once './vendor/autoload.php';

// carga de valiables de ambiente 
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./');
$dotenv->load();
define('host', $_ENV['host_db']);
define('baseDatos', $_ENV['name_db']);
define('usuario', $_ENV['user_db']);
define('password', $_ENV['pass_db']);
define('zonaHoraria', $_ENV['zonaHoraria']);
define('ubicacion', $_ENV['ubicacion']);
define('Sistema', $_ENV['sistema']);
ini_set('default_charset', 'UTF-8');


date_default_timezone_set(zonaHoraria);
