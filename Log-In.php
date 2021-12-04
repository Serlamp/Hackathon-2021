<?php

$LogIn = new BazaDeDate;

class InputRecieve{
    public $parola;
    public $username;

    function ReadData(){
        $this->username = $_POST['nume'];
        $this->parola = $_POST['parola'];
        if(isset($_POST['rememberMe'])){
            setcookie('UserLogInData', $this->username, time() + (86400 * 30), "/");
        }
    }
}

class BazaDeDate extends InputRecieve {
    const host = 'sql110.epizy.com';
    const user = 'epiz_30509530';
    const parolaBazaDeDate = 'DenisDenis21';
    const nume = 'epiz_30509530_XXX';

    function __construct(){     
        $conn = new mysqli(self::host, self::user, self::parolaBazaDeDate, self::nume);
        if($conn->connect_error){
            die("Connection failed");
        }
        else{
            $this->CheckData($conn);
        }
    }

    function CheckData($conn){
        $this->ReadData();
        $sql = "SELECT * FROM user WHERE username = '$this->username'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($row['parola'] != $this->parola){
                echo "Datele introduse sunt gresite!";
            }
            else{
                if($row['username'] == 'Admin'){
                    session_start();
                    $_SESSION['admin'] = 'admin';
                    header("Location: admin.php");
                }
                else{
                    session_start();
                    $_SESSION['nume'] = $this->username;
                    header("Location: /HTML/main.html");
                }               
            }
        }
        else{
            echo "Datele introduse sunt gresite!";
        }
    }
}