<?php

//! Liskob subtitution principle
//! principio de sustitución de Liskob

//! si tu tienes una clase hija, esta tendria que ser sustituible por su clase padre  sin alterar el comportamiento del programa

interface ISendProject {
  public function send();
}

interface IsendMail {
  public function send();
}

class SendMail implements ISendMail {
  public function send() {
    echo "Se envia un correo electrónico";
  }
}

class Project {
  public function create(){
    echo "Se ah creado el proyecto";
  }
}

class SalesProject extends Project implements ISendProject {
  
  private ISendMail $sender; //! composición

  public function __construct(ISendMail $sender){
    $this->sender = $sender;
  }

  public function send() {
    $this->sender->send();
  }
}

class InternalProject extends Project {
  // Extra
}

function send(ISendProject $project){
  $project->send();
}

$sendMail = new SendMail();
send(new SalesProject($sendMail));