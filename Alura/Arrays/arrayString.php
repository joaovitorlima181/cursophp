<?php

$nomes = "João, Vitor, Felipe, Lima";

$arrayNomes = explode (", ", $nomes); //  explode(); primeiro argumento é o limitador, segundo argunmento é a variavel com as strings.

foreach($arrayNomes as $nome){
    echo "$nome" . PHP_EOL;
}

$nomesJuntos = implode(", ", $arrayNomes);
echo "$nomesJuntos";