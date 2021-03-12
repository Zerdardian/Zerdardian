<?php
    include_once "./assets/include/db.php";
    $message = $error = "";
    if(isset($_COOKIE["check"])) {
        setcookie('check', '');
        $message = "Uw account is aangemaakt! U kunt nu inloggen!";
    }

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
    if(empty($username)) {
        $error .= "Een username is required!<br>";
    }
    if(empty($password)) {
        $error .= "Een wachtwoord is required!<br>";
    }

    if(empty($error)) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['succes'] = "You are now logged in!";
            header('location: index.php');
        } else {
            $error .= "De username en/of het wachtwoord komen niet overeen!<br>";
        }
    }
    if(!empty($error)) {
        $error .= "Probeer het opnieuw!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/login.css" rel="stylesheet">
    <title>Login - Zerdardian</title>
</head>
<body>
    <p>Keer terug naar <a href="./">de hoofd pagina</a></p>
    <div id="container">
        <div id="picture"><p>Z</p></div>
        <div id="login"><h1>Login</h1>
            <?php if(!empty($message) || !empty($error)){echo $message . $error;}?>
            <form for="login" action="" method="post">
                <label for="username">Username</label><br>
                <input type="text" placeholder="Username" name="username" required autocomplete="username" class="textbox"><br>
                <label for="password">Password</label><br>
                <input type="password" placeholder="Password" name="password" required class="textbox"> <br>
                <input type="submit" name="submit" value="Login" class="button">
            </form>

            <p>Nog geen account? <a href="./register.php">Registreer je dan hier!</a></p>
            <p id="logo-bottom">Z</p>
        </div>
    </div>
</body>
</html>