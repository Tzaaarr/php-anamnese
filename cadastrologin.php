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
        <h2>Cadastro - Novo Usuário</h2>
        
        <div class="box__form">
            <form method="post" action="recebelogin.php" style="text-align: right;">          
                    
                <div>
                    Nome funcionário: <input type="text" name="nome" id="nome" pattern="[A-Za-záàâãéèêíóôõúç\s]{8,50}" placeholder="nome completo" required>
                </div><br>
                <div>
                    Usuário / login: <input type="text" name="user" id="user" required>
                </div><br>
                <div>
                    Celular para contato: <input type="tel" name="celular" id="celular" placeholder="(xx)xxxxx-xxxx">
                </div><br>
                <div>
                    E-mail para contato: <input type="text" name="email" id="email" placeholder="e-mail" required>
                </div><br>
                <div>
                    Senha: <input type="password" name="senha1" class="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" placeholder="senha" required>
                </div><br>
                <div>
                    Senha: <input type="password" name="senha2" class="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" placeholder="confirme a senha" required>
                </div><br>
                <div>
                    <a href="#" style="text-decoration: none;" class="btn">Mostrar senha</a> 
                </div><br>

                <div class="box__form-table-button">
                    <input type="submit" class="form-submit" value="Cadastrar"> 
                    <input type="reset"  class="form-submit" value="Cancelar" onclick="window.location.href='index.php'">
                </div><br>
                
            </form>
        </div>
    </div>

    <script src="script/password.js"></script>

</body>
</html>