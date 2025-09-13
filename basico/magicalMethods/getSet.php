<?php

//! cuando empieza con __ es que es un metodo magico ejemplo (__construct)

$person = new Person();
$person->name = 'Braian';
echo $person->name.'<br/>';
echo $person->country.'<br/>';
$person->address = 'Calle XYZ';
echo $person->address.'<br/>';

class Person {
  public int $id;
  public string $name;
  public array $data = [];

  public function __get($name){
    // echo "No existe $name en el objeto<br/>";
    return $this->data[$name];
  }

  public function __set($name, $value) {
    // echo "no se puede agregar $value a $name<br/>";
    $this->data[$name] = $value;
  }
}