<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;


$peoples = [
  new People("BRAIAN", 4),
  new People("HERNAN", 2),
  new People("ZAMUDIO", 3),
];


usort(
  $peoples,
  fn ($people1, $people2) => $people1->age <=> $people2->age
);

show($peoples);

//! descendente
usort(
  $peoples,
  fn ($people1, $people2) => $people2->age <=> $people1->age
);

show($peoples);