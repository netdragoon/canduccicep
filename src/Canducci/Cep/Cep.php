<?php namespace Canducci\Cep;

use \Exception;

class Cep {


    private $cep;

    private $URL =  'http://viacep.com.br/ws/[cep]/[type]/';


    public function __construct()
    {

        $this->cep = '';

    }
    
    public function find($cep)
    {

        if (mb_strlen($cep) === 8 || mb_strlen($cep) === 9) 
        {

            $this->cep = $cep;

            return $this;

        }

        throw new Exception("Invalid Zip ...");
    }

    private function toReturn($type = '')
    {       

        $url = str_replace(array('[cep]', '[type]'), 
                           array($this->cep, $type), 
                           $this->URL);
        try 
        {

            $get = LoadData::get($url); 

        } 
        catch (Exception $e) 
        {

            throw new Exception("Number and http are invalid");

        }   

        switch ($type) 
        {
            case 'json': 
            {
                $erro = json_decode($get);

                if (isset($erro->erro) && $erro->erro === true) 
                {

                    return null;

                }

                break;
            }
            case 'xml': 
            {
                $erro = simplexml_load_string($get);

                if (isset($erro) && isset($erro->erro) && $erro->erro == 'true') 
                {

                    return null;

                }
                break;
            }
            case 'piped': 
            {
                $erro = explode('|', $get);

                if (isset($erro) && sizeof($erro) === 1) 
                {
                
                    $erro = explode(':', $erro[0]);

                    if (isset($erro) && isset($erro[0]) && isset($erro[1]) && $erro[0] == 'erro' && $erro[1] == true) 
                    {

                        return null;

                    }
                }

                break;
            }
            case 'querty': 
            {

                if ($get === 'erro=true') return null;

                break;
            }
        }

        return $get;

    }

    public function toJson()
    {

        return $this->toReturn('json');

    }

    public function toArray()
    {

        return json_decode($this->toReturn('json'), true);

    }

    public function toObject()
    {
        $class = new \stdClass;

        $array = $this->toArray();

        if (!is_null($array)) 
        {
            
            $class->cep        = $array['cep'];
            $class->logradouro = $array['logradouro'];
            $class->bairro     = $array['bairro'];
            $class->localidade = $array['localidade'];
            $class->uf         = $array['uf'];
            $class->ibge       = $array['ibge'];
            $class->gia        = $array['gia'];

            return $class;
        }               
        return null;

    }

    public function toXml()
    {

        return $this->toReturn('xml');

    }

    public function toSimpleXml()
    {

        return simplexml_load_string($this->toReturn('xml'));

    }

    public function toPiped()
    {

        return $this->toReturn('piped');

    }

    public function toQuerty()
    {

        return $this->toReturn('querty');

    }
}