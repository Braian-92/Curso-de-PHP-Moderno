<?php

class Animal {
  public string $name;
  public int $age;
  public string $color;

  public function __sleep(){
    //! restringe la informacion que se guarda al serializar
    return ["name", "color"];
  }

  public function __wakeup(){
    echo "Se deserealizo el objeto<br/>";
    $this->age = 0;
    $this->some();
  }

  private function some(){
    echo "El color es: $this->color<br/>";
  }
}

$duck = new Animal();
$duck->name = "Pato";
$duck->age = 2;
$duck->color = "rojo";

$s = serialize($duck);

echo $s . "</br></br>";

$obj = unserialize($s);

print_r($obj);