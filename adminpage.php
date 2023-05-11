<?php
include("connect.php");
include("verifylogin.php");
include("verifyadmin.php");


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    .edit a{
      width: 300px;
      border-radius: 5px;
      height: 25px;
      overflow: hidden;
      border: 2px solid black;
      background-color: rgba(255, 255, 255, 0.4);
      text-decoration: none;
      
    }
  </style>
</head>

<body>

  <div class="wrapper">
      <div class="edit">
        <h1>Ola <?php echo $_SESSION['username']; ?></h1>
          <a href="profiles.php">Ver Utilizadores</a>
          <br>
          <a href="approvelocation.php">Aprovar Localidades</a>
          <br>
          <a href="localidade.php">Ver Localidades</a>
          <br>
          <a href="logout.php">Sair</a>
      </div>
  </div>

</body>

</html>