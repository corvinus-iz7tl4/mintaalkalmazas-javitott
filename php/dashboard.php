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
    <title>Főoldal</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="#">DASHBOARD</a></li>
            <li><a href="adatok.php">Adatok</a></li>
            <li><a href="vizsgalatok.php">Vizsgálatok</a></li>
            <li><a href="gyogyszerek.php">Gyógyszerek</a></li>
            <li><a href='logout.php'>Kijelentkezés</a></li>
        </ul>
    </nav>
    <div>
        <a href="adatok.php">
            <div>
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
        </a>
        <a href="vizsgalatok.php">
            <div>
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
        </a>
        <a href="gyogyszerek.php">
            <div>
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
        </a>
    </div>
</body>

</html>