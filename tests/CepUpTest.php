<?php

declare(strict_types=1);

namespace PHPUnit\SelfTest\Basic;

use Canducci\Cep\Cep;
use Canducci\Cep\CepModel;
use Canducci\Cep\CepRequest;
use PHPUnit\Framework\TestCase;

class CepUpTest extends TestCase
{
    protected $cep;

    protected $request;
    protected $cepResponseOk;
    protected $responseReponseHelperOk;

    public function setUp(): void
    {
        $this->request = new CepRequest();
        $this->cep = new Cep($this->request);
        $this->cepResponseOk = $this->cep->find('01001-000');
        $this->responseReponseHelperOk = cep('01001-000');
    }

    public function testCepResponseIsOk(): void
    {
        $this->assertTrue($this->cepResponseOk->isOk());
    }

    public function testCepResponseInstanceOfCepModel(): void
    {
        $this->assertInstanceOf(CepModel::class, $this->cepResponseOk->getCepModel());
    }

    public function testCepHelperIsOk(): void
    {
        $this->assertTrue($this->responseReponseHelperOk->isOk());
    }

    public function testCepHelperInstanceOfCepModel(): void
    {
        $this->assertInstanceOf(CepModel::class, $this->responseReponseHelperOk->getCepModel());
    }

    public function testCepResponseIsError(): void
    {
        $this->expectException(\Exception::class);
        $this->cep->find('');
    }

    public function testCepModelValues(): void
    {
        $model = $this->responseReponseHelperOk->getCepModel();
        $this->assertNotNull($model->cep);
        $this->assertNotNull($model->logradouro);
        $this->assertNotNull($model->complemento);
        $this->assertNotNull($model->bairro);
        $this->assertNotNull($model->localidade);
        $this->assertNotNull($model->uf);
        $this->assertNotNull($model->ddd);
        $this->assertNotNull($model->siafi);
        $this->assertNotNull($model->ibge);
        $this->assertNotNull($model->gia);
    }

    public function testCepModelGetValues(): void
    {
        $model = $this->responseReponseHelperOk->getCepModel();
        $this->assertNotNull($model->getCep());
        $this->assertNotNull($model->getLogradouro());
        $this->assertNotNull($model->getComplemento());
        $this->assertNotNull($model->getBairro());
        $this->assertNotNull($model->getLocalidade());
        $this->assertNotNull($model->getUf());
        $this->assertNotNull($model->getDdd());
        $this->assertNotNull($model->getSiafi());
        $this->assertNotNull($model->getIbge());
        $this->assertNotNull($model->getGia());
    }

    public function testCepModelGetValuesEqualValues(): void
    {
        $model = $this->responseReponseHelperOk->getCepModel();
        $this->assertEquals($model->getCep(), $model->cep);
        $this->assertEquals($model->getLogradouro(), $model->logradouro);
        $this->assertEquals($model->getComplemento(), $model->complemento);
        $this->assertEquals($model->getBairro(), $model->bairro);
        $this->assertEquals($model->getLocalidade(), $model->localidade);
        $this->assertEquals($model->getUf(), $model->uf);
        $this->assertEquals($model->getDdd(), $model->ddd);
        $this->assertEquals($model->getSiafi(), $model->siafi);
        $this->assertEquals($model->getIbge(), $model->ibge);
        $this->assertEquals($model->getGia(), $model->gia);
    }

    public function testCepModelGetValuesEqualRequestValues(): void
    {
        $model = $this->responseReponseHelperOk->getCepModel();
        $this->assertEquals($model->getCep(), '01001-000');
        $this->assertEquals($model->getLogradouro(), 'Praça da Sé');
        $this->assertEquals($model->getComplemento(), 'lado ímpar');
        $this->assertEquals($model->getBairro(), 'Sé');
        $this->assertEquals($model->getLocalidade(), 'São Paulo');
        $this->assertEquals($model->getUf(), 'SP');
        $this->assertEquals($model->getDdd(), '11');
        $this->assertEquals($model->getSiafi(), '7107');
        $this->assertEquals($model->getIbge(), '3550308');
        $this->assertEquals($model->getGia(), '1004');
    }
}
