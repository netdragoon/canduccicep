<?php use Canducci\Cep;


    require('../src/Canducci/Cep/CepModel.php');
    require('../src/Canducci/Cep/CepRequest.php');
    require('../src/Canducci/Cep/CepResponse.php');


    $request = new Cep\CepRequest();

    $response = $request->get('https://viacep.com.br/ws/19200000/json/');

    var_dump($response->get()->getGia());