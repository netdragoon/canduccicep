<?php declare(strict_types=1);

namespace PHPUnit\SelfTest\Basic;

use Canducci\Cep\CepModel;
use Canducci\Cep\Endereco;
use Canducci\Cep\Request;
use PHPUnit\Framework\TestCase;

class EnderecoUpTest extends TestCase
{
    private $endereco;
    private $enderecoResponseOk;
    protected $request;
    public function setUp(): void
    {
        $this->request = new Request();
        $this->endereco = new Endereco($this->request);
        $this->enderecoResponseOk = $this->endereco->find(SAO_PAULO, 'sao paulo', 'ave');
    }

    public function testEnderecoResponseIsOk(): void
    {
        $this->assertTrue($this->enderecoResponseOk->isOk());
    }

    public function testEnderecoResponseCepModels(): void
    {
        $this->assertInstanceOf(CepModel::class, $this->enderecoResponseOk->getCepModels()[0]);
    }

    public function testEnderecoResponseCepModelsCount(): void
    {
        $this->assertTrue(50 === count($this->enderecoResponseOk->getCepModels()));
    }
}