<?php declare(strict_types=1);

namespace PHPUnit\SelfTest\Basic;

use Canducci\Cep\Cep;
use Canducci\Cep\CepModel;
use Canducci\Cep\CepRequest;
use PHPUnit\Framework\TestCase;

class CepUpTest extends TestCase
{
    protected $cep;
    protected $cepRequest;
    protected $cepResponseOk;
    protected $cepResponseError;
    public function setUp(): void
    {
        $this->cepRequest = new CepRequest();
        $this->cep = new Cep($this->cepRequest);
        $this->cepResponseOk = $this->cep->find('01010000');
        $this->cepResponseError = $this->cep->find('');
    }

    public function testCepResponseIsOk(): void
    {
        $this->assertTrue($this->cepResponseOk->isOk());
    }

    public function testCepResponseInstanceOfCepModel(): void
    {
        $this->assertInstanceOf(CepModel::class, $this->cepResponseOk->get());
    }

    public function testCepResponseIsError(): void
    {
        $this->assertFalse($this->cepResponseError->isOk());
    }

    public function testCepResponseCepModelNull(): void
    {
        $this->assertNull($this->cepResponseError->get());
    }
}

