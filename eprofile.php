<?php
include("connect.php");
include("verifylogin.php");
if ($_GET['id'] == $_SESSION['id'] || $_SESSION['admin'] == true){



if (isset($_GET['id'])) {
  
    $profileId = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = '$profileId'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $profile = mysqli_fetch_assoc($result);
    } else {
        echo "profile not found.";
        exit;
    }
} else {
    echo "profile ID not provided.";
    exit;
}

if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pfp= $_POST['pfp'];

    $sql = "UPDATE users SET username = '$username', email = '$email', pfp = '$pfp', edited = CURRENT_TIMESTAMP WHERE id = '$profileId'";
    if (mysqli_query($connection, $sql)) {
        echo "Location updated successfully!";

        header("Location: profile.php?id=$profileId");
        exit;
    } else {
        echo "Error updating location: " . mysqli_error($connection);
    }
}

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
    
    .edit input{
      width: 300px;
      border-radius: 5px;
      height: 25px;
      overflow: hidden;
      border: 2px solid black;
      background-color: rgba(255, 255, 255, 0.4);
    }
  </style>
</head>

<body>

  <div class="wrapper">
      <div class="edit">
        <h1>Editar o perfil de '<?php echo $profile['username']; ?>'</h1>
        <form method="POST" action="eprofile.php?id=<?php echo $profileId; ?>">
          <label for="username">Username:</label><br>
          <input type="text" id="username" name="username" value="<?php echo $profile['username']; ?>"><br>
  
          <label for="email">Email:</label>
          <br>
          <input type="text" id="email" name="email" value="<?php echo $profile['email']; ?>"><br>
  
          <label for="pfp">Foto de perfil:</label>
          <br>
          <input type="text" id="pfp" name="pfp" value="<?php echo $profile['pfp']; ?>"><br>
          <br>
          <input type="submit" name="submit" value="Update profile">
          <br>
          <a href="profile.php?id=<?php echo $profileId; ?>"><input type="button" name="voltar" value="Voltar sem Salvar"></a>
      </div>
  </div>

</body>

</html>

<?php
}
?>