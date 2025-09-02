<?php
declare(strict_types=1);

$sale = new Sale(date('Y-m-d'));
$onlineSale = new OnlineSale(date('Y-m-d'), 'Tarjeta');
echo $onlineSale->createInvoice() . ' - desde onlineSale<br/>';
echo $onlineSale->showInfo() . ' - desde onlineSale<br/>';
$sale = new Sale(date('Y-m-d'));
echo Sale::$count . ' - estatic <br/>';
//! eventos globales, se aplica a todas las instancias realizadas
echo Sale::reset();
$sale = new Sale(date('Y-m-d'));
echo Sale::$count . ' - estatic <br/>';


$sale->setDate(date('Y-m-d'));
// $sale->setDate('ojhadolkhasldkhokhjasohdsa'); //! detectar error

echo '<pre>';
var_dump($sale);
echo '</pre>';

echo $sale->createInvoice() . '<br/>';

$concept = new Concept("cerveza", 10);
$concept2 = new Concept("cerveza2", 12);
$sale->addConcept($concept);
$sale->addConcept($concept2);

echo 'Total: ' . $sale->getTotal() . '<br/>';

class Sale {
  // protected float $total; //! solo visual desde la misma clase y su herencia pero no por fuera
  // private float $total;  //! solo visual desde la misma clase y no en su herencia y tampoco por fuera
  // public float $total;  //! visual en los 3
  protected float $total;
  private string $date;
  private array $concepts;
  //! propiedad estatica
  public static $count;

  public function __construct(string $date){
    echo 'Se ha creado el objeto.<br/>';
    $this->date = $date;
    $this->total = 0;
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
    $this->total += $concept->amount;
  }

  public function getTotal(): float{
    return $this->total;
  }

  public function getDate(): string{
    return $this->date;
  }

  public function setDate(string $date){
    if(strlen($date) > 10 || strlen($date) < 10){
      echo "<h1>ERROR: La fecha es incorrecta ($date)</h1>";
    }
    $this->date = $date;
  }

  public function createInvoice(): string{
    return "Se crea la factura.";
  }
}


class OnlineSale extends Sale{
  public string $paymentMethod;

  public function __construct(string $date, string $paymentMethod){
    parent::__construct($date);
    $this->paymentMethod = $paymentMethod;
  }

  public function showInfo(): string{
    return "La venta tiene un monto de $this->total";
  }
}

class Concept {
  public string $description;
  public int|float $amount;

  //! tipos UNION int|float permite multiple entrada de formato
  public function __construct(string $description, int|float $amount){
    $this->description = $description;
    $this->amount = $amount;
  }
}
