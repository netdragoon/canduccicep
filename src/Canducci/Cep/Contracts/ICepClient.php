<?php namespace Canducci\Cep\Contracts;

interface ICepClient {
    public function get($url);
}