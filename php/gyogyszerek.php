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
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../css/képek/favicon.png" type="image/x-icon">
    <title>Gyógyszerek</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="../css/képek/favicon.png" alt="logo" width="60px">
        </div>
        <div class="webname">
            <h2>XYZ Vidéki Orvosi Rendelő</h2>
        </div>
        <div class="profile">
            <span>Üdvözöljük, Vágó Blanka!</span>
            <img class="profile-picture" src="../css/képek/profilKep.webp" alt="Profil Kép">
        </div>
    </div>
    <div class="container">

        <div class="menu">
            <ul>
                <li><img src="../css//képek/dashboard.png" alt="kezdőlap ikon" height="15px"><a href="dashboard.php">Kezdőlap</a></li>
                <li><img src="../css//képek/adatok.png" alt="kezdőlap ikon" height="15px"><a href="adatok.php">Adatok</a></li>
                <li><img src="../css//képek/vizsgalatok.png" alt="kezdőlap ikon" height="15px"><a href="vizsgalatok.php">Vizsgálatok</a></li>
                <li class="active"><img src="../css//képek/gyogyszerek.png" alt="kezdőlap ikon" height="15px"><a href="#">Gyógyszerek</a></li>
                <li><img src="../css//képek/kijelentkezes.png" alt="kezdőlap ikon" height="15px"><a href='logout.php'>Kijelentkezés</a></li>
            </ul>
        </div>
        <div class="dashboard">
            <h3>Gyógyszerek</h3>
            <div class="box-gyogyszer">
                <h4>Keresés</h4>
                <form action="gyogyszerek.php" method="get">
                    <input type="text" name="search" id="search"><br>
                    <input type="submit" value="Keresés">
                </form>
            </div>
            <div class="box-gyogyszer box2">
                <?php
                require_once("connect.php");
                if (isset($_POST["search_btn"])) {
                    $gyogyszer = $_POST["search"];

                    $cleared_gyogyszer = mysqli_real_escape_string($kapcsolat, $gyogyszer);

                    $query = "SELECT * FROM gyogyszer WHERE nev LIKE CONCAT('%',?,'%')";
                    $stmt = $kapcsolat->prepare($query);
                    $stmt->bind_param("s", $cleared_gyogyszer);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if (mysqli_num_rows($result) > 0) {
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            print "<table>";
                            print "<tr><th colspan='2'> GYÓGYSZER ADATAI </th></tr>";
                            print "<tr><td>Név:</td><td>";
                            echo $gyogyszerResult['nev'];
                            print "</td></tr><tr><td>Adagolás:</td><td>";
                            echo $gyogyszerResult['adagolas'];
                            print "</td></tr><tr><td>Vény köteles?</td><td>";
                            if ($gyogyszerResult['venykotelezett-e'] === 0) {
                                print "nem vényköteles";
                            } else {
                                print "vényköteles";
                            }
                            print "</td></tr><tr><td>Betegség:</td><td>";
                            echo $gyogyszerResult['betegseg'];
                            print "</td></tr></table>";
                            $i++;
                        }
                    } else {
                        echo "nincs találat";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>