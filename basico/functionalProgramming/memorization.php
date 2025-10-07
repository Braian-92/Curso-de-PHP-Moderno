<?php

function add($a, $b){
  return $a + $b;
}

function addMemo(){
  $memo = [];

  return function($a, $b) use(&$memo) {
    $index = $a."-".$b;

    if(isset($memo[$index])){
      echo "Ya existe la operación <br/>";
      return $memo[$index];
    }

    echo "No existe la operación <br/>";

    $memo[$index] = $a + $b;
    return $memo[$index];
  };
}

$mySum = addMemo();

echo $mySum(4,5)."<br/>";
echo $mySum(4,5)."<br/>";