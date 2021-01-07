<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\Assistivel;

class Assistidor implements Assistivel
{
    public function assistir(Assistivel $conteudo)   
    {
        $conteudo->assistir();
    }
}
