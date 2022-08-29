<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            background: #09661A;
            color: #fff;
            padding: 20px;
            display: flex;
            column-gap: 150px;
            padding: 50px 0px 50px 150px;
        }

        h4 {
            font-weight: 400
        }

        h3 {
            font-weight: 400
        }

        #submenu {
            height: 30px;
            background-color: #00420C;
        }

        #data {
            padding: 30px;
        }

        table {
            width: 100%;
            min-height: 350px;
            background: #D9D9D9;
            border-collapse: collapse;
            border-radius: 30px;
        }

        thead {
            height: 60px;
            background-color: #2D2C2C;
        }

        thead:first-child td:first-child {
            border-radius: 30px 0 0 0;
        }

        thead:first-child td:last-child {
            border-radius: 0px 30px 0px 0px;
        }

        thead tr {
            text-align: center;
        }

        td {
            padding: 10px 25px 30px 15px;
        }

        .table_tile {
            background-color: #2D2C2C;
            color: #fff;
            font-weight: 550;
            padding: 10px;
        }
    </style>
    <title>CHORD</title>
</head>

<?php
date_default_timezone_set('America/Sao_Paulo');

require("database/conexao.php");
$sql = "SELECT * FROM chord.boss b where b.saida > curdate()-2 or b.saida is null order by b.saida asc";
$result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

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
    </div>

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
                            <?php
                            if (empty($lista["saida"])) {

                            ?>
                                <img class="imagem-produto" onclick="registrarSaida(<?= $lista['id'] ?>) " src="https://icons.veryicon.com/png/o/application/4px-heavy-line-icon/time-22.png" width="30px" />
                            <?php
                            } else {
                                echo date_format(new DateTime($lista["saida"]), 'd/m G:i');
                            }

                            ?>
                        </td>
                        <td><?= $lista["cracha"] ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>

<?php


?>