<?php
declare(strict_types=1);

$sale = new Sale(10.5, date('y-m-d'));
$sale = new Sale(10.5, date('y-m-d'));
echo Sale::$count . ' - estatic <br/>';
//! eventos globales, se aplica a todas las instancias realizadas
echo Sale::reset();
$sale = new Sale(10.5, date('y-m-d'));
echo Sale::$count . ' - estatic <br/>';


$sale->total = 11;
$sale->date = date('y');

echo '<pre>';
var_dump($sale);
echo '</pre>';

echo $sale->createInvoice();

$concept = new Concept("cerveza", 10);
$sale->addConcept($concept);

echo '<pre>';
var_dump($sale->concepts);
echo '</pre>';

class Sale {
  public float $total;
  public string $date;
  public array $concepts;
  //! propiedad estatica
  public static $count;

  public function __construct(float $total, string $date){
    echo 'Se ha creado el objeto.<br/>';
    $this->total = $total;
    $this->date = $date;
    $this->concepts = [];
    self::$count++;
  }

  public function __destruct(){
    echo 'Se ha eliminado el objeto.<br/>';
  }

  public static function reset(): string{
    return 'Se ha reseteado el objeto.<br/>';
    self::$count = 0;
  }

  public function addConcept(Concept $concept){
    $this->concepts[] = $concept;
  }

  public function createInvoice(): string{
    return "Se crea la factura.<br/>";
  }
}

class Concept {
  public string $description;
  public float $amount;

  public function __construct(string $description, float $amount){
    $this->description = $description;
    $this->amount = $amount;
  }
}
