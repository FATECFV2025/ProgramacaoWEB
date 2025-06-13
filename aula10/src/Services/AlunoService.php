<?php
namespace src\Services;

use src\Models\Repository\AlunoRepository;
use src\Models\Entity\Aluno;

class AlunoService
{
    private $aluno;

    public function __construct()
    {
        $this->aluno = new AlunoRepository();
    }

    public function criar($nome, $genero)
    {
        $aluno = new Aluno($nome, $genero);
        $this->aluno->save($aluno);

        return ['success'=>'Aluno Criado com'];
    }
}
