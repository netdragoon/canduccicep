<?php

if (!function_exists('cep'))
{
    function cep($cep)
    {

        $cep = new Canducci\Cep\Cep(new Canducci\Cep\CepClient());

        return $cep->find($cep);

    }
}
