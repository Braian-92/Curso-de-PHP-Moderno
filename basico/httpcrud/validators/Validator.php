<?php

namespace app\validators;

use app\interfaces\ValidatorInterface;

class Validator implements ValidatorInterface 
{
  private string $error;

  public function getError(): string
  {
    return $this->error;
  }

  public function validateAdd($data): bool
  { 
    //! empty valida si no existe o si esta vacio o es null
    if(empty($data['name'])){
      $this->error = 'Nombre es obligatorio';
      return false;
    }

    return true;
  }

  public function validateUpdate($data): bool
  { 
    //! empty valida si no existe o si esta vacio o es null
    if(empty($data['id'])){
      $this->error = 'ID es obligatorio';
      return false;
    }

    if(empty($data['name'])){
      $this->error = 'Nombre es obligatorio';
      return false;
    }

    return true;
  }
  
}