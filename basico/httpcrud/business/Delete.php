<?php

namespace app\business;

use app\exceptions\DataException;
use app\interfaces\RepositoryInterface;
use app\interfaces\DataExeption;

class Delete {
  private RepositoryInterface $repository;

  public function __construct(RepositoryInterface $repository){
    $this->repository = $repository;
  }

  function delete(int $id){
    if(!$this->repository->exists($id)){
      throw new DataException('No existe el dato a eliminar');
    }

    $this->repository->delete($id);
  }
}