<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onclick = "document.getElementById('ceva').innerHTML = ''">
<form action = "" method = "POST">
    <select name="tip" required>
        <option value = "strada">Strada</option>
        <option value = "monument">Monument</option>
        <option value = "cladire">Cladire</option>
    </select>
    <input type = "text" id = "input" name = "nume" oninput="filterData()" onfocusin = "if(this.value != '')filterData()" autocomplete="off" required oninvalid = "this.setCustomValidity('Please insert a valid street name')" >
    <input type = "text" id = "star" name = "rating" required>
    <input type = "submit" onfocus = "checkData()" name = "submit">
    <div id = "ceva"></div>
</form>
    <script src = "/JS/input.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    session_start();
    if(!isset($_POST['nume'])){
        header("Location : /PHP/Post.php");
    }
    $nume = $_POST['nume'];
    $tip = $_POST['tip'];
    $stele = $_POST['rating'];
    $user = $_SESSION['nume'];
    $conn = new mysqli('localhost', 'root', '', 'user');
    $sql = "INSERT INTO rating (Nume, Tip, stele, UserName) VALUES ('$nume', '$tip', '$stele', '$user')";
    $conn->query($sql);
}
?>