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
    <title>Vizsgálatok</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="adatok.php">Adatok</a></li>
            <li><a id="active" href="#">Vizsgálatok</a></li>
            <li><a href="gyogyszerek.php">Gyógyszerek</a></li>
            <li><a href='logout.php'>Kijelentkezés</a></li>
        </ul>
    </nav>
</body>

</html>