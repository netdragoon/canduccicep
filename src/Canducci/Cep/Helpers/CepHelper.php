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