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
    //! Validar que data sea un array y tenga la clave name
    if (!is_array($data) || !isset($data['name']) || trim($data['name']) === '') {
      $this->error = 'Nombre es obligatorio';
      return false;
    }

    return true;
  }

  public function validateUpdate($data): bool
  { 
    //! Validar que data sea un array
    if (!is_array($data)) {
      $this->error = 'Datos inválidos';
      return false;
    }

    //! Validar ID
    if (!isset($data['id']) || empty($data['id'])) {
      $this->error = 'ID es obligatorio';
      return false;
    }

    //! Validar nombre
    if (!isset($data['name']) || trim($data['name']) === '') {
      $this->error = 'Nombre es obligatorio';
      return false;
    }

    return true;
  }
  
}