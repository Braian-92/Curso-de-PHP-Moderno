<?php

$array1 = [1, 2, 3];
$array2 = $array1;
$array2[] = 4;

echo '<pre>';
var_dump($array1);
var_dump($array2);
echo '</pre>';

class A {
  public string $label;
}

class Some {
  public string $name;
  //! cuando se clone este objeto va a seguir referenciado
  //! esto que sucede se llama clonacion de profundida y no la hace
  public A $a;

  public function __clone(){
    $this->name = strtoupper($this->name);
    //! clonación a profundidad
    $this->a = clone $this->a;
  }
}

function change(Some $some){
  $some->name = "Ya no tiene algo, se ah cambiado el valor.";
}

$some = new Some();
$some->a = new A();
$some->a->label = "Un label.";
$some->name = "Algo";

$some2 = $some;
$some2->name = "lo cambio";

echo $some2->name . "<br/>";
echo $some->name . "<br/>";
change($some);
echo $some->name . "<br/>";
echo $some2->name . "<br/>";

//! los objetos siempre van por referencia en el 99% de la programación

//! como al clonarlo se pierde la instancia en memotia y dejan de estar enlazados
$newSome = clone $some;
$newSome->a->label = "Cambio el label.";
// $newSome->name = "Lo cambio el clonado.";
echo $some->name."<br/>";
echo $newSome->name."<br/>";
echo "<br/>";
echo "<br/>";
echo $some->a->label."<br/>";
echo $newSome->a->label."<br/>";
