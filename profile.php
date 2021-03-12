<?php include_once './assets/include/header.php';
include_once './assets/include/db.php';
session_start();
$username = $_SESSION["username"];
?>

<div id="container">
    <h1>Welkom op je profiel, <?php echo $username?></h1>
    <div id="info">
        <h3>Jouw informatie</h3>
        <p>Dit ben jij!</p>
    </div>
    <div id="aanpassen">
        <h3>Aanpassen data</h3>
        <p>Hier kan je data aanpassen wat je niet meer kan gebruiken. En je kunt je profielfoto instellen!</p>
    </div>
</div>

<?php include_once './assets/include/footer.php'?>