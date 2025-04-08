<?php

// usando o method=get
//  $nome = $_GET['nome'];
//  $email = $_GET['email'];

//  echo '<p> O nome é: '. $nome. '</p>';
//  echo '<p> O email é: '.$email. '</p>';

//usando o method=post
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

echo '<p> O nome é: ' . $nome . '</p>';
echo '<p> O email é: ' . $email . '</p>';
echo '<p> A mensagem é: ' . $mensagem . '</p>';


?>