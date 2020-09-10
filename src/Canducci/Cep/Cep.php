<?php

namespace Canducci\Cep;

use Exception;

/**
 * Class Cep
 * @package Canducci\Cep
 */
class Cep
{
    /**
     * @var CepRequest|Request
     */
    private $request;

    /**
     * Cep constructor.
     * @param CepRequest $request
     */
    public function __construct(CepRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param $value
     * @return CepResponse
     * @throws \Exception
     */
    public function find(string $value): CepResponse
    {
        if ($this->valid($value)) {
            $data = $this->request->get($this->url($value));
            return $this->formatted($data['body'], $data['httpCode']);
        }
        throw new Exception("Cep com formato inválido. Exemplo: 01414-001 ou 01414001");
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function valid(string $value): bool
    {
        if (mb_strlen($value) === 8 && preg_match('/^[0-9]{8}$/', $value)) {
            return true;
        }
        if (mb_strlen($value) === 9 && preg_match('/^[0-9]{5}-[0-9]{3}$/', $value)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $value
     * @return string
     */
    protected function url(string $value): string
    {
        return "https://viacep.com.br/ws/{$value}/json/";
    }

    /**
     * @param string $body
     * @param int $httpCode
     * @return CepResponse
     * @throws \Exception
     */
    protected function formatted(string $body, int $httpCode): CepResponse
    {
        $rows = json_decode($body, true);
        $cepModel = null;
        $ok = false;
        if ($httpCode === 200) {
            if (empty($rows['erro'])) {
                $ok = true;
                $cepModel = new CepModel();
                foreach ($rows as $key => $value) {
                    $cepModel->$key = $value;
                }
            }
        }
        return new CepResponse($ok, $cepModel);
    }
}
