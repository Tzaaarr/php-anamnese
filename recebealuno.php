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


    $sql = "INSERT INTO academia.alunos 
                (nome, data_nascimento, matricula, patologia, patologia_obs, medicamento, medicamento_obs, 
                dores, dores_obs, coluna, coluna_obs, objetivo, lesao, cirurgia, esporte, frequencia, complementar, id_funcionario) 
            VALUES 
                ('$nome', '$datanascimento', '$matricula', '$patologia', '$patologia_obs', '$medicamento', '$medicamento_obs',
                '$dores', '$dores_obs', '$coluna', '$coluna_obs', '$objetivo', '$lesao', '$cirurgia', '$esporte', '$frequencia', '$complementar', '$id_logado')";


    $envio_sql = mysqli_query($conexao, $sql);

    if ($envio_sql){
        header("location: listagemalunos.php");
    } else {
        echo "ERRO AO INSERIR";
    }