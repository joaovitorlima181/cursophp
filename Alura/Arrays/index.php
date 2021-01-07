<?php

namespace Alura;

require 'autoload.php';

$correntistas= [
    "João",
    "Vitor",
    "Felipe",
    "Lima",
];

$correntistasNaoPagantes = [
    'Felipe',
    'Lima',
];

$correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);
var_dump($correntistasPagantes);