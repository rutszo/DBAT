<?php
include("./environment.php");

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("<script>alert('Ocorreu um erro ao conectar à base de dados!')</script>");
}

if ($connection){
    echo 'Conectado com sucesso!';
}
?>