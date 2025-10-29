<?php

namespace app\data;

use PDO;

use app\interfaces\DataInterface;
use app\data\BaseData;

//! heredar de BaseData por que tiene la conexion a la base de datos
//! e implementar DataInterface por que tiene el metodo get
class BeerData extends BaseData implements DataInterface{
  const TABLE = 'beer';
  public function get(): array{
    $sql = "SELECT id, name, alcohol FROM ".self::TABLE;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}