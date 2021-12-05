<?php
$host = 'sql110.epizy.com';
$user = 'epiz_30509530';
$pass = 'DenisDenis21';
$name = 'epiz_30509530_Rating';
session_start();
$conn = new mysqli($host, $user, $pass, $name);
$sql = "SELECT * FROM rating";
$result = $conn->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "/CSS/styleMain.css">
</head>
<body>
    <div class="top-bar">
        <h1>
            My Forum
        </h1>

    </div>
    <div class = "main">
        <?php
            if($result->num_rows <= 9){
                ?>
                <style>
                    .main{
                        height: 100%;
                    }
                </style>
                    <?php
            }
            while($row = $result->fetch_assoc()){
                echo "<div id='recenzie'>" . $row['Nume'] . $row['Tip'] . $row['stele'] . "</div>";
            }
            ?>
    </div>
</body>
</html>