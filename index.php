<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <title>CHORD</title>
</head>

<?php
require("database/conexao.php");

$sql = "SELECT * FROM chord.boss;";
$result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

echo var_dump($_POST);

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
        <form action="acoes.php">
            <input type="text" placeholder="nome">
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
                        <td><?= date_format(
                                new DateTime($lista["saida"]),
                                'd/m G:i'
                            ) ?>
                        </td>
                        <td><?= $lista["cracha"] ?></td>
                        <td>
                            <img class="imagem-produto" onclick="deletar(<?= $lista['id'] ?>)" src="https://icons.veryicon.com/png/o/construction-tools/coca-design/delete-189.png" width="30px" />
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