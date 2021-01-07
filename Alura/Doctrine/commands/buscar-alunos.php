<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

/**
 * @var Aluno[] $alunoList
 */
foreach ($alunoList as $aluno){
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getTelefone();
        })
        ->toArray();
    echo "ID: {$aluno->getId()} --- Nome: {$aluno->getName()}" . PHP_EOL;
    echo "Telefones: " . implode(', ', $telefones) . PHP_EOL;

}