<?php
header('Content-Type: application/json');

require_once __DIR__ . '/autoload.php';

use app\business\Add;
use app\business\Get;
use app\business\Update;
use app\business\Delete;

use app\data\Repository;

use app\validators\Validator;

use app\exceptions\ValidationException;
use app\exceptions\DataException;

use app\database\RepositoryDB;

// $repository = new Repository();
$validator = new Validator();

try {
  $repository = new RepositoryDB();

  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':

      
      $body = json_decode(file_get_contents('php://input'), true);
      $add = new Add($repository, $validator);
      $add->add($body);
      http_response_code(201);
      echo json_encode(['message' => 'Elemento agregado correctamente']);
      break;
    case 'PUT':
      $body = json_decode(file_get_contents('php://input'), true);
      $update = new Update($repository, $validator);
      $update->update($body);
      http_response_code(200);
      echo json_encode(['message' => 'Elemento actualizado correctamente']);
      break;
    case 'DELETE':
      $id = $_GET['id'];
      $delete = new Delete($repository, $validator);
      $delete->delete($id);
      http_response_code(200);
      echo json_encode(['message' => 'Elemento eliminado correctamente']);
      break;
    case 'GET':
      $get = new Get($repository);
      http_response_code(200);
      echo json_encode($get->get());
      break;
    
    default:
      //! metodo no permitido
      http_response_code(405);
      break;
  }
} catch (ValidationException $e) {
  //! 400 alguien esta enviando algo mal
  http_response_code(400);
  echo json_encode(['error' => $e->getMessage()]);
} catch (DataException $e) {
  //! el recurso no se encuentra
  http_response_code(404);
  echo json_encode(['error' => $e->getMessage()]);
} catch (PDOException $e) { 
  //! error en el servidor
  http_response_code(500);
  echo json_encode(['error' => 'Error en la base de datos: '.$e->getMessage()]);
} catch (\Exception $e) { //! el "\" es para poder usar las clases globales del php
  //! error en el servidor
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
} catch (TypeError $e) {
  http_response_code(400);
  echo json_encode(['error' => 'Se capturo un TypeError ' . $e->getMessage()]);
}