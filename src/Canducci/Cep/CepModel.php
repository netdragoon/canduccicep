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
    public function getUnidade(): string
    {
        return $this->unidade;
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