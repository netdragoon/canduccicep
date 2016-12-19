<?php

if (!function_exists('cep'))
{

    /**
     * @param $cep
     * @return $this
     */
    function cep($cep)
    {

        $canducciCep = new Canducci\Cep\Cep(new Canducci\Cep\CepClient());

        return $canducciCep->find($cep);

    }
}

if (!function_exists('endereco'))
{
    
    /**
     * @param $uf
     * @param $cidade
     * @param $logradouro
     * @return mixed
     */
    function endereco($uf, $cidade, $logradouro)
    {

        $enderecoCep = new Canducci\Cep\Endereco(new Canducci\Cep\CepClient());

        return $enderecoCep->find($uf, $cidade, $logradouro);

    }

}
