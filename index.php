<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/chord icon.png" type="image/x-icon">
    <title>CHORD</title>
</head>

<?php
require("database/conexao.php");

$sql = "SELECT * FROM chord.boss;";
$result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

echo var_dump($_POST);

/* TODO LIST
    * Entrada e saida de maneira automatica
    * Criação do formulario
    * Edição dos campos do formulario
    * Mensagens de erros

*/

if(empty(validarCampos())){
    cadastrar();
}else{
    echo "Preencha todos os campos";
}

?>

<body>
    <header>
        <img src="#Logo" alt="logo">
        <div>
            <h4>Exercito Brasileiro</h4>
            <h1>Batalhão de Infantaria Mecanizada</h1>
            <h3>Regimento Raposo Tavares</h3>
        </div>
    </header>
    <div id="submenu">
        <!-- Será implementado futuramente o menu com demais finalidades-->
    </div>
    <section id="form">
        <form action="index.php" method="POST" autocomplete="off">
            <input type="text" name="nome" placeholder="nome">
            <input type="text" name="documento" placeholder="documento">
            <input type="text" name="destino" placeholder="destino">
            <input type="text" name="modelo" placeholder="modelo">
            <input type="text" name="placa" placeholder="placa">
            <input type="text" name="cracha" placeholder="cracha">
            <button>Enviar</button>
        </form>
    </section>
    <section id="data">
        <table>
            <thead>
                <tr>
                    <td class="table_tile">Nome</td>
                    <td class="table_tile">Documento</td>
                    <td class="table_tile">Destino</td>
                    <td class="table_tile">Modelo</td>
                    <td class="table_tile">Placa</td>
                    <td class="table_tile">Entrada</td>
                    <td class="table_tile">Saida</td>
                    <td class="table_tile">Cracha</td>
                    <td class="table_tile"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($lista = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?= $lista["nome"] ?></td>
                        <td><?= $lista["documento"] ?></td>
                        <td><?= $lista["destino"] ?></td>
                        <td><?= $lista["modelo"] ?></td>
                        <td><?= $lista["placa"] ?></td>
                        <td><?= date_format(
                                new DateTime($lista["entrada"]),
                                'd/m G:i'
                            ) ?>
                        </td>
                        <td>
                            <? 
                                echo "20000000000";
                                if (empty($lista["saida"])){
                                    echo "Ainda não saiu"; //TODO: Implementar botão de saida
                                    
                                }else{
                                    echo date_format(new DateTime($lista["saida"]),'d/m G:i');
                                }

                             ?>
                        </td>
                        <td><?= $lista["cracha"] ?></td>
                        <td>
                            <img class="imagem-produto" onclick="deletar(<?= $lista['id'] ?>)" src="https://icons.veryicon.com/png/o/application/enterprise-edition/edit-53.png" width="30px" />
                        </td>
                        <form id="form-editar" method="POST" action="index.php">
                            <input type="hidden" name="acao" value="editar" />
                            <input type="hidden" id="bossId" name="idBoss" value="" />
                        </form>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
<script lang="javascript">
    function deletar(categoriaId) {
        document.querySelector("#bossId").value = categoriaId;

        document.querySelector("#form-editar").submit();
    }
</script>

</html>

<?php
    function validarCampos(){
        $erros = "";
        if (empty($_POST["nome"]))
            $erros = "Preencha o campo nome";
        if (empty($_POST["documento"]))
            $erros = "Preencha o campo documento";
        if (empty($_POST["destino"])) 
            $erros = "Preencha o campo destino";
        if (empty($_POST["modelo"]))
            $erros = "Preencha o campo modelo";
        if (empty($_POST["placa"]))
            $erros = "Preencha o campo placa";
        if (empty($_POST["cracha"]))
            $erros = "Preencha o campo cracha";
        return $erros;
    }

    function cadastrar(){
        require("database/conexao.php");
        //FUNÇÃO PARA CADASTRAR OS DADOS DO BOSS
        $nome = $_POST["nome"];
        $documento = $_POST["documento"];
        $destino = $_POST["destino"];
        $modelo = $_POST["modelo"];
        $placa = $_POST["placa"];
        $cracha = $_POST["cracha"];
        $entrada = date("Y-m-d H:i:s");
        $saida = "";
        $sql = "INSERT INTO boss (nome, documento, destino, modelo, placa, cracha, entrada, saida) VALUES ('$nome', '$documento', '$destino', '$modelo', '$placa', '$cracha', '$entrada', '$saida');";
        $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        mysqli_close($conexao);
    }

    function editar(){

    }

    function registrarSaida(){

    }
?>