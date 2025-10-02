<?php

class Add {
  public function __invoke($a, $b){
    return $a + $b;
  }
}

$add = new Add();

echo $add(2,3);


class Validator {
  private int $min;
  private int $max;
  public string $error;

  public function __construct(int $min, int $max){
    $this->min = $min;
    $this->max = $max;
  }

  public function __invoke($text){
    $long = strlen($text);

    if($long < $this->min || $long > $this->max){
      $this->error = "El texto esta fuera del rango";
      return false;
    }
    return true;
  }
}

$val = new Validator(1, 20);


echo $val("asdadasdasdasdasdasasdasdassd") ? "es valido" : $val->error;
echo $val("asdada") ? "es valido" : $val->error;
