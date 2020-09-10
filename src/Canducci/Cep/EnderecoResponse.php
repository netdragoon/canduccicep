<?php

namespace Canducci\Cep;

/**
 * Class EnderecoResponse
 * @package Canducci\Cep
 */
class EnderecoResponse
{
    protected $ok = false;
    protected $cepModels = null;

    /**
     * EnderecoResponse constructor.
     * @param bool $ok
     * @param array|null $cepModels
     * @throws \Exception
     */
    public function __construct(bool $ok, array $cepModels = null)
    {
        if (!is_bool($ok)) {
            throw new \Exception("Variable ok not null");
        }
        $this->ok = $ok;
        $this->cepModels = $cepModels;
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return array|null
     */
    public function getCepModels(): ?array
    {
        return $this->cepModels;
    }
}
