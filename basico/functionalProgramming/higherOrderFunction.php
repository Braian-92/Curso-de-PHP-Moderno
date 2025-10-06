<?php

//! funciones de orden superior
//! es una funcion que puede recibir funciones como parametros o retornar una

//! funcion de uso inferior
$some = function(float $a, float $b): float{
  return $a + $b;
};

//! funcion que no es anonima, tiene un nombre
function mul(float $a, float $b): float{
  return $a * $b;
}

//! funcion de uso superior
//! callable valida que sea de tipo function
function show(callable $fn, float $a, float $b) {
  echo $fn($a, $b);
}

show($some, 3, 5);
echo '<br/>';
//! las que no son anonimas se envian como string
show('mul', 3, 5);