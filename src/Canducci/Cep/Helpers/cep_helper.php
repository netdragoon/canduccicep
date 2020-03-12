<?php
    if (!function_exists('cep'))
    {
        /**
         * @param string $value
         * @return \Canducci\Cep\CepResponse
         * @throws Exception
         */
        function cep(string $value): \Canducci\Cep\CepResponse
        {
            /** @var $cep */
            $cep = function_exists('app')
                ? app('Cep')
                : new \Canducci\Cep\Cep(new \Canducci\Cep\CepRequest());
            return $cep->find($value);
        }
    }
    if (!function_exists('endereco'))
    {
        /**
         * @param string $uf
         * @param string $cidade
         * @param string $logradouro
         * @return \Canducci\Cep\EnderecoResponse
         * @throws Exception
         */
        function endereco(string $uf, string $cidade, string $logradouro): \Canducci\Cep\EnderecoResponse
        {
            /** @var $endereco */
            $endereco = function_exists('app')
                ? app('Endereco')
                : new \Canducci\Cep\Endereco(new \Canducci\Cep\CepRequest());
            return $endereco->find($uf, $cidade, $logradouro);
        }
    }