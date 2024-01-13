<?php
    /* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        header('location:index.php');
    }

    $logado = $_SESSION['usuario'];
    $id_logado = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dados de Contato</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
    <body>

        <div class="box__menu-bar">
            <div>
                <a href=""> <?php echo"Olá $logado [$id_logado]"; ?> </a>
                <a href="cadastroaluno.php">Ficha Anamnese</a>
                <a href="listagemalunos.php">Alunos</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>   
        
        <div class="box__form">
            <h3>RELATÓRIO GERAL DOS ALUNOS</h3>
            <p>Verificação dos alunos cadastrados</p>
            
            <table class="box__form-table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matricula</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                
                <?php
                    require 'conectaBD.php';
                    $conexao = mysqli_connect($servername, $username, $password, $database);

                    if ($conexao == false) {
                        die("ERRO: Não foi possivel conectar com o BD");
                    }

                    //$sql = "SELECT id_aluno, nome, matricula FROM academia.alunos";
                    $sql = "SELECT * FROM academia.alunos ORDER BY id_aluno DESC LIMIT 20";
                    
                    $envio_sql = mysqli_query($conexao, $sql);

                    if ($envio_sql){
                        
                        // percorre os alunos encontrados                     
                        while($row = mysqli_fetch_assoc($envio_sql)){

                            echo 
                                "<tr>
                                    <td>" . $row['id_aluno'] . "</td>
                                    <td>" . $row['nome'] . "</td>
                                    <td>" . $row['matricula'] . "</td>
                                    <td> <a style='text-decoration:none' href='cadastroaluno.php?id=". $row['id_aluno'] . "'>📝</a> </td>
                                    <td> <a style='text-decoration:none' href='excluialuno.php?id=" . $row['id_aluno'] . "'>❌</a> </td>
                                </tr>
                                <tr></tr><tr></tr><tr></tr><tr></tr>";
                        } 
                    } 
                ?>

            </table>
            
        </div>

    </body>
</html>