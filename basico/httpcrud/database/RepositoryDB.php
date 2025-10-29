<?php

namespace app\database;

use PDO;
use app\interfaces\RepositoryInterface;
use app\Database\BaseRepository;

class RepositoryDB extends BaseRepository implements RepositoryInterface{
  const TABLE = 'beer';

  public function get(): array
  {
    return [];
  }

  public function exists($id): bool
  {
    return false;
  }

  public function create($data)
  {
    
  }

  public function update($data)
  {
    
  }

  public function delete($id)
  {
    
  }
}