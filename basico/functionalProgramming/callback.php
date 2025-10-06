<?php

$numbers = [1, 2, 3, 4, 5, 6];

function process(array $arr, callable $fun){
  $newArr = [];

  foreach($arr as $element){
    $newElement = $fun($element);
    $newArr[] = $newElement;
  }

  return $newArr;
}

$result1 = process($numbers, fn ($e) => $e * 2);

echo '<pre>';
var_dump($result1);
echo '</pre>';

$result2 = process($numbers, fn ($e) => $e + 2);

echo '<pre>';
var_dump($result2);
echo '</pre>';

$result3 = process($numbers, fn ($e) => "El valor es: $e");

echo '<pre>';
var_dump($result3);
echo '</pre>';

$result4 = process($numbers, fn ($e) => "<b>$e</b>");

echo '<pre>';
var_dump($result4);
echo '</pre>';