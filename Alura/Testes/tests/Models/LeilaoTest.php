<?php

namespace Alura\Leilao\Tests\Model;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{

    /**
     * @dataProvider geradorLances
     */
    public function test_leilao_deve_receber_lances(int $qtdlances, Leilao $leilao, array $valores)
    {        
        $this->assertCount($qtdlances , $leilao->getLances());

        foreach ($valores as $i => $valorEsperado) {
            $this->assertEquals($valorEsperado, $leilao->getLances()[$i]->getValor());
        }
    }

    public function test_leilao_nao_deve_receber_lances_repetidos()
    {
        $leilao = new Leilao('GM');
        $ana = new Usuario('Ana');
       
        $leilao->recebeLance(new Lance($ana, 1000));
        $leilao->recebeLance(new Lance($ana, 1500));

        $this->assertCount(1 , $leilao->getLances());
        $this->assertEquals(1000, $leilao->getLances()[0]->getValor());
    }

    public function test_leilao_nao_deve_aceitar_mais_de_5_lances_por_leilao()
    {
        $leilao = new Leilao('Ford');

        $joao = new Usuario('Joao');
        $maria = new Usuario('Maria');

        $leilao->recebeLance(new Lance($joao, 1000));
        $leilao->recebeLance(new Lance($maria, 1500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 3000));
        $leilao->recebeLance(new Lance($maria, 3500));
        $leilao->recebeLance(new Lance($joao, 4000));
        $leilao->recebeLance(new Lance($maria, 4500));
        $leilao->recebeLance(new Lance($joao, 5000));
        $leilao->recebeLance(new Lance($maria, 5500));

        $leilao->recebeLance(new Lance($joao, 6000));

        $this->assertCount(10, $leilao->getLances());
        $this->assertEquals(5500, $leilao->getLances()[array_key_last($leilao->getLances())]->getValor());
    }

    public function geradorLances()
    {
        $joao = new Usuario('Joao');
        $maria = new Usuario('Maria');

        $leilaoCom2Lances = new Leilao('Fiat');
        $leilaoCom2Lances->recebeLance(new Lance($joao, 1000));
        $leilaoCom2Lances->recebeLance(new Lance($maria, 2000));

        $leilaoCom1Lance = new Leilao('VW');
        $leilaoCom1Lance->recebeLance(new Lance($maria, 5000));

        return [
            '2-lances' => [2, $leilaoCom2Lances, [1000, 2000]],
            '1-lance' => [1, $leilaoCom1Lance, [5000]]
        ];
    }
}