<?php
//Sessão para mostrar as menssagens de erro
session_start();
//Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    //deletar no banco de dados
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['menssagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['menssagem'] = "Erro ao deletar!";
        header('Location: ../index.php');
    endif;
endif;