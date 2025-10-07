<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;


$peoples1 = [
  new People("BRAIAN", 4),
  new People("HERNAN", 2),
  new People("ZAMUDIO", 3),
];

$peoples2 = [
  new People("BRAIAN", 4),
  new People("HERNAN2", 2),
  new People("ZAMUDIO", 3),
];

$diferences = array_udiff(
  $peoples1,
  $peoples2,
  fn ($person1, $person2)
    => $person1->name <=> $person2->name
);

show($diferences);