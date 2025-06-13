<?php

require_once __DIR__ . '/../vendor/autoload.php';

use src\Routes\Routes;
use src\Controllers\AlunoController;


$route = new Routes();

//rota é apenas o Back-End com API
$route->add('POST', 'api/aluno', [new AlunoController, 'criar']);


//rota tem o Front-End em PHP com Back-end em PHP
$route->add('GET', 'aluno/cadastro', [new AlunoController, 'mostrarFormulario']);
