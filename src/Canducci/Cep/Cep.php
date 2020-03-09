<?php namespace Canducci\Cep;

class Cep
{
    /**
     * @var CepRequest
     */
    private $cepRequest;

    /**
     * Cep constructor.
     */
    public function __construct(CepRequest $cepRequest)
    {
        $this->cepRequest = $cepRequest;
    }

    public function find($value): CepResponse {
        return $this->cepRequest->get($this->url($value));
    }

    protected function url($value): string {
        return "https://viacep.com.br/ws/{$value}/json/";
    }
}