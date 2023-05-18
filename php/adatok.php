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
    <title>Adatok</title>
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
                <li class="active"><img src="../css//képek/adatok.png" alt="kezdőlap ikon" height="15px"><a href="#">Adatok</a></li>
                <li><img src="../css//képek/vizsgalatok.png" alt="kezdőlap ikon" height="15px"><a href="vizsgalatok.php">Vizsgálatok</a></li>
                <li><img src="../css//képek/gyogyszerek.png" alt="kezdőlap ikon" height="15px"><a href="gyogyszerek.php">Gyógyszerek</a></li>
                <li><img src="../css//képek/kijelentkezes.png" alt="kezdőlap ikon" height="15px"><a href='logout.php'>Kijelentkezés</a></li>
            </ul>
        </div>
        <div class="dashboard">
            <h3>Adatok</h3>
            <div class="box-szoveg box1">
                <h4>Üdvözöljük az XYZ Vidéki Orvosi Rendelő honlapján!</h4>
                <p>Az XYZ Vidéki Orvosi Rendelő egy kis létszámú, családias hangulatú egészségügyi intézmény, melynek célja a minél szélesebb körben történő gyógyítás és betegellátás. Csapatunk elkötelezett az egyéni figyelem és gondoskodás mellett, hogy minden páciensünk számára a legmagasabb színvonalú egészségügyi ellátást biztosítsuk.</p>
                <p>A rendelőnket az a küldetés vezérli, hogy bizalommal forduljon hozzánk mindenki, aki segítségre van szüksége. Legyen szó általános orvosi vizsgálatról, egészségmegőrzésről, vagy krónikus betegségek kezeléséről, szakavatott orvosaink minden területen segítséget nyújtanak. Fontosnak tartjuk a prevenciót és a betegek oktatását, ezért aktívan részt veszünk a megelőzést célzó programokban és rendszeresen szervezünk tájékoztató előadásokat.</p>
                <p>Ha szeretné felvenni velünk a kapcsolatot, szívesen állunk rendelkezésére. Az alábbi elérhetőségeken bármikor elérhet minket:</p>
                <ul>
                    <li>Telefonszám: +36 20 345 6718</li>
                    <li>E-mail: info[kukac]xyzorvosirendelo.hu</li>
                    <li>Címünk: Fő utca 1., Vidék város, 9988 Magyarország</li>
                </ul>
                <p>Várjuk Önt a rendelőnkben, ahol kedves és tapasztalt orvosaink segítenek Önnek visszanyerni és megőrizni egészségét.
            </div>
            <div class="box">
                <table>
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
        </div>
    </div>
</body>

</html>