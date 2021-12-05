<?php
$CookieName = 'UserLogInData';
if(isset($_COOKIE[$CookieName])){
    session_start();
    $_SESSION['nume'] = $_COOKIE[$CookieName];
    header("Location: \HTML\main.html");
}
else{
    ?>
    <html>
<head>
    <title>Landing</title>
    
    <link rel="stylesheet" href="/CSS/stylel.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="/Images/fb.png">
                <img src="/Images/tw.png">
                <img src="/Images/gp.png">
            </div>
            <form id="login" class="input-group" action="/PHP/Log-In.php" method="post">
                <input type="text" class="input-field" placeholder="User Id" name = "nume" required>
                <input type="password" class="input-field" placeholder="Enter Password" name = "parola" required>
                <input type="checkbox" class="check-box" name = "rememberMe" value = "1"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group" action="/PHP/input_validation.php" method="post">
                <input type="text" class="input-field" placeholder="User Id" name="username" required>
                <input type="email" class="input-field" placeholder="Email Id" name = "email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name = "parola" required>
                <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
        
    </div>

    
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>
</html>
    <?php
}