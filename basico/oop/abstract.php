<?php
//! las clases abstractas son moldes de clases
//! se utilizan para diseño de software
// $product = new Product(); //! ERROR: no se puede instanciar una clase abtracta

$beer = new Beer("Delirium", 15);
echo $beer->getName();

showInfo($beer);

function showInfo(Product $product){
  echo " $ ".$product->calculatePrice();
}

abstract class Product {
  protected float $price;
  protected string $name;

  abstract public function  calculatePrice() : float;

  public function getName(): string{
    return $this->name;
  }
}

class Beer extends Product {
  const TAX = 1.1; //! las constantes van en mayusculas

  public function __construct($name, $price){
    $this->name = $name;
    $this->price = $price;
  }

  public function calculatePrice(): float {
    return $this->price * self::TAX;
  }
}