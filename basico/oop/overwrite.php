<?php
//! polimorfirmo - sobrescritura de metodos

class Discount {
  protected $discount = 0;

  public function __construct($discount) {
    $this->discount = $discount;
  }

  function getDescount($price){
    echo "Se aplica el descuento.<br/>";
    return $price * $this->discount;
  }
}

class SpecialDiscount extends Discount {
  const SPETIAL_DISCOUNT = 2;

  //! sobrescribiendo el padre
  function getDescount($price){
    echo "Se aplica el descuento especial.<br/>";
    return $price * $this->discount * self::SPETIAL_DISCOUNT;
  }
}

$discount = new SpecialDiscount(0.1);
$discountAmount = $discount->getDescount(100);
echo $discountAmount;