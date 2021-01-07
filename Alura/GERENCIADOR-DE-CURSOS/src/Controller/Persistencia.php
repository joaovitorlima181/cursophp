<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;   
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $descricao = filter_var($request->getQueryParams()['descricao'], FILTER_SANITIZE_STRING);

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        $tipo = 'sucess';
        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMessagem($tipo, "Curso atualizado com sucesso");
        } else {
            $this->entityManager->persist($curso);
            $this->defineMessagem($tipo, "Curso inserido com sucesso");
        }

        $this->entityManager->flush();

        return new Response(302, ['Location: /listar-cursos']);
    }
}
