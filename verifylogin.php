<?php
include("connect.php");

if ($_SESSION['loggedin'] == false){
    header("Location: login.php");
    return 0;
}

?>