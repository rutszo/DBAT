<?php

include("./connect.php");

error_reporting(0);

session_start();

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
			$sql = "INSERT INTO users (username, password, email)
					VALUES ('$username', '$password', '$email')";
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



	<title>Register</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>