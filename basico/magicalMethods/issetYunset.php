<?php

$a = 1;

if(isset($a)){
  echo "existe<br/>";
}else{
  echo "No existe<br/>";
}

$wine = new Wine();

if(isset($wine->name)){
  echo "existe<br/>";
}else{
  echo "No existe<br/>";
}

unset($wine->style);

class Wine {
  public $style;
  private $data = [
    "name" => "vinos"
  ];

  //! este siempre se ejecuta a diff de unset
  public function __isset($name){
    echo "se comprueba existencia $name<br/>";
    return isset($this->data[$name]);
  }

  //! se ejecuta cuando queres eliminar una propiedad que no existe;
  public function __unset($name){
    echo "se intento eliminar la propiedad $name<br/>";
  }
}