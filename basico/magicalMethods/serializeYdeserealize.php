<?php

class User {
  public $name;
  private $email;
  private $password;

  public function __construct($name, $email, $password){
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public function __serialize(): array {
    return [
      'name' => strtoupper($this->name),
      'email' => $this->email
    ];
  }

  public function __unserialize(array $data): void
  {
    $this->name = $data['name'];
    $this->email = $data['email'];
    $this->password = null;
  }
}

$user = new User("Braian", "braian@braian.com", "1234556");
$s = serialize($user);

echo $s . "<br/><br/>";

$obj = unserialize($s);

echo '<pre>';
var_dump($obj);
echo '</pre>';

echo $obj->name;