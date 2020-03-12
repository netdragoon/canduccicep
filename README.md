# Canducci Cep

CEP do Brazil - Web Service [https://www.viacep.com.br](viacep.com.br)

[![PHP Composer](https://github.com/netdragoon/canduccicep/workflows/PHP%20Composer/badge.svg)](https://packagist.org/packages/canducci/cep)
[![Downloads](https://img.shields.io/packagist/dt/canducci/cep.svg?style=flat)](https://packagist.org/packages/canducci/cep)
[![License](https://img.shields.io/packagist/l/canducci/cep.svg)](https://packagist.org/packages/canducci/cep)
[![Version](https://img.shields.io/packagist/v/canducci/cep.svg?label=version)](https://packagist.org/packages/canducci/cep)

[Versão de configuração V2 - clique aqui](https://github.com/netdragoon/canduccicep/blob/master/READMEv2.md)

## Instalação do Pacote

```sh
composer require canducci/cep
```


## Configuração

###### 1) Laravel

Se você utiliza o `Framework` [Laravel](https://www.laravel.com) segue logo abaixo as confgurações após a instalação.

1. Entre na pasta `app/config` no arquivo `app.php`.
2. No arquivo procure o `array` `providers`
3. Entre com o `provider` no final da lista como exemplo:

    ````php
    'providers' => [
        ...
        Canducci\Cep\Providers\CepServiceProvider::class
    ]


4. Dentro do mesmo arquivo (`app.php`) configure os apelidos (`Facades`) como exemplo:
    
    ```php
    'aliases' => [
        ...
        'Cep' => Canducci\Cep\Facades\Cep::class,
        'Endereco' => Canducci\Cep\Facades\Endereco::class
    ]  

5. Como utilizar?

    ```php
    Route::get('/cep', function(\Canducci\Cep\Cep $cep){
        $cepResponse = $cep->find('19200000');
        $data = $cepResponse->getCepModel();        
        return response()->json($data);
    });

    Route::get('/endereco', function(\Canducci\Cep\Endereco $endereco){
        $enderecoResponse = $endereco->find('sp','são paulo', 'ave');
        $data = $enderecoResponse->getCepModels();        
        return response()->json($data);
    });