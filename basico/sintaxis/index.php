<?php
declare(strict_types=1); // ← Debe ser la PRIMERA línea (antes de cualquier output o namespace)
$number = 1;
$number = '1';
$number = (int)'1'; //! castear un tipo de dato

echo gettype($number);


//! termarop

//! condicion, true, false
$value = true ? 'Verdad' : 'Falsa';

echo $value;


//! cortes y saltos en bucles

for($i = 1; $i <= 10; $i++){
  if($i == 5){
    continue; //! salteo de iteración
  }
  if($i % 2 == 0){
    break; //! corte total del bucle
  }
  // echo $i;
}


//! while

$i = 1;

while($i < 10){
  // continue; //! salteo de iteración
  // break; //! corte total del bucle
  echo $i;
  $i++;
}

//! dowhile
$i = 1;
do{
  echo "entro $i <br/>";
  $i++;
}while($i < 10);


//! funciones

function add(int $a, int $b): int {
  $result = $a + $b;
  return $result;
}

// echo add('10', '20'); //! declare(strict_types=1); para que alerte la falla de datos
echo add(10, 20);
?>