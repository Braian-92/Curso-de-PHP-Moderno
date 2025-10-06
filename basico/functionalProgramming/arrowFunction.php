<?php

$some = function(float $a, float $b): float{
  return $a + $b;
};

function show(callable $fn, float $a, float $b) {
  echo $fn($a, $b);
}

//! metodo resumido arrow, SOLO PERMITE UNA LINEA DE CODIGO, NO PERMITE {}
$sum = fn (float $a, float $b) => $a + $b;



show($sum, 3, 5);
echo "<br/>";
show(fn ($a, $b) => $a - $b, 3, 5);