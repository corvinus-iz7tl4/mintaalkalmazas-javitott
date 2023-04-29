<?php
session_start();
if (!$_SESSION['loggedin']) {
    header('Location: login.php');
    exit;
}
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Adatok</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a id="active" href="#">Adatok</a></li>
            <li><a href="vizsgalatok.php">Vizsgálatok</a></li>
            <li><a href="gyogyszerek.php">Gyógyszerek</a></li>
            <li><a href='logout.php'>Kijelentkezés</a></li>
        </ul>
    </nav>
</body>

</html>