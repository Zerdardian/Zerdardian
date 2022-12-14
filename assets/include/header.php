<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/basis.css" rel="stylesheet">
    <title>Zerdardian</title>
</head>
<body>
    <div class="wrapper">
        <span id="styling-1"></span>
        <header>
            <div id="header">
                <h1>Zerdardian</h1>
            </div>
            <button id="menu-text" onclick="openNav()"><b>Menu</b></button>
                <div id="menu">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
                    <a class="menu-item" href="./">Home</a>
                    <a class="menu-item" href="./about">About</a>
                    <a class="menu-item" href="./portofolio">Portofolio</a>
                    <a class="menu-item" href="./contact">Contact</a>
                    <p class="menu-account"><?php
                        session_start();
                        if(isset($_SESSION["username"])) {
                            ?><a href="./profile.php">Welkom <?php echo $_SESSION["username"];?></a><br>
                            <a href="./logout.php">Log uit</a><?php
                        } else {
                            ?><a href="./login.php">Login</a><br><a href="./register.php">Register</a><?php
                        }
                    ?></p>
                </div>
        </header>