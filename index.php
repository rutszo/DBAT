<?php

include("./connect.php");

session_start();

error_reporting(-1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if (isset($_SESSION['loggedin'])){
        header("./localidade.php");
        ?>
        <a href="logout.php">Sai aqui!</a>
        <?php
    } else {
        echo "Não estás logado";
        ?>
        <a href="login.php">Entra aqui!</a>
        <?php
    }

    ?>

    
    
</body>
</html>