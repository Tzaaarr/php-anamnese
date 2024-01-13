<?php

    require 'conectaBD.php';

    session_start();
    
    $conexao = mysqli_connect($servername, $username, $password, $database);
    
    if ($conexao == false) {
        die("ERRO: Não foi possivel conectar com o BD");
    }
    
    // variavel - metodo post (nome do campo enviado)
    // recebe os dados via post    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM academia.funcionarios WHERE usuario = '$usuario' AND senha = MD5('$senha')";

    $envio_sql = mysqli_query($conexao, $sql);

    
    $row = mysqli_fetch_assoc($envio_sql);

    if ($row == true)
    {
        $_SESSION['id'] = $row['id_funcionario'];

        $_SESSION['usuario'] = $usuario; 
        $_SESSION['senha'] = $senha;
        header("location: cadastroaluno.php");

     } else {
     
      unset ($_SESSION['usuario']);
      unset ($_SESSION['senha']);
      header("location: login.php?id=404");

     }
    