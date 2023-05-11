<?php
include("connect.php");
include("verifylogin.php");

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $linkfoto = $_POST['linkfoto'];
    $siteoficial = $_POST['siteoficial'];
    $dono = $_SESSION['id'];

    $sql = "INSERT INTO localidade (nome, descricao, linkfoto, siteoficial, id_criador, aprovado, lastedited) VALUES ('$nome', '$descricao', '$linkfoto', '$siteoficial', '$dono', '1', CURRENT_TIMESTAMP)";
    if (mysqli_query($connection, $sql)) {
        echo "Location added successfully!";
    } else {
        echo "Error adding location: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      background-image: url(https://voenews.com.br/wp-content/uploads/2019/08/Berlengas-Island-_Centrode-Portugal.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.432);
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    
    .edit {
      display: flex;
      flex-direction: column;
      border: 2px solid black;
      width: 500px;
      height: 600px;
      border-radius: 15px;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      backdrop-filter: blur(6px);
      }
    
    .edit input{
      width: 300px;
      border-radius: 5px;
      height: 25px;
      overflow: hidden;
      border: 2px solid black;
      background-color: rgba(255, 255, 255, 0.4);
    }
  </style>
<head>
    <title>Create Location</title>
</head>
<body>
    <div class="wrapper">
    <div class="edit">
        <h1>Create New Location</h1>
    <form method="POST" action="clocalidade.php">
        <label for="nome">Name:</label>
        <br>
        <input type="text" id="nome" name="nome"><br>

        <label for="descricao">Description:</label>
        <br>
        <input type="text"id="descricao" name="descricao"><br>

        <label for="linkfoto">Image Link:</label>
        <br>
        <input type="text" id="linkfoto" name="linkfoto"><br>

        <label for="siteoficial">Official Site Link:</label>
        <br>
        <input type="text" id="siteoficial" name="siteoficial"><br>
        <br>
        <input type="submit" name="submit" value="Add Location">
        <br>
        <a href="localidade.php"><input type="button" name="voltar" value="Voltar"></a>
    </form>
    </div>
    </div>
    
</body>
</html>
