<?php
//! las clases abstractas son moldes de clases

abstract class Product {
  protected float $price;
  protected string $name;

  abstract public function  calculatePrice() : float;

  public function getName(): string{
    return $this->name;
  }
}
