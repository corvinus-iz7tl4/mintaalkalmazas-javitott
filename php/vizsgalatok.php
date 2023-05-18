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
    <title>Vizsgálatok</title>
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
                <li class="active"><img src="../css//képek/vizsgalatok.png" alt="kezdőlap ikon" height="15px"><a href="#">Vizsgálatok</a></li>
                <li><img src="../css//képek/gyogyszerek.png" alt="kezdőlap ikon" height="15px"><a href="gyogyszerek.php">Gyógyszerek</a></li>
                <li><img src="../css//képek/kijelentkezes.png" alt="kezdőlap ikon" height="15px"><a href='logout.php'>Kijelentkezés</a></li>
            </ul>
        </div>
        <div class="dashboard">
            <h3>Vizsgálatok</h3>
            <div class="box-szoveg box1">
                <p>Az XYZ Vidéki Orvosi Rendelőben széleskörű vizsgálati lehetőségeket kínálunk, hogy a páciensek a legmegfelelőbb és leghatékonyabb egészségügyi ellátást kapják.</p>
                <p>Rendelőnk büszkélkedhet a legmodernebb és legfejlettebb orvosi eszközökkel és berendezésekkel, amelyek lehetővé teszik számunkra a pontos diagnózisok felállítását és a hatékony kezelések nyújtását. Folyamatosan fejlesztjük és bővítjük eszközkészletünket, hogy mindig a legfrissebb technológiákat alkalmazhassuk a betegek szolgálatában.</p>
                <p>Orvosaink elkötelezettek az állandó tanulás és a szakmai fejlődés mellett. Folyamatosan követik az orvostudomány legújabb kutatási eredményeit és részt vesznek továbbképzéseken, hogy mindig naprakész információkkal rendelkezzenek és a leginnovatívabb módszereket alkalmazzák a betegek gyógyításában.</p>
                <p>Minden páciensünk visszajelzése és elégedettsége kiemelkedő fontossággal bír számunkra. Arra törekszünk, hogy biztonságos és kényelmes környezetet teremtsünk, ahol a betegek megnyugtató és szakszerű ellátásban részesülnek. Minden visszajelzést értékelünk és hasznosítunk, hogy folyamatosan javíthassunk a szolgáltatásainkon.</p>
            </div>
            <div class="box">
                <table>
                    <tr>
                        <td>Név:</td>
                        <td><?php echo $_SESSION['vizsgalat_nev'] ?></td>
                    </tr>
                    <tr>
                        <td>Dátuma:</td>
                        <td><?php echo $_SESSION['vizsgalat_datum'] ?></td>
                    </tr>
                    <tr>
                        <td>Eredménye::</td>
                        <td><?php echo $_SESSION['vizsgalat_eredmeny'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>