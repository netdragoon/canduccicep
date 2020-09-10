<?php

namespace Canducci\Cep;

/**
 * Class CepRequest
 * @package Canducci\Cep
 */
class CepRequest
{
    /**
     * @param $url
     * @return array
     * @throws \Exception
     */
    public function get($url): array
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $body = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            return ['body' => $body, 'httpCode' => $info['http_code']];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
