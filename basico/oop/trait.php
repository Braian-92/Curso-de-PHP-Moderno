<?php
//! trait son para compartir funcionalidades en multiples clases que no tengan relación alguna

trait EmailSender {
  public function sendMail(){
    echo "Se envia un mail";
  }
}

trait Db {
  public function save(){
    echo "Se guarda en la base de datos";
  }
}


trait Log {
  //! se puede usar encapsulamiento de alcance
  protected function log(string $message, string $filename){
    if(!file_exists($filename)){
      file_put_contents($filename, "");
    }

    $current = file_get_contents($filename);
    $current .= date("Y-m-d H:i:s") . " - " . $message . "\n";
    file_put_contents($filename, $current);
  }
}


class Invoice {
  use EmailSender, Db, Log;

  function create() {
    echo "Se crea la factura<br/>";
    $this->log("Se creo la factura", "log.txt");
  }
}

$invoice = new Invoice();

$invoice->sendMail();
$invoice->save();
$invoice->create();