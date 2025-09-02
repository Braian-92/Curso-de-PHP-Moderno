<?php

$sale = new Sale(10.5, date('y-m-d'));
$sale = new Sale(10.5, date('y-m-d'));
echo Sale::$count . ' - estatic <br/>';
//! eventos globales, se aplica a todas las instancias realizadas
Sale::reset();
$sale = new Sale(10.5, date('y-m-d'));
echo Sale::$count . ' - estatic <br/>';


$sale->total = 11;
$sale->date = date('y');

echo '<pre>';
var_dump($sale);
echo '</pre>';

$sale->createInvoice();

class Sale {
  public $total;
  public $date;
  //! propiedad estatica
  public static $count;

  public function __construct($total, $date){
    echo 'Se ha creado el objeto.<br/>';
    $this->total = $total;
    $this->date = $date;
    self::$count++;
  }

  public function __destruct(){
    echo 'Se ha eliminado el objeto.<br/>';
  }

  public static function reset(){
    echo 'Se ha reseteado el objeto.<br/>';
    self::$count = 0;
  }

  public function createInvoice(){
    echo "Se crea la factura.<br/>";
  }
}
