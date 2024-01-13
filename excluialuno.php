<?php

    require 'conectaBD.php';
    
    $conexao = mysqli_connect($servername, $username, $password, $database);
    
    if ($conexao == false) {
        die("ERRO: Não foi possivel conectar com o BD");
    }
    
    // recebe o id via GET
    $id = $_GET['id'];

    $sql = "DELETE FROM academia.alunos WHERE id_aluno = '$id' ";

    $envio_sql = mysqli_query($conexao, $sql);

    if ($envio_sql){
        header("location: listagemalunos.php");
    } else {
        echo "ERRO AO EXCLUIR";
    }

