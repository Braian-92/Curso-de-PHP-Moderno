<?php

$engine = new Engine('log.txt');
$engine->run("name", "some", true);
$engine->walk("name", "some", true);

Engine::some("name", "some", true);

class Engine {
  private $fileName;

  public function __construct($fileName){
    $this->fileName = $fileName;
  }

  public function run(){
    echo "corre<br/>";
  }

  public function __call($name, $args){
    echo "Llamando al metodo $name con los argumentos: [" . implode(', ', $args) . "]<br/>";

    $message = $name.": ";
    $message .= $args[0]." - ";
    $message .= date("Y-m-d H:i:s") . "\n";

    if(!file_exists($this->fileName)){
      file_put_contents($this->fileName, "");
    }

    file_put_contents($this->fileName, $message, FILE_APPEND);
  }

  public static function __callStatic($name, $args){
    echo "Llamando al metodo estatico $name con los argumentos: [" . implode(', ', $args) . "]<br/>";
  }
}