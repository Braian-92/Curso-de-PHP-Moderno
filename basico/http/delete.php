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

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

  extract($_GET, EXTR_SKIP);

  if(isset($id)){
    $index = get($id, $arr);

    if(isset($arr[$index])){
      unset($arr[$index]);
      $arr = array_values($arr);
      //! exitoso
      http_response_code(200);
      echo json_encode(
        [
          'message' => "Datos eliminados en el servidor",
          'data' => $arr
        ]
      );
    }else{
      //! no existe el recurso
      http_response_code(404);
      echo json_encode(
        [
          'error' => "No existe el identificador: $id"
        ]
      );
    }
  }else{
    //! información erronea por el cliente
    http_response_code(400);
    echo json_encode(
      [
        'error' => 'Información erronea.'
      ]
    );
  }

}else{
  //! 405 es intolerancia al metodo
  http_response_code(405);
  echo json_encode(
    [
      'error' => 'La solicitud no es del tipo DELETE'
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