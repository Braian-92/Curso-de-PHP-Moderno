<?php

class Car {
  private string $model;
  private string $brand;
  private int $year;

  public function __construct($model, $brand, $year){
    $this->model = $model;
    $this->brand = $brand;
    $this->year = $year;
  }

  public function __toString(){
    return "El auto es del modelo '$this->model' de la marca '$this->brand' del año '$this->year'.";
  }
}


$car = new Car("HVR", "Honda", 2024);
$info = (string)$car;

echo $car;

echo "<br/>";

echo gettype($info);