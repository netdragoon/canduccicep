<?php namespace Canducci\Cep;

/**
 * Class CepRequest
 * @package Canducci\Cep
 */
class CepRequest {

    /**
     * @param $url
     * @return CepResponse
     * @throws \Exception
     */
    public function get($url): CepResponse
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            return $this->formatted($data, $info['http_code']);
        } catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * @param string $data
     * @param int $httpCode
     * @return CepResponse
     * @throws \Exception
     */
    protected function formatted(string $data, int $httpCode): CepResponse
    {
        $rows = json_decode($data, true);
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