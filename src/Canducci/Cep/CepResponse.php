<?php

namespace Canducci\Cep;

/**
 * Class CepResponse
 * @package Canducci\Cep
 */
class CepResponse
{
    protected $ok = false;
    protected $cepModel = null;

    /**
     * CepResponse constructor.
     * @param bool $ok
     * @param CepModel|null $cepModel
     * @throws \Exception
     */
    public function __construct(bool $ok, CepModel $cepModel = null)
    {
        if (!is_bool($ok)) {
            throw new \Exception("Variavel não é do tipo true/false");
        }
        $this->ok = $ok;
        $this->cepModel = $cepModel;
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return CepModel
     */
    public function getCepModel(): ?CepModel
    {
        return $this->cepModel;
    }
}
