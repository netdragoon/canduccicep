<?php namespace Canducci\Cep;

/**
 * Class Cep
 * @package Canducci\Cep
 */
class Cep
{
    /**
     * @var CepRequest
     */
    private $cepRequest;

    /**
     * Cep constructor.
     * @param CepRequest $cepRequest
     */
    public function __construct(CepRequest $cepRequest)
    {
        $this->cepRequest = $cepRequest;
    }

    /**
     * @param $value
     * @return CepResponse
     * @throws \Exception
     */
    public function find($value): CepResponse {
        return $this->cepRequest->get($this->url($value));
    }

    /**
     * @param $value
     * @return string
     */
    protected function url($value): string {
        return "https://viacep.com.br/ws/{$value}/json/";
    }
}