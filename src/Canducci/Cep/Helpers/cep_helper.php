<?php
    if (!function_exists('cep'))
    {
        function cep($cep): \Canducci\Cep\CepResponse
        {
            $canducciCep = new Canducci\Cep\Cep(new Canducci\Cep\CepRequest());
            return $canducciCep->find($cep);
        }
    }