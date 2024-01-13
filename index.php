<?php
    session_start(); // Cria uma sessão ou retoma a sessão atual

    if (isset($_SESSION ['login'])) {  // Verifica se existe usuário  logado 
        header("location: cadastroaluno.php");  // Vai para a aplicação web 
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css"  href="css/stylesheet.css">
</head>
<body>

    <div class="box__menu-bar">
        <div>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="cadastrologin.php">Cadastro</a>
        </div>
    </div> 
    
    <div class="box__title">
        <div class="box__title-image">
            <img src="img/newlogo.jpg" alt="logo_academia" width="100" height="82"> 
        </div><br>
        <div class="box__title-name">
            <h1>Sistema Anamnese Web</h1>    
            <p>
                A ACADEMIA Viva+ tem como objetivo proporcionar saúde e qualidade de vida a seus alunos. 
                Não deixando nunca de ser um ambiente totalmente familiar, 
                frequentado por pessoas de todos sexos e idades.
            </p>
        </div>
    </div>

</body>
</html>