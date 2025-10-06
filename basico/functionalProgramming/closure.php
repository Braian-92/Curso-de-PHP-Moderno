<?php
//! closure/clausula

function add(float $number) {
  return function ($number2) use ($number) {
    return $number + $number2;
  };
}

function hi(){
  $count = 0;

  //! usar & para pasarlo como referencia y no como clonado
  return function() use(&$count) {
    $count++;
    return "Hola $count";
  };
}



$s1 = add(10);
$s2 = add(100);

echo $s1(20)."<br/>";
echo $s1(30)."<br/>";
echo $s1(40)."<br/>";

echo "<br/>";
echo $s2(20)."<br/>";
echo $s2(30)."<br/>";
echo $s2(40)."<br/>";

echo "<br/>";
$h1 = hi();
$h2 = hi();

echo $h1()."<br/>";
echo $h1()."<br/>";
echo $h1()."<br/>";
echo $h1()."<br/>";

echo "<br/>";

echo $h2()."<br/>";
echo $h2()."<br/>";
echo $h2()."<br/>";
echo $h2()."<br/>";