<?php
header('Content-Type: application/json');

$arr = [
  [
    'id' => 1,
    'nombre' => 'Braian'
  ],
  [
    'id' => 2,
    'nombre' => 'Hernan'
  ]
];

if($_SERVER['REQUEST_METHOD'] == 'PUT'){

  $json = file_get_contents('php://input');
  // Decodificamos como array asociativo para poder usar extract()
  $data = json_decode($json, true);

  // Validaciones básicas
  if(!is_array($data) || !array_key_exists('id', $data) || !array_key_exists('nombre', $data)){
    http_response_code(400);
    echo json_encode([
      'error' => 'Información erronea. JSON inválido o faltan campos (id, nombre).'
    ]);
    exit;
  }

  // Extraemos variables: $id y $nombre (EXTR_SKIP evita sobrescribir variables existentes)
  extract($data, EXTR_SKIP);

  // Aseguramos tipos y valores por seguridad
  $id = (int)($id ?? 0);
  $nombre = trim((string)($nombre ?? ''));

  if($id <= 0 || $nombre === ''){
    http_response_code(400);
    echo json_encode([
      'error' => 'Información erronea. id debe ser mayor que 0 y nombre no puede estar vacío.'
    ]);
    exit;
  }

  $index = get($id, $arr);

  if($index >= 0){
    // Actualizar registro existente
    $arr[$index]['nombre'] = $nombre;
    http_response_code(200);
    // Devolver el array completo después de la actualización
    echo json_encode([
      'success' => true,
      'message' => 'Registro actualizado.',
      'data' => $arr
    ]);
    exit;
  }else{
    // No se permite crear en PUT: si no existe devolver 404
    http_response_code(404);
    echo json_encode([
      'error' => 'Registro no encontrado.'
    ]);
    exit;
  }

}else{
  //! 405 es intolerancia al metodo
  http_response_code(405);
  echo json_encode(
    [
      'error' => 'La solicitud no es del tipo PUT'
    ]
  );
}

function get(int $id, array $arr) {
  for($i=0; $i<count($arr); $i++){
    if($arr[$i]['id'] === $id){
      return $i;
    }
  }

  return -1;
}