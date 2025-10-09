<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  // $nombre = $data->nombre;
  // $edad = $data->edad;
  //! metodo de desestructuración completa en php
  extract((array)$data);

  // echo $nombre;

  http_response_code(201);
  echo json_encode(
    [
      'message' => "Datos recibidos correctamente: $nombre,$edad"
    ]
  );
}else{
  http_response_code(404);
  echo json_encode(
    [
      'error' => 'La solicitud no es del tipo POST'
    ]
  );
}