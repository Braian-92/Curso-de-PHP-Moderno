<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;

$peoples = [
  new People("BRAIAN", 1),
  new People("HERNAN", 2),
  new People("ZAMUDIO", 3),
];

$greater2Years = array_filter(
  $peoples,
  fn ($person) => $person->age >= 2
);

show($greater2Years);

$withOutZamudio = array_filter(
  $peoples,
  fn ($person) => $person->name != 'ZAMUDIO'
);

show($withOutZamudio);