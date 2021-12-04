<?php
$input = new DataBaseActivity;

class InputRead {
    public $nume;
    public $email;
    public $parola;

    function read_input(){
        $this->nume = $this->test_input($_POST['username']);
        $this->email = $this->test_input($_POST['email']);
        $this->parola = $this->test_input($_POST['parola']);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

class DataBaseActivity extends InputRead{
    public $conn;
    public $hostBazaDeDate;
    public $userBazaDeDate;
    public $parolaBazaDeDate;
    public $numeColoana;

    function __construct(){
        $this->read_input();
        $this->hostBazaDeDate = 'sql110.epizy.com';
        $this->userBazaDeDate = 'epiz_30509530';
        $this->parolaBazaDeDate = 'DenisDenis21';
        $this->numeColoana = 'epiz_30509530_XXX';
        $this->conn = new mysqli($this->hostBazaDeDate, $this->userBazaDeDate, $this->parolaBazaDeDate, $this->numeColoana);
        if($this->conn->connect_error){
            die($this->conn->connect_error);
        }
        else{
            if(!$this->CheckIfInvalidData()){
                $this->InsertData();
            }
            else{
                echo "Try again with another UserName or Email";
            }
        }
    }

    function CheckIfInvalidData(){
        $sql = "SELECT email FROM user WHERE email = '$this->email'";
        $result = $this->conn->query($sql);
        echo $result->num_rows;
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function InsertData(){
        $sql = "INSERT INTO user (username, email, parola) VALUES ('$this->nume', '$this->email', '$this->parola')";
        $this->conn->query($sql);
        $this->conn->close();
    }
}
?>