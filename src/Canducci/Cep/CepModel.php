<?php namespace Canducci\Cep;

class CepModel {

  protected $cep;
  protected $logradouro;
  protected $complemento;
  protected $bairro;
  protected $localidade;
  protected $uf;
  protected $unidade;
  protected $ibge;
  protected $gia;

  public function __set($atributo, $value){
    $this->$atributo = $value;
  }

  public function __get($atributo){
    return $this->$atributo;
  }
}

/**
 * {
  "cep": "01001-000",
  "logradouro": "Praça da Sé",
  "complemento": "lado ímpar",
  "bairro": "Sé",
  "localidade": "São Paulo",
  "uf": "SP",
  "unidade": "",
  "ibge": "3550308",
  "gia": "1004"
}
 */