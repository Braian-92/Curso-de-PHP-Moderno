<?php

$const = 15;

//! "use" permite que las funciones anonimas compartan informacion externa
//! multiclave use($const, $const2, $const3)
$some = function(float $a, float $b) use($const) : float{
  return $a + $b + $const;
};


function show(callable $fn, float $a, float $b) {
  echo $fn($a, $b);
}
show($some, 3, 5);