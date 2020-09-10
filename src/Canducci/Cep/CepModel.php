<?php

namespace Canducci\Cep;

use JsonSerializable;

/**
 * Class CepModel
 * @package Canducci\Cep
 */
class CepModel implements JsonSerializable
{
    protected $cep;
    protected $logradouro;
    protected $complemento;
    protected $bairro;
    protected $localidade;
    protected $uf;
    protected $ddd;
    protected $siafi;
    protected $ibge;
    protected $gia;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param $atributo
     * @param $value
     */
    public function __set($atributo, $value)
    {
        $this->$atributo = $value;
    }

    /**
     * @param $atributo
     * @return mixed
     */
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @return string
     */
    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    /**
     * @return string
     */
    public function getComplemento(): string
    {
        return $this->complemento;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @return string
     */
    public function getLocalidade(): string
    {
        return $this->localidade;
    }

    /**
     * @return string
     */
    public function getUf(): string
    {
        return $this->uf;
    }

    /**
     * @return string
     */
    public function getDdd(): string
    {
        return $this->ddd;
    }

    /**
     * @return string
     */
    public function getSiafi(): string
    {
        return $this->siafi;
    }

    /**
     * @return string
     */
    public function getIbge(): string
    {
        return $this->ibge;
    }

    /**
     * @return string
     */
    public function getGia(): string
    {
        return $this->gia;
    }
}
