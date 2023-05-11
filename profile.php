<?php
include("connect.php");
include("verifylogin.php");
if (isset($_GET['id'])) {

    function getProfile($conn){
    $pid = $_GET['id'];
    $sql = "SELECT * FROM users where id = $pid ORDER BY id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $created = $row["created"];
        $pfp= $row['pfp'];
        $role = $row['admin'];
        if ($role == 1){
            $urole = 'administrador';
        } else {
            $urole = 'utilizador';
        }
        
            if ($_GET['id'] == $_SESSION['id'] || $_SESSION['admin'] == true){
            echo "<center><div class='card'>
            <img src='$pfp' alt='profile picture' style='width:100%'>
            <h1>$username</h1>
            <p class='title'>$email</p>
            <p>Criado: $created</p>
            <p>Funcao: $urole</p>
            <p><a href='eprofile.php?id=$id'><button>Edit</button></a></p>
            </div></center>";
            } else {
                echo "<center><div class='card'>
                <img src='$pfp' alt='profile picture' style='width:100%'>
                <h1>$username</h1>
                <p class='title'>$email</p>
                <p>Criado: $created</p>
                <p>Funcao: $urole</p>
                </div></center>";
                }
            }
        
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
      background-image: url(https://voenews.com.br/wp-content/uploads/2019/08/Berlengas-Island-_Centrode-Portugal.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: whitesmoke;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: rgba(255, 255, 255, 0.384);
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

input{
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
<?php
        getProfile($connection);
        ?>

<center><a href="localidade.php"><input type="button" name="voltar" value="Voltar"></a></center>
</body>
</html>