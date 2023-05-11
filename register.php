<?php

include("connect.php");

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($connection, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (id, username, password, email, created, edited, pfp, admin)
					VALUES ('', '$username', '$password', '$email', CURRENT_TIMESTAMP, '', '', '0')";
			$result = mysqli_query($connection, $sql);
			if ($result) {
				echo "<script>alert('Registo confirmado')</script>";
				$username = "";
				$email = "";
				md5($_POST['password'] = "");
				md5($_POST['cpassword'] = "");
				header("Location: login.php");
			}
			else {
				echo "<script>alert('Something went wrong...')</script>";
			}
		}
		else {
			echo "<script>alert('o email já está registado')</script>";
		}
	}
	else {
		echo "<script>alert('passwords não correspondentes')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="UTF-8" />
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
	.edit a, .edit button {
		text-decoration: none;
		color: white;
	}
	</style>
	<title>Register</title>
</head>

<body>
	<div class="wrapper">
		<div class="edit">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
				<div class="input-group">
					<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<br>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<br>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<br>
				<div class="input-group">
					<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div>
				<br>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>

				<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
			</form>
		</div>
	</div>
</body>

</html>