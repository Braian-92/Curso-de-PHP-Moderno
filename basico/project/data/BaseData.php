<?php

namespace app\data;

USE PDO;

abstract class BaseData {
  //! protected para que sus hijos puedan utilizarla
  protected $pdo;

  public function __construct() {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
    $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}