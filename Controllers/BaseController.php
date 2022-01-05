<?php

namespace Controllers;

use Config\Session;
use PDO;

class BaseController
{
 /** @var Session */
 protected  $session;
 /** @var PDO */
 protected $conn;
 function __construct(PDO $conn = null)
 {
  $this->session = unserialize($_SESSION['SessionClass']);
  $this->conn = is_null($conn) ? new PDO('mysql:host=' . host . ';dbname=' . baseDatos . ';charset=utf8;', usuario, password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) : $conn;
 }

 protected function ejecutarSQL(string $sql, string $model = '', array $data = [])
 {
  $stmt = $this->conn->prepare($sql);
  if ($model != '')  $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
  if ($model == '') $stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt->execute($data);
  return $stmt;
 }
}
