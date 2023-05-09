<?php
include("./connect.php");

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $linkfoto = $_POST['linkfoto'];
    $siteoficial = $_POST['siteoficial'];

    $sql = "INSERT INTO localidade (nome, descricao, linkfoto, siteoficial) VALUES ('$nome', '$descricao', '$linkfoto', '$siteoficial')";
    if (mysqli_query($connection, $sql)) {
        echo "Location added successfully!";
    } else {
        echo "Error adding location: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Location</title>
</head>
<body>
    <h1>Create New Location</h1>
    <form method="POST" action="clocalidade.php">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome"><br>

        <label for="descricao">Description:</label>
        <textarea id="descricao" name="descricao"></textarea><br>

        <label for="linkfoto">Image Link:</label>
        <input type="text" id="linkfoto" name="linkfoto"><br>

        <label for="siteoficial">Official Site Link:</label>
        <input type="text" id="siteoficial" name="siteoficial"><br>

        <input type="submit" name="submit" value="Add Location">
    </form>
</body>
</html>
