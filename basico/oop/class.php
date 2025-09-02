<?php

$sale = new Sale(10.5, date('y-m-d'));
$sale->total = 11;
$sale->date = date('y');

echo '<pre>';
var_dump($sale);
echo '</pre>';

$sale->createInvoice();

class Sale {
  public $total;
  public $date;

  public function __construct($total, $date){
    $this->total = $total;
    $this->date = $date;
  }

  public function __destruct(){
    echo 'Se ha eliminado el objeto.<br/>';
  }
  public function createInvoice(){
    echo "Se crea la factura.<br/>";
  }
}
