<?php include_once "./assets/include/db.php";
    $error;
    if(isset($_POST['submit'])) {
        if(isset($_POST['terms'])) {
            $username = $_POST["username"];
            $email = $_POST['email'];
            $password = $_POST["password"];
            $rePassword = $_POST["re-password"];

            if(empty($username)){
                $error .= "Username is nodig!<br>";
            } 
            if(empty($email)) {
                $error .= "Een geldige email is nodig!";
            }

            if(empty($password) || empty($rePassword)) {
                $error .= "Een wachtwoord is nodig voor beide";
            }

            if($password != $rePassword) {
                $error .= "Uw wachtworden kwamen niet overeen!";
            }

            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) {
                if($user['username'] === $username) {
                    $error .= "Deze naam bestaat al in de database!";
                }
                if($user['email'] === $email) {
                    $error .= "Deze mail bestaat al, iemand heeft hem al ingepikt!";
                }
            }

            if (empty($error)) {
                $password = md5($rePassword);

                $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                mysqli_query($conn, $query);
                setcookie('check', 'Uw account is aangemaakt, u kunt nu inloggen', time()+3600);
                header('location: login.php');   
            }
        } else {
            $error = "Bij het maken van een account moet je de <b>Terms of service</b> accepteren!";
        }
    }
    if(isset($error)) {
        $error .= "<b>Probeer het opnieuw!</b>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/login.css" rel="stylesheet">
    <title>Registreer - Zerdardian</title>
</head>
<body>
    <p>Keer terug naar <a href="./">de hoofd pagina</a></p>
    <div id="container">
        <div id="picture"><p>Z</p></div>
        <div id="login"><h1>Login</h1>
            <form for="login" action="" method="post">
                <label for="username">Kies een gebruikersnaam</label><br>
                <input type="text" placeholder="Username" name="username" required autocomplete="username" class="textbox"><br>
                <label for="username">Kies een E-mail</label><br>
                <input type="text" placeholder="E-mail" name="email" required autocomplete="email" class="textbox"><br>
                <label for="password">Kies een wachtwoord</label><br>
                <input type="password" placeholder="Password" name="password" required class="textbox re"><br>
                <input type="password" placeholder="Voer je wachtwoord opnieuw in" name="re-password" required class="textbox re"><br><br>
                <input type="radio" name="terms" value="accepted"><label for="terms" class="smaller">Bij het maken van een account ga je accoord met de terms of service!</label><br>
                <input type="submit" name="submit" value="Registeer" class="button">
            </form>
            <?php if(isset($error)){
                ?><div id="error">
                    <p>Error!</p>
                    <p><?php echo $error;?></p>
                </div><?php
            }?>
            <p>Al een account? <a href="./login.php">Log dan in!</a></p>
            <p id="logo-bottom">Z</p>
        </div>
    </div>
</body>
</html>