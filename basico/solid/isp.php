<?php

//! principio de segregación de interfaces

interface CrudBaseInterface {
  public function add();
  public function get();
}

interface UpdateCrudInterface{
  public function update();
}

interface DeleteCrudInterface{
  public function delete();  
}

interface GeneralCrudInterface extends CrudBaseInterface, UpdateCrudInterface, DeleteCrudInterface {}

class UserCrud implements GeneralCrudInterface {
  public function add(){
    echo "Se agrega";
  }
  public function get(){
    echo "Se obtiene";
  }
  public function update(){
    echo "Se modifica";
  }
  public function delete(){
    echo "Se elimina";
  }
}

class SaleCrud implements CrudBaseInterface, DeleteCrudInterface {
  public function add(){
    echo "Se agrega";
  }
  public function get(){
    echo "Se obtiene";
  }
  public function delete(){
    echo "Se elimina";
  }
}

function general(GeneralCrudInterface $crud){
  $crud->add();
  $crud->get();
  $crud->update();
  $crud->delete();
}

function get(CrudBaseInterface $crud){
  $crud->get();
}
general(new UserCrud());
get(new SaleCrud());