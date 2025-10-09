<?php


require_once __DIR__ . '/autoload.php';

use app\exceptions\ValidationException;
use app\exceptions\DataException;

try {
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      break;
    case 'PUT':
      break;
    case 'DELETE':
      break;
    case 'GET':
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