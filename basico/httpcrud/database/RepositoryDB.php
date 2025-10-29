<?php

namespace app\database;

use PDO;
use app\interfaces\RepositoryInterface;
use app\Database\BaseRepository;

/**
 * EXPLICACIÓN DE EXTENDS E IMPLEMENTS:
 * 
 * EXTENDS (Herencia):
 * - RepositoryDB EXTENDS BaseRepository
 * - Significa que RepositoryDB "hereda" de BaseRepository
 * - Obtiene automáticamente todas las propiedades y métodos de BaseRepository
 * - En este caso: hereda la propiedad $pdo y el constructor que establece la conexión a la BD
 * - NO es obligatorio implementar métodos (BaseRepository es abstracta pero no tiene métodos abstractos)
 * 
 * IMPLEMENTS (Contrato):
 * - RepositoryDB IMPLEMENTS RepositoryInterface
 * - Significa que RepositoryDB debe cumplir un "contrato" definido en RepositoryInterface
 * - OBLIGA a implementar TODOS los métodos definidos en la interfaz:
 *   - create($data)
 *   - get(): array
 *   - update($data)
 *   - delete(int $id)
 *   - exists(int $id): bool
 * - Si no implementas alguno de estos métodos, PHP dará error fatal
 * 
 * RESUMEN:
 * - EXTENDS = "Soy hijo de..." (herencia, obtienes funcionalidad)
 * - IMPLEMENTS = "Me comprometo a..." (contrato, debes cumplir)
 */
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