<?php namespace Canducci\Cep\Contracts;

interface ICepClient {

    /**
     * @param $url
     * @return mixed
     */
    public function get($url);

}