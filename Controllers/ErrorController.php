<?php

namespace Controllers;

class ErrorController extends BaseController
{
 function NotFound()
 {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
  exit;
 }
}
