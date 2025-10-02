<?php

//! open, close principle
//! principio abierto/cerrado

//! indica que que los modulos/funciones/clases deben estar abiertas para extension pero cerradas para modificación

interface OpInterface {
  public function calculate(float $a, float $b): float;
}

class Sum Implements OpInterface {
  public function calculate(float $a, float $b): float{
    return $a + $b;
  }
}

class Mul Implements OpInterface {
  public function calculate(float $a, float $b): float{
    return $a * $b;
  }
}

class Sub Implements OpInterface {
  public function calculate(float $a, float $b): float{
    return $a - $b;
  }
}

class Calculator {
  private OpInterface $op;

  public function __construct(opInterface $op)
  {
    $this->op = $op;
  }

  public function calculate(float $a, float $b): float{
    return $this->op->calculate($a, $b);
  }
}

$sum = new Sum();
$mul = new Mul();
$sub = new Sub();

//! switchear entre algunos de los 4
// $calculator = new Calculator($sum);
// $calculator = new Calculator($mul);
$calculator = new Calculator($sub);

echo $calculator->calculate(4,5);
