<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        .wrapper {
            background-image: url(https://turismodocentro.pt/wp-content/uploads/2019/12/Berlengas-1920x1080-1.jpg);
            display: flex;
            width: 100vw;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.5);
            height: 100vh;
            width: 100vw;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .container * {
            color: white;
            text-decoration: none;
        }
        .container h1 {
            font-size: 50px;
            margin: 0px;
        }
        .container h3 {
            font-size: 35px;
            margin: 5px;
        }
        .container button {
            margin: 10px;
            width: 200px;
            height: 50px;
            font-size: 20px;
            font-weight: 600;
            border-radius: 10px;
            border: 2px solid black;
            background-color: rgba(0, 0, 0, 0.24);
        }
    </style>
  </head>
  <body>
    <div class="wrapper">
            <div class="container">
                    <h1>DBAT</h1>
                    <h3>This was a project developed for school where you can </h3>
                    <h3>add, edit, delete locations and more using database access technologies</h3>
                    <h3>such as php, mysql and others. click below to access the site!</h3>
                    <?php
                    if ($_SESSION['loggedin'] == true){
                        ?>
                    <a href="logout.php"><button>Click Me to Log Out!</button></a>
                    <?php } else {
                        ?>
                        <a href="login.php"><button>Click Me to Log In!</button></a>
                        <?php
                    }
                    ?>
            </div>
    </div>  
  </body>
</html>
