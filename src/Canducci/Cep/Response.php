<?php namespace Canducci\Cep;

class Response {
  
  protected $ok = false;
  protected CepModel $cepModel;

  public function __set($atributo, $value){
    $this->$atributo = $value;
  }

  public function __get($atributo){
    return $this->$atributo;
  }  
}