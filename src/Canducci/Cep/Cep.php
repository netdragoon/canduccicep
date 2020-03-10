<?php namespace Canducci\Cep;

/**
 * Class Cep
 * @package Canducci\Cep
 */
class Cep
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Cep constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
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
        $data = $this->request->get($this->url($value));
        return $this->formatted($data['body'], $data['httpCode']);
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