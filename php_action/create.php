<?php
//Sessão para mostrar as menssagens de erro
session_start();
//Conexão
require_once 'db_connect.php';

//Agora verificar se o índice name="btn-cadastrar" existe na superglobal POST
if (isset($_POST['btn-cadastrar'])):
    //pegar os dados, mas antes, filtrá-los usando a função
    //mysqli_escape_string utilizando como parâmetro a conexão $connect 
    //e a variável superglobal POST.
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    //inserir no banco de dados
    $sql = "INSERT INTO clientes (nome, email, idade) VALUES ('$nome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['menssagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['menssagem'] = "Erro ao cadastrar usuário!";
        header('Location: ../index.php');
    endif;
endif;