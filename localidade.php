<?php
include("./connect.php");

function getLocalidades($conn){
    $sql = "SELECT * FROM localidade ORDER BY id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 0){
        return 0;
    }

    while ($row = mysqli_fetch_assoc($result)){
        $id = $row["id"];
        $nome = $row["nome"];
        $desc = $row["descricao"];
        $link = $row["linkfoto"];
        $sof = $row["siteoficial"];
        
        echo "<div class='localidade'>
                <h1>$nome</h1>
                <img src='$link'>
                <p>$desc</p>
                <button><a href='$sof'>Site Oficial</a></button>
                <button><a href='elocalidade.php?id=$id'>Edit</a></button>
            </div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Localizations</title>
	<style>
.wrapper{
            margin: 0;
            padding: 0;
            display: flex;
			flex-wrap: wrap;
			justify-content: center;
        }

        .clocalidade {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 15px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            width:350px;
            padding: 15px;
            margin: 10px;
            height:480px;
        }
        .localidade {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 15px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            padding: 15px;
            margin: 10px;
        }
        .localidade h1{
            margin-top: 10px;
        }
        .clocalidade button{
			background-color: rgb(9, 255, 0);
			text-align: center;
            text-decoration: none;
			font-size: 36px;
			color: white;
            border-radius: 5px;
            border: 2px black solid;
        }
        .clocalidade button a{
			background-color: rgb(9, 255, 0);
			text-align: center;
            text-decoration: none;
			font-size: 36px;
			color: white;
            border-radius: 5px;
            
        }
        .localidade img{
            width: 300px;
            height: 300px;
            margin-left: 10px;
            margin-right:10px;
			background-color: lightblue;
			text-align: center;
			line-height: 200px;
			font-size: 36px;
			color: white;
            border-radius: 5px;
        }

        .localidade button{
            background-color: aliceblue;
            border-radius: 5px;
            width: 50%;
            margin-bottom: 10px;
        }

        .localidade button a{
            text-decoration: none;
        }
        .localidade:hover button {
            display: block;
        }

        .localidade button a {
            text-decoration: none;
        }

        .add-button {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
	<div class="wrapper">
        <?php
            getLocalidades($connection);
        ?>
        <div class="clocalidade">
            <button><a href="clocalidade.php">Criar Localidade</a></button>
        </div>
	</div>
</body>
</html>
