<?php

$type = 'cladire';
$order = 'DESC';
$host = 'sql110.epizy.com';
$user = 'epiz_30509530';
$pass = 'DenisDenis21';
$nume = 'epiz_30509530_Rating';
$startLoop;
$endLoop;
$contor = 0;
$contor2 = 0;
$value2 = array();
$name2 = array();
$name = array();
$value = array();

$conn = new mysqli($host, $user, $pass, $nume);
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

    for($i = 0;$i < $contor2 - 1;$i++){
        for($j = $i + 1;$j < $contor2;$j++){
            if($value2[$i] > $value2[$j]){
                InterSchimb($value2[$i], $value2[$j]);
                InterSchimb($name2[$i], $name2[$j]);
            }
        }
    }

    if($order == "ASC"){
        for($i = 0;$i < $contor2;$i++){
            echo $name2[$i] . $value2[$i];
        }
    }
    else{
        for($i = $contor2 - 1;$i >= 0;$i--){
            echo $name2[$i] . $value2[$i];
        }
    }
}


function InterSchimb(&$a, &$b){
    $copie = $a;
    $a = $b;
    $b = $copie;
}

