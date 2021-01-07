<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var($request->getQueryParams()['email'], FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            $this->defineMessagem('danger', "O e-mail digitado não é um e-mail válido.");
            return new Response(302, ['Location: /login']);
        }

        $senha = filter_var($request->getQueryParams()['senha'], FILTER_VALIDATE_EMAIL);

        /** @var Usuario $usuario */
        $usuario = $this->repositorioDeUsuarios
            ->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMessagem('danger', 'E-mail ou senha inválidos');
            return new Response(302, ['Location: /login']);
        }

        $_SESSION['logado'] = true;
        
        return new Response(200, ['Location: /listar-cursos']);
    }
}
