<?php

interface BudgetInterface {
  public function cost(): float;
}

class BasicBudget implements BudgetInterface {
  private int $hours;
  private float $hourlyRate;

  public function __construct(int $hours, float $hourlyRate){
    $this->hours = $hours;
    $this->hourlyRate = $hourlyRate;
  }

  public function cost(): float{
    //! hora por costo de hora
    return $this->hours * $this->hourlyRate;
  }
}

class BudgetDecorator implements BudgetInterface {
  //! protected para que pueda utilizarla sus hijos
  protected BudgetInterface $budget;

  public function __construct(BudgetInterface $budget){
    $this->budget = $budget;
  }

  public function cost(): float{
    return $this->budget->cost();
  }
}

class ForeignBudgetDecorator extends BudgetDecorator {
  const EXCHANGE_RATE = 1.5;

  //! sobrescribir el metodo del padre
  public function cost(): float{
    //! pero usarlo para aplicarle un multiplicador
    return parent::cost() * self::EXCHANGE_RATE;
  }
}


class CustomerBudgetDecorator extends BudgetDecorator {
  const DISCOUNT = 0.9;

  //! sobrescribir el metodo del padre
  public function cost(): float{
    //! pero usarlo para aplicarle un descuento
    return parent::cost() * self::DISCOUNT;
  }
}



$budget = new BasicBudget(10, 100);
echo "Presupuesto base es: $".$budget->cost()." <br/>";

//! envolverlo con el decorador para cambiar el comportamiento
$foreignBudget = new ForeignBudgetDecorator($budget);
echo "Presupuesto extranjero base es: $".$foreignBudget->cost()." <br/>";

//! envolverlo con el decorador para cambiar el comportamiento
$customerBudget = new CustomerBudgetDecorator($budget);
echo "Presupuesto cliente base es: $".$customerBudget->cost()." <br/>";


