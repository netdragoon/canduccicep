<?php namespace Canducci\Cep\Contracts;

interface IEndereco
{
    /**
     * @param $uf
     * @param $cidade
     * @param $logradouro
     * @return mixed
     */
    public function find($uf, $cidade, $logradouro);

    /**
     * @return mixed
     */
    public function toArray();

    /**
     * @return mixed
     */
    public function toJson();
}