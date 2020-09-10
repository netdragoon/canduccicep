# Canducci Cep

CEP do Brazil - Web Service [https://www.viacep.com.br](viacep.com.br)

[![Version](https://img.shields.io/packagist/v/canducci/cep.svg?label=version)](https://packagist.org/packages/canducci/cep)
[![Downloads](https://img.shields.io/packagist/dt/canducci/cep.svg?style=flat)](https://packagist.org/packages/canducci/cep)
[![PHP Composer](https://github.com/netdragoon/canduccicep/workflows/PHP%20Composer/badge.svg)](https://packagist.org/packages/canducci/cep)
[![License](https://img.shields.io/packagist/l/canducci/cep.svg)](https://packagist.org/packages/canducci/cep)

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

   ```php
   'providers' => [
       ...
       Canducci\Cep\Providers\CepServiceProvider::class
   ]

   ```

4. Dentro do mesmo arquivo (`app.php`) configure os apelidos (`Facades`) como exemplo:

   ```php
   'aliases' => [
       ...
       'Cep' => Canducci\Cep\Facades\Cep::class,
       'Endereco' => Canducci\Cep\Facades\Endereco::class
   ]

   ```

5. Como utilizar?

   5.1 Com Injeção de Dependencia:

   ```php
   Route::get('/cep', function(\Canducci\Cep\Cep $cep){
       $cepResponse = $cep->find('01010000');
       $data = $cepResponse->getCepModel();
       return response()->json($data);
   });

   Route::get('/endereco', function(\Canducci\Cep\Endereco $endereco){
       $enderecoResponse = $endereco->find('sp','são paulo', 'ave');
       $data = $enderecoResponse->getCepModels();
       return response()->json($data);
   });
   ```

   5.2 Com Facade Laravel:

   ```php
   Route::get('/cep', function(){
      $cepResponse = \Canducci\Cep\Facades\Cep::find('01010000');
      $data = $cepResponse->getCepModel();
      return response()->json($data);
   });

   Route::get('/endereco', function(){
      $enderecoResponse = \Canducci\Cep\Facades\Endereco::find('sp','são paulo', 'ave');
      $data = $enderecoResponse->getCepModels();
      return response()->json($data);
   });
   ```

   5.3 Com `function` (função)

   ```php
   Route::get('/cep', function(){
      $cepResponse = cep('01010000');
      $data = $cepResponse->getCepModel();
      return response()->json($data);
   });

   Route::get('/endereco', function(){
       $enderecoResponse = endereco('sp','são paulo','ave');
       $data = $enderecoResponse->getCepModels();
       return response()->json($data);
    });
   ```

6. Resposta satisfatória:

   6.1 - Utilize o método `isOk()` para verificar se realmente os dados foram recebidos:

   ```php
   $cepResponse = cep('01010000');
   if ($cepResponse->isOk())
   {
       $data = $cepResponse->getCepModel();
       return response()->json($data);
   }
   ```

   e os dados são recuperados pelos metodos ou propriedades, exemplo:

   ```php
    $model->getCep() ou $model->cep
    $model->getLogradouro() ou $model->logradouro
    $model->getComplemento() ou $model->c omplemento
    $model->getBairro() ou $model->bairro
    $model->getLocalidade() ou $m odel->localidade
    $model->getUf() ou $model->uf
    $model->getDdd() ou $model->ddd
    $model->getSiafi() ou $model->sia fi
    $model->getIbge() ou $model->ib   ge
    $model->getGia() ou $model->gia
   ```

   6.2 - Dados informados errados

   6.2.1 - No `Cep` o valor informado deve possuir um desses formatos:

   - 01010000, ou
   - 01010-000

   para uma resposta satisfatória, se não um exceção será lançada.

   6.2.2 - No `Endereco` os valores informados segue essas regras

   - Uf com 2 letras
   - Cidade com no minimo 3 letras
   - Logradouro com no minimo 3 letras

   se não uma exceção será lançada.

###### 2) Qualquer código que usa o composer.phar:

```
λ php composer.phar require canducci/cep
```

logo após isso, inclua no seu código o `autoload.php` que está dentro da pasta `vendor`, exemplo:

```php
<?php

  require_once 'vendor/autoload.php';

  $cepResponse = cep('01010000');
  $data = $cepResponse->getCepModel();
  echo json_encode($data);
```
