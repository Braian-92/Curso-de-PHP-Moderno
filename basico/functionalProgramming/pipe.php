<?php

//! ejecución de funciones encadenadas

//! desestructuración de argumentos de una funcion ...$names
function showNames(...$names) {
  foreach ($names as $name) {
    echo "$name <br/>";
  }
}

showNames("braian", "hernan", "zamudio");


function pipe(...$funcs) {
  return function ($value) use($funcs) {
    foreach ($funcs as $fn) {
      $value = $fn($value);
    }

    return $value;
  };
}

$toUpper = fn ($s) => strtoupper($s);
$replaceSpace = fn ($s) => str_replace(" ", "", $s);
$replaceNumbers = fn ($s) => preg_replace('/\d+/u', '', $s);

$myPipe = pipe($toUpper, $replaceSpace, $replaceNumbers);

echo $myPipe("ABCD abcd 12 ab");