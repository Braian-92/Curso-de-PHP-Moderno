<?php

$sale = new Sale();
$sale->total = 10.5;
$sale->date = date('y-m-d');

echo '<pre>';
var_dump($sale);
echo '</pre>';

class Sale {
  public $total;
  public $date;
}
