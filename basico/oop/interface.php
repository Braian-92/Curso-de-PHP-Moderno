<?php

interface SendInterface {
  public function send(string $message);
}

interface SaveInterface {
  public function save();
}

class Document implements SendInterface, SaveInterface {
  public function send(string $message) {
    echo "Se envia la venta $message";
  }

  public function save(){
    echo "Se guarda la venta en la nube";
  }
}

class BeerRepository implements SaveInterface {
  function save(){
    echo "Se guarda en la nube";
  }
}

class SaveProcess {
  private SaveInterface $saveManager;

  public function  __construct(SaveInterface $saveManager){
    $this->saveManager = $saveManager;
  }

  public function keep() {
    echo "hacemos algo de antes<br/>";
    $this->saveManager->save();
  }
}

$beerRepository = new BeerRepository();
$document = new Document();
//! Ya que ambos tienen el mismo modelo se puede usar como inyeccion de dependencia
// $saveProcess = new SaveProcess($beerRepository);
$saveProcess = new SaveProcess($document);
$saveProcess->keep();