<?php

$beer = new stdClass();

$beer->name = "Erdinger";
$beer->alcohol = 8.5;


$beer->name = "Erdinger Pikantus";

echo $beer->name;


$arr = (array) $beer;

echo gettype($arr);
echo $arr['name'];

$arrLocation = [
  "address" => "calle 123",
  "country" => "Arg" 
];

$objLocation = (object) $arrLocation;

echo gettype($objLocation);

echo $objLocation->address;