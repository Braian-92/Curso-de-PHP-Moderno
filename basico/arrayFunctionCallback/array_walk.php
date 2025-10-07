<?php

require "modelsArray/functions.php";


$numbers = [1,2,3,4,5];

//! este NO! permite enviar por referencia &
$numbersX2 = array_map(fn ($num) => $num * 2, $numbers);

show($numbers);
show($numbersX2);

//! equivalencia a un foreach
array_walk(
  $numbers,
  function($num) {
    echo $num . "<br/>";
  }
);


array_walk(
  $numbers,
  fn (&$num) //! para modificar la referencia poner &
    => $num *= 10 //! *= se retorna y guarda en el mismo valor
);

show($numbers);