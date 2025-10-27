<?php


require_once __DIR__ . '/autoload.php';

use app\business\Add;
use app\business\Get;
use app\business\Update;
use app\business\Delete;

use app\data\Repository;

use app\validators\Validator;

use app\exceptions\ValidationException;
use app\exceptions\DataException;

$repository = new Repository();
$validator = new Validator();

try {
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      $body = json_decode(file_get_contents('php://input'), true);
      $add = new Add($repository, $validator);
      $add->add($body);
      break;
    case 'PUT':
      $body = json_decode(file_get_contents('php://input'), true);
      $update = new Update($repository, $validator);
      $update->update($body);
      break;
    case 'DELETE':
      $id = $_GET['id'];
      $delete = new Delete($repository, $validator);
      $delete->delete($id);
      break;
    case 'GET':
      $get = new Get($repository);
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
  echo json_encode(['error' => e->getMessage()]);
} catch (DataException $e) {
  //! el recurso no se encuentra
  http_response_code(404);
  echo json_encode(['error' => e->getMessage()]);
} catch (\Exception $e) { //! el "\" es para poder usar las clases globales del php
  //! error en el servidor
  http_response_code(500);
  echo json_encode(['error' => e->getMessage()]);
}