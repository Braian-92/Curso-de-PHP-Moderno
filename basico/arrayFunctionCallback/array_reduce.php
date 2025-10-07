<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;


$peoples = [
  new People("BRAIAN", 1),
  new People("HERNAN", 2),
  new People("ZAMUDIO", 3),
];

$sum = array_reduce(
  $peoples,
  fn ($current, $people) => $current + $people->age,
  0 //! valor inicial de current
);

echo $sum . "<br/>";

$namesPipe = array_reduce(
  $peoples,
  fn ($current, $people) => $current.$people->name."|",
  '' //! valor inicial de current
);

echo $namesPipe . "<br/>";


$contentHtml = array_reduce(
  $peoples,
  fn ($current, $people) => $current."<li>".$people->name."</li>",
  '<ul>' //! valor inicial de current
);

$contentHtml.= '</ul>';

echo $contentHtml . "<br/>";