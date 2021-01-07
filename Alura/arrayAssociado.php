<?php

$contasCorrentes = [
    11111111111 => [
        'titular' => 'Joao',
        'saldo' => 1000
    ],
    22222222222 => [
        'titular' => 'Vitor',
        'saldo' => 2000
    ],
    33333333333 => [
        'titular' => 'Felipe',
        'saldo' => 3000
    ]
];

foreach($contasCorrentes as $cpf => $conta){
    echo $cpf. PHP_EOL;
}

