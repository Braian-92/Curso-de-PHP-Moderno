<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;


$peoples = [
  new People("BRAIAN", 1),
  new People("HERNAN", 2),
  new People("ZAMUDIO", 3),
];

$names = array_map(fn ($person) => $person->name, $peoples);

show($names);

$namesWithFormat = array_map(
  fn ($person) => "<b>".$person->name."</b>",
  $peoples
);

show($namesWithFormat);

$namesWithNumber = array_map(
  fn ($person, $index) => ($index+1)." - ".$person->name,
  $peoples,
  array_keys($peoples) //! se agregan parametros para poder agregarlos como segundo parametro del fn
);

show($namesWithNumber);

$namesWithNumber2 = array_map(
  fn ($person, $index) => ["ID" => $index, "NAME" => $person->name],
  $peoples,
  array_keys($peoples) //! se agregan parametros para poder agregarlos como segundo parametro del fn
);

show($namesWithNumber2);

