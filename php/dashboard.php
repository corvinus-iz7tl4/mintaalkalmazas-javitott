<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
if (!$_SESSION['loggedin']) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../css/képek/favicon.png" type="image/x-icon">
    <title>Főoldal</title>
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
            <span>Üdvözöljük, <?php echo $_SESSION['paciens_nev'] ?>!</span>
            <img class="profile-picture" src="../css/képek/profilKep.webp" alt="Profil Kép">
        </div>
    </div>
    <div class="container">

        <div class="menu">
            <ul>
                <li class="active"><img src="../css//képek/dashboard.png" alt="kezdőlap ikon" height="15px"><a href="#" class="active dashboard-btn">Kezdőlap</a></li>
                <li><img src="../css//képek/adatok.png" alt="kezdőlap ikon" height="15px"><a href="adatok.php">Adatok</a></li>
                <li><img src="../css//képek/vizsgalatok.png" alt="kezdőlap ikon" height="15px"><a href="vizsgalatok.php">Vizsgálatok</a></li>
                <li><img src="../css//képek/gyogyszerek.png" alt="kezdőlap ikon" height="15px"><a href="gyogyszerek.php">Gyógyszerek</a></li>
                <li><img src="../css//képek/kijelentkezes.png" alt="kezdőlap ikon" height="15px"><a href='logout.php' class="logout-btn">Kijelentkezés</a></li>
            </ul>
        </div>
        <div class="dashboard">
            <h3>Kezdőlap</h3>
            <div class="box box1">
                <table>
                    <tr>
                        <th colspan="2">ADATOK</th>
                    </tr>
                    <tr>
                        <td>Név:</td>
                        <td><?php echo $_SESSION['paciens_nev'] ?></td>
                    </tr>
                    <tr>
                        <td>Születési idő:</td>
                        <td><?php echo $_SESSION['paciens_szul_ido'] ?></td>
                    </tr>
                    <tr>
                        <td>Személyi szám:</td>
                        <td><?php echo $_SESSION['paciens_szemelyi'] ?></td>
                    </tr>
                    <tr>
                        <td>TAJ szám:</td>
                        <td><?php echo  $_SESSION['paciens_tajSzam'] ?></td>
                    </tr>
                    <tr>
                        <td>Kezelő orvos:</td>
                        <td><?php echo $_SESSION['paciens_nev'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="box box1">
                <table>
                    <tr>
                        <th colspan="2">KEZELŐORVOS ADATAI</th>
                    </tr>
                    <tr>
                        <td>Név:</td>
                        <td><?php echo $_SESSION['orvos_nev'] ?></td>
                    </tr>
                    <tr>
                        <td>Szakképzetség:</td>
                        <td><?php echo $_SESSION['orvos_szak'] ?></td>
                    </tr>
                    <tr>
                        <td>Pecsét szám:</td>
                        <td><?php echo $_SESSION['orvos_pecset'] ?></td>
                    </tr>
                    <tr>
                        <td>Telefonszám:</td>
                        <td><?php echo  $_SESSION['orvos_telefon'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="box box1">
                <table>
                    <tr>
                        <th colspan="2">GYÓGYSZER ADATAI</th>
                    </tr>
                    <tr>
                        <td>Név:</td>
                        <td><?php echo $_SESSION['gyogyszer_nev'] ?></td>
                    </tr>
                    <tr>
                        <td>Adagolás:</td>
                        <td><?php echo $_SESSION['gyogyszer_adagolas'] ?></td>
                    </tr>
                    <tr>
                        <td>Vényköteles?:</td>
                        <td><?php
                            if ($_SESSION['gyogyszer_venas'] === 0) {
                                print "nem vényköteles";
                            } else {
                                print "vényköteles";
                            } ?></td>
                    </tr>
                    <tr>
                        <td>Betegség:</td>
                        <td><?php echo  $_SESSION['gyogyszer_betegseg'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>