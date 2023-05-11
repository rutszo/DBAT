<?php

include("connect.php");

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['id'] = $row['id'];
		
		if ($row['admin'] == 1){
			$_SESSION['admin'] = true;
		} else {
			$_SESSION['admin'] = false;
		}
		$_SESSION['loggedin'] = true;
		header("Location: localidade.php");
	}
	else {
		echo "<script>alert('Wrong e-mail or password')</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    .edit input, .edit button{
      width: 300px;
      border-radius: 5px;
      height: 25px;
      overflow: hidden;
      border: 2px solid black;
      background-color: rgba(255, 255, 255, 0.4);
    }
	.edit a {
		text-decoration: none;
		color: white;
	}
	</style>
	<title>Login</title>
</head>

<body>
	<div class="wrapper">
		<div class="edit">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="" required>
				</div>
				<br>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="" required>
				</div>
				<br>
				<div class="input-group">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			</form>
		</div>
	</div>
</body>

</html>