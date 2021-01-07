<?php

namespace Alura\Doctrine\Entity;
/**
 * @Entity
 */
class Telefone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $telefone;

    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    public function getId() : int
    {
        return $this->id;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone):self
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}