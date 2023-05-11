<?php
include("connect.php");
include("verifylogin.php");
include("verifyadmin.php");


if (isset($_POST['post_id'])){
    $id = $_POST['post_id'];
    if (isset($_POST['approve'])) {
        $sql = "UPDATE localidade SET aprovado = 2 WHERE id = '$id'";
        if (mysqli_query($connection, $sql)) {
            echo "Post aprovado com sucesso!";
        } else {
            echo "Error approving post: " . mysqli_error($connection);
        }
    }


    if (isset($_POST['reject'])) {
        $sql = "UPDATE localidade SET aprovado = 0 WHERE id = '$id'";
        if (mysqli_query($connection, $sql)) {
            echo "Post rejeitado!";
        } else {
            echo "Error rejecting post: " . mysqli_error($connection);
        }
    }

    header("Location: approvelocation.php");
}
?>