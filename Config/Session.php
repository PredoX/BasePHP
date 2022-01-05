<?php

namespace Config;

class Session
{
 private $prefix;
 function __construct()
 {
  $this->prefix = Sistema . '_';
  session_start([
   'cookie_lifetime' => 360,
  ]);
  $_SESSION['SessionClass'] = serialize($this);
 }
 function __get($name)
 {
  $name = $this->prefix . $name;
  return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
 }
 function __set($name, $value)
 {
  $name = $this->prefix . $name;
  $_SESSION[$name] = $value;
 }
 function cerrar()
 {
  session_destroy();
 }
}
