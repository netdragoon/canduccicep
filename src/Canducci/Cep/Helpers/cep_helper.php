<?php
    if (!function_exists('cep'))
    {
        /**
         * @param $value
         * @return \Canducci\Cep\CepResponse
         */
        function cep(string $value): \Canducci\Cep\CepResponse
        {
            /** @var $cep */
            $cep = function_exists('app')
                ? app('cep')
                : new Canducci\Cep\Cep(new Canducci\Cep\CepRequest());
            return $cep->find($value);
        }
    }