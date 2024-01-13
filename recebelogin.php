<?php

    require 'conectaBD.php';
    
    $conexao = mysqli_connect($servername, $username, $password, $database);
    
    if ($conexao == false) {
        die("ERRO: Não foi possivel conectar com o BD");
    }
    
    // variavel - metodo post (nome do campo enviado)
    // recebe os dados via post    
    $nome = $_POST['nome'];
    $usuario = $_POST['user'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $senha1 = $_POST['senha1'];

    $sql = "INSERT INTO academia.funcionarios
                (nome, usuario, celular, email, senha) 
            VALUES 
                ('$nome', '$usuario', '$celular', '$email', MD5('$senha1') )";


    $envio_sql = mysqli_query($conexao, $sql);

    if ($envio_sql){
        header("location:index.php");
    } else {
        echo "ERRO AO INSERIR";
    }
    