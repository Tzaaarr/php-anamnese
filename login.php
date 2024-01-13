<?php
    if (isset($_GET['id'])) 
    {
        echo "<script>alert('Dados de login incorretos!');</script>";
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
        </div>
    </div>

    <div class="box__title-name">
        <h2>LOGIN</h2>
        <div>
            <form method="post" action="validalogin.php">                
                <div class="">
                    <input type="text" name="usuario" id="usuario" placeholder="usuario" required>
                </div><br>
                <div class="">
                    <input type="password" name="senha" id="senha" class="senha" placeholder="sua senha" required>
                </div>
                <div>
                    <a href="#" style="text-decoration: none;" class="btn">Mostrar senha</a> 
                </div><br>

                <div class="box__form-table-button">
                    <input type="submit" class="form-submit" value="Login"> 
                    <input type="reset"  class="form-submit" value="Cancelar" onclick="window.location.href='index.php'">
                </div><br>
            
            </form>
        </div>
    </div>

    <script src="script/password.js"></script>

</body>
</html>