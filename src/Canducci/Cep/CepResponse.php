<?php namespace Canducci\Cep;

class CepResponse {
  
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
            throw new \Exception("Variable ok not null");
        }
        $this->ok = $ok;
        $this->cepModel = $cepModel;
    }

    /**
     * @return bool
     */
    public function isOk() {
        return $this->ok;
    }

    /**
     * @return CepModel
     */
    public function get(): ?CepModel {
        return $this->cepModel;
    }
}