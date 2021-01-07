<?php

namespace Alura;

class Calculadora
{
    public function calculaMedia(array $notas) : ?float
    {
        if($quantidadeNotas > 0){
            $quantidadeNotas = sizeof($notas); //sizeof(array) retorna a quantidade de elementos dentro de um array

            $soma = 0;
            for($i = 0; $i < $quantidadeNotas; $i++){
                $soma = $soma + $notas[$i];
            }
    
            $media= $soma / $quantidadeNotas;
    
            return $media;
        }else
            return null;
 
    }
}