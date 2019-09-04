<?php
//Sessão para mostrar as menssagens de erro
session_start();
//Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    //atualizar no banco de dados
    $sql = "UPDATE clientes SET nome = '$nome', email = '$email', idade = '$idade' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['menssagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['menssagem'] = "Erro ao atualizar!";
        header('Location: ../index.php');
    endif;
endif;