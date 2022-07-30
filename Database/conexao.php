<?php
const HOST  = "localhost";
const USER  = "root";
const PASSWORD  = "manolo";
const DATABASE  = "chord"; 

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

// if($conexao){
//     echo"conexao ao Banco de Dados execultada com sucesso "."</br>";
// }else{
//     echo "conexao ao Banco de Dados com problema ";
// }
