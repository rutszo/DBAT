<?php
include("connect.php");

if ($_SESSION['admin'] == false){
    header("Location: localidade.php");
    return;
}
?>