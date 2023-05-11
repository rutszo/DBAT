<?php
include("connect.php");
include("verifylogin.php");
include("verifyadmin.php");

function getLocalidades($conn)
{
    $sql = "SELECT * FROM localidade WHERE aprovado = 1 ORDER BY id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 0) {
        return 0;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $nome = $row["nome"];
        $desc = $row["descricao"];
        $link = $row["linkfoto"];
        $sof = $row["siteoficial"];
        $criador = $row['id_criador'];
        $editado = $row['lastedited'];
        $query = "SELECT username FROM users WHERE id = '$criador'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) < 0) {
            return 0;
        }
        while ($row2 = mysqli_fetch_assoc($res)) {
            $nomecriador = $row2["username"];
            echo "<div class='localidade'>
                    <h1>$nome</h1>
                    <img src='$link'>
                    <p>$desc</p>
                    <a class='default' href='$sof'>Site Oficial</a>
                    <a class='default' href='elocalidade.php?id=$id'>Edit</a>
                    <p>Criador: <a class='criador' href='profile.php?id=$criador'>$nomecriador</a> </p><p>Editado: $editado</p>
                    <form method='POST' action='appverify.php'>
                    <input type='hidden' name='post_id' value='$id'>
                    <button type='submit' name='approve'>Aprovar</button>
                    <button type='submit' name='reject'>Rejeitar</button>
                    </form>
                </div>";
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Localizations</title>
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
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .clocalidade {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 15px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            width: 320px;
            padding: 15px;
            margin: 10px;
            height: 580px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(6px);
        }

        .localidade {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 15px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 15px;
            margin: 10px;
            width: 320px;
            height: 580px;
            background-color: rgba(0, 0, 0, 0.01);
            backdrop-filter: blur(6px);
        }

        .localidade h1 {
            margin-top: 10px;
        }

        .clocalidade button {
            background-color: rgba(9, 255, 0, 0.2);
            text-align: center;
            text-decoration: none;
            font-size: 36px;
            color: white;
            border-radius: 15px;
            border: 2px black solid;
            height: 570px;
            width: 310px;
        }

        .clocalidade button a {
            background-color: rgb(9, 255, 0);
            text-align: center;
            text-decoration: none;
            font-size: 36px;
            color: black;
            border-radius: 5px;
        }

        .localidade img {
            width: 275px;
            height: 275px;
            margin-left: 10px;
            margin-right: 10px;
            background-color: lightblue;
            text-align: center;
            line-height: 200px;
            font-size: 36px;
            color: white;
            border-radius: 5px;
        }

        .default {
            border-radius: 5px;
            width: 150px;
            height: 25px;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
            background-color: rgba(255, 255, 255, 0.25);
        }
        .localidade * {
            text-decoration: none;
            color: white;
        }
        .criador {
            color: white;
            background-color: rgba(0, 0, 0, 0.0);
        }
        .add-button {
            text-align: center;
            margin-bottom: 20px;
        }
        .zeto, button{
            width: 300px;
            border-radius: 5px;
            height: 25px;
            overflow: hidden;
            border: 2px solid black;
            background-color: rgba(255, 255, 255, 0.4);
        }
        .zeto{
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="wrapper" style="width:100vw;height:100px;">

    <center><a href="adminpage.php"><input class="zeto" type="button" name="voltar" value="Voltar"></a></center>
    </div>
    <div class="wrapper">
        <?php
        getLocalidades($connection);
        ?>
        
    </div>
</body>

</html>