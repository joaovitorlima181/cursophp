<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try
    {
        funcao2();
    }catch(RuntimeException | DivisionByZeroError $erroOuException){
        echo $erroOuException->getMessage() . PHP_EOL; // Mostrar a mensagem do erro
        echo "Erro na linha " .  $erroOuException->getLine() . PHP_EOL; //Mostrar a linha onde ocorreu o erro
        echo $erroOuException->getTraceAsString(); // Mostra a pilha de execução em formato de string.
    }
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;

    throw new RuntimeException();
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
