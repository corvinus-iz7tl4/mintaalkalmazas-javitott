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
    <link rel="icon" href="../css/képek/favicon.png" type="image/x-icon">
    <title>Főoldal</title>
</head>

<body>
    <nav class="nav-bar">
        <ul>
            <li><a href="#" class="nav-item active">DASHBOARD</a></li>
            <li><a href="adatok.php" class="nav-item">Adatok</a></li>
            <li><a href="vizsgalatok.php" class="nav-item">Vizsgálatok</a></li>
            <li><a href="gyogyszerek.php" class="nav-item">Gyógyszerek</a></li>
            <li><a href='logout.php' class="logout-btn">Kijelentkezés</a></li>
        </ul>
    </nav>
    <div class="dashboard">
        <div class="group">
            <table>
                <tr>
                    <td colspan="2">ADATOK</td>
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
        <div class="group">
            <table>
                <tr>
                    <td colspan="2">VIZSGÁLATOK</td>
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
        <div class="group">
            <table>
                <tr>
                    <td colspan="2">GYÓGYSZEREK</td>
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
    </div>
</body>

</html>