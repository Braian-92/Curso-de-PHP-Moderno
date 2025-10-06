<?php

function show($n){

  //! caso base
  if($n < 1){
    return;
  }

  echo "Hola: ".$n."<br/>";
  show($n-1);
}

show(30);