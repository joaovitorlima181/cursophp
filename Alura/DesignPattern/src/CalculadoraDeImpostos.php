<?php

namespace Alura\DesignPattern;

class CalculadoraDeImpostos
{
    public function calcula(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }
}