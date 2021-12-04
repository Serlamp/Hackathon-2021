<?php

$type = "cladire";
$contor = 0;
$contor2 = 0;
$value2 = array();
$name2 = array();
$name = array();
$value = array();

$conn = new mysqli('sql110.epizy.com', 'epiz_30509530', 'DenisDenis21
', 'epiz_30509530_XXX');
if($conn->connect_error){
    die($conn->connect_error);
}
$sql = "SELECT * FROM rating WHERE Tip = '$type'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $name[$contor] = $row['Nume'];
        $value[$contor++] = $row['stele']; 
    }

    for($i = 0;$i < $contor;$i++){
        $k = 0;
        $exista = false;
        if($contor2 > 0){
            for($j = 0;$j < $contor2;$j++){
                if($name[$i] == $name2[$j]){
                    $exista = true;
                    break;
                }
            }
        }
        if($exista == false){
            $value2[$contor2] = $value[$i];
            $k = 1;
            for($j = $i + 1;$j < $contor;$j++){
                if($name[$i] == $name[$j]){
                    $k++;
                    $value2[$contor2] += $value[$j];
                }
            }
            $value2[$contor2] /= $k;
            $name2[$contor2++] = $name[$i];
        }
    }
    
    for($i = 0;$i < $contor2;$i++){
        echo "<div><h1> " . $name2[$i] . " " . $value2[$i] . "</h1></div>";
    }
}
