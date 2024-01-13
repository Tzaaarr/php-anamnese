<?php
    require 'conectaBD.php';
        
    $conexao = mysqli_connect($servername, $username, $password, $database);

    if ($conexao == false) {
        die("ERRO: Não foi possivel conectar com o BD");
    }

    // variavel para direcionamento da pagina - insert ou update
    $page = "recebealuno.php"; // insert - novo aluno

    // set das variaveis 
    $nome = "";
    $matricula = "";
    $datanascimento = "";
    $patologia = "";
    $patologia_obs = "";
    $medicamento = "";
    $medicamento_obs = "";
    $dores = "";
    $dores_obs = "";
    $coluna = "";
    $coluna_obs = "";
    $objetivo = "";
    $lesao = "";
    $cirurgia = "";
    $esporte = "";
    $frequencia = "";
    $complementar = "";

    // verifica se possui o get do id
    if (isset($_GET['id'])) {

        $page = "alteraaluno.php"; // update - alteração aluno

        $id = $_GET['id'];

        $sql = "SELECT * FROM academia.alunos WHERE id_aluno = $id";
    
        $envio_sql = mysqli_query($conexao, $sql);
    
        $row = mysqli_fetch_assoc($envio_sql);

        // valor das variaveis
        $nome = $row['nome'];
        $matricula = $row['matricula'];
        $datanascimento = $row['data_nascimento'];
        $patologia = $row['patologia'];
        $patologia_obs = $row['patologia_obs'];
        $medicamento = $row['medicamento'];
        $medicamento_obs = $row['medicamento_obs'];
        $dores = $row['dores'];
        $dores_obs = $row['dores_obs'];
        $coluna = $row['coluna'];
        $coluna_obs = $row['coluna_obs'];
        $objetivo = $row['objetivo'];
        $lesao = $row['lesao'];
        $cirurgia = $row['cirurgia'];
        $esporte = $row['esporte'];
        $frequencia = $row['frequencia'];
        $complementar = $row['complementar'];

    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

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


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V+</title>
    <link rel="stylesheet" type="text/css"  href="css/stylesheet.css">
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

    <div class="box__title">
        <div class="box__title-image">
            <img src="img/newlogo.jpg" width="100" height="82"> 
        </div>
        <div class="box__title-name">
            <h1>V+ Cadastro de Anamnese</h1>  
        </div>
    </div>
    
    <div class="box__form">
        <form action="<?php echo $page; ?>" method="post">
            <table class="box__form-table">
                <?php
                
                    if (isset($id)) {

                        echo "<tr>
                                <td>ID:</td>
                                <td><input type=text name='id' value='$id'> </td>
                            </tr>";
                    };
                    
                ?>
                
                <tr>
                    <td>Nome Completo:</td>
                    <td><input type=text name="Nome" value="<?php echo $nome;?>" pattern="[A-Za-záàâãéèêíóôõúç\s]{8,50}" title="Nome com 8 a 50 letras" required></td>
                </tr><tr>
                    <td>Data Nascimento:</td>
                    <td><input type="date" name="DataNascimento" value="<?php echo $datanascimento;?>" required></input></td>  
                </tr><tr>
                    <td>Número de Matricula:</td>
                    <td><input type="text" name="Matricula" value="<?php echo $matricula;?>" pattern="[0-9]{4,10}" placeholder="Número de matricula" required></td>
                </tr><tr>
                    <th>1. Possui alguma dessas patologias?</th>
                    <td><select name="Patologia" size="1">
                        <option <?php if ($patologia=="Nenhuma"){echo "selected";}?> value="Nenhuma" >Nenhuma</option>
                        <option <?php if ($patologia=="Hipertensão"){echo "selected";} ?> value="Hipertensão" >Hipertensão</option>
                        <option <?php if ($patologia=="Diabetes"){echo "selected";} ?> value="Diabetes" >Diabetes</option>
                        <option <?php if ($patologia=="Hipotireoidismo"){echo "selected";} ?> value="Hipotireoidismo" >Hipotireoidismo</option>
                        <option <?php if ($patologia=="Dislipidemia"){echo "selected";} ?> value="Dislipidemia" >Dislipidemia</option>
                        <option <?php if ($patologia=="Labirintite"){echo "selected";} ?> value="Labirintite" >Labirintite</option>
                        <option <?php if ($patologia=="Cefaleias"){echo "selected";} ?> value="Cefaleias" >Cefaleias</option>
                    </select></td>
                </tr><tr>
                    <td>Outras:</td>
                    <td><input type="text" value="<?php echo $patologia_obs;?>" name="Observação"></td>
                </tr><tr>
                    <th>2. Faz uso de algum medicamento?</th>
                    <td><select name="Medicamento" size="1">
                        <option <?php if ($medicamento=="Não"){echo "selected";} ?> value="Não" >Não</option>
                        <option <?php if ($medicamento=="Sim"){echo "selected";} ?> value="Sim" >Sim</option>
                    </select></td>
                </tr><tr>
                    <td>Medicamentos:</td>
                    <td><input type="text" value="<?php echo $medicamento_obs;?>" name="Remédios"></td>
                </tr><tr>
                    <th>3. Sente alguma dor em alguma das articulações?</th>
                    <td><select name="Dor" size="1">
                        <option <?php if ($dores=="Sem Dores"){echo "selected";} ?> value="Sem Dores" >Sem Dores</option>
                        <option <?php if ($dores=="Ombro"){echo "selected";} ?> value="Ombro" >Ombro</option>
                        <option <?php if ($dores=="Quadril"){echo "selected";} ?> value="Quadril" >Quadril</option>
                        <option <?php if ($dores=="Joelho"){echo "selected";} ?> value="Joelho" >Joelho</option>
                        <option <?php if ($dores=="Tornozelo"){echo "selected";} ?> value="Tornozelo" >Tornozelo</option>
                        <option <?php if ($dores=="Punho"){echo "selected";} ?> value="Punho" >Punho</option>
                    </select></td>
                </tr><tr>
                    <td>Observação:</td>
                    <td><input type="text" value="<?php echo $dores_obs;?>" name="Local"></td>
                </tr><tr>
                    <th>4. Possui hérnia de disco ou artrose na coluna?</th>
                    <td><select name="Coluna" size="1">
                        <option <?php if ($coluna=="Não Possui"){echo "selected";} ?> value="Não Possui" >Não Possui</option>
                        <option <?php if ($coluna=="Cervical"){echo "selected";} ?> value="Cervical" >Cervical</option>
                        <option <?php if ($coluna=="Torácica"){echo "selected";} ?> value="Torácica" >Torácica</option>
                        <option <?php if ($coluna=="Lombar"){echo "selected";} ?> value="Lombar" >Lombar</option>
                    </select></td>
                </tr><tr>
                    <td>Observação:</td>
                    <td><input type="text" name="Descrição" value="<?php echo $coluna_obs;?>"></td>
                </tr><tr>
                    <th>5. Qual seu objetivo com o exercício físico?</th>
                    <td><select name="Objetivo" size="1">
                        <option <?php if ($objetivo=="Saúde"){echo "selected";} ?> value="Saúde" >Saúde</option>
                        <option <?php if ($objetivo=="Emagrecimento"){echo "selected";} ?> value="Emagrecimento" >Emagrecimento</option>
                        <option <?php if ($objetivo=="Condicionamento"){echo "selected";} ?> value="Condicionamento" >Condicionamento</option>
                        <option <?php if ($objetivo=="Hipertrofia"){echo "selected";} ?> value="Hipertrofia" >Hipertrofia</option>
                    </select></td>
                </tr><tr>
                    <th>6. Já sofreu alguma fratura ou lesão? Se sim, qual?</th>
                    <td><input type=text name="Lesão" value="<?php echo $lesao;?>"></td>
                </tr><tr>
                    <th>7. Já passou por alguma cirurgia? Se sim, qual?</th>
                    <td><input type=text name="Cirurgia" value="<?php echo $cirurgia;?>"></td>
                </tr><tr>
                    <th>8. Você já praticou ou pratica algum exercício físico/esporte?</th>
                    <td><input type=text name="Esporte" value="<?php echo $esporte;?>"></td>
                </tr><tr>
                    <th>9. Quantas vezes por semana você se compromete a praticar exercícios e quanto tempo tem disponível no dia?</th>
                    <td><input type=text name="Cronograma" value="<?php echo $frequencia;?>"></td>
                </tr><tr>
                    <th>10. Possui alguma restrição a pratica de exercícios que não foi perguntado anteriormente?</th>
                    <td><input type=text name="Restrição" value="<?php echo $complementar;?>"></td>
                </tr><tr>
                    <th colspan="2" class="box__form-table-button">
                        <input type="submit">
                        <input type="reset" value="Limpar">
                    </th>
                </tr>

            </table>

        </form>
    </div>

</body>

</html>