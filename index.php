<?php

use Controllers\ErrorController;

try {
 require_once('Config/Config.php');
 $ubicacion = isset($_ENV['ubicacion']) ? $_ENV['ubicacion'] : $_SERVER['REQUEST_URI'];
 $ruta = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], $ubicacion) + strlen($ubicacion));
 $ruta = explode(' ', trim(str_replace('/', ' ', $ruta)));
 if (!isset($ruta[0])) throw new Error("Controllador no encontrado", 4);
 $controller = 'Controllers\\' . $ruta[0] . 'Controller';
 if (!isset($ruta[1])) throw new Error("Metodo no encontrado", 4);
 if (!class_exists($controller)) throw new Error("No existe controllador solicitado", 1);
 $action = $ruta[1] . 'Action';
 $Controller = new $controller();
 if (!method_exists($Controller, $action)) throw new Error("No existe metodo en clase asociada", 4);
 array_shift($ruta);
 array_shift($ruta);
 $tipoReq = $_SERVER['REQUEST_METHOD'];
 if ($tipoReq == 'GET') $var = $ruta;
 if ($tipoReq == 'POST') {
  if (count($ruta) > 0) throw new Error("error en la peticion", 3);
  $var = $_POST;
 }
 $resp =  call_user_func_array([$Controller, $action], $var);
 $encode = json_encode($resp);
 echo $encode;
} catch (Error $e) {
 $err = new ErrorController();
 if ($e->getCode() === 4) $err->NotFound();
}
