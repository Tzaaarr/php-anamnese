<?php

    require 'conectaBD.php';
    
    $conexao = mysqli_connect($servername, $username, $password, $database);
    
    if ($conexao == false) {
        die("ERRO: Não foi possivel conectar com o BD");
    }
    
    session_start();
    $id_logado = $_SESSION['id'];
    // variavel - metodo post (nome do campo enviado)
    // recebe os dados via post
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $matricula = $_POST['Matricula'];
    $datanascimento = $_POST['DataNascimento'];
    $patologia = $_POST['Patologia'];
    $patologia_obs = $_POST['Observação'];
    $medicamento = $_POST['Medicamento'];
    $medicamento_obs = $_POST['Remédios'];
    $dores = $_POST['Dor'];
    $dores_obs = $_POST['Local'];
    $coluna = $_POST['Coluna'];
    $coluna_obs = $_POST['Descrição'];
    $objetivo = $_POST['Objetivo'];
    $lesao = $_POST['Lesão'];
    $cirurgia = $_POST['Cirurgia'];
    $esporte = $_POST['Esporte'];
    $frequencia = $_POST['Cronograma'];
    $complementar = $_POST['Restrição'];


    $sql = "UPDATE academia.alunos SET
                nome = '$nome', 
                data_nascimento = '$datanascimento', 
                matricula = '$matricula',
                patologia = '$patologia',
                patologia_obs = '$patologia_obs',
                medicamento = '$medicamento',
                medicamento_obs = '$medicamento_obs',
                dores = '$dores',
                dores_obs = '$dores_obs',
                coluna = '$coluna',
                coluna_obs = '$coluna_obs',
                objetivo = '$objetivo',
                lesao = '$lesao',
                cirurgia = '$cirurgia',
                esporte = '$esporte',
                frequencia = '$frequencia',
                complementar = '$complementar',
                id_funcionario = '$id_logado'
            WHERE id_aluno = '$id' ";
    
    $envio_sql = mysqli_query($conexao, $sql);


    if ($envio_sql){
        header("location:listagemalunos.php");
    } else {
        echo "ERRO AO ATUALIZAR";
    }
    
