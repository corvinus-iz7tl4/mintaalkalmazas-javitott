<?php
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Connect</title>
</head>

<body>
    <h1>
        <?php
        $adatbazis = "javitott_iz7tl4";
        $kapcsolat = mysqli_connect("127.0.0.1", "root", "");
        if (!$kapcsolat) {
            $mysqli;
            die("Nem lehet csatlakozni a MySQL kiszolgálóhoz! " . mysqli_error($mysqli));
        } else {
            //print "Sikerült csatlakozni <br>";
        }
        mysqli_select_db($kapcsolat, $adatbazis)
            or die("Nem lehet megnyitni a következő adatbázist: $adatbazis" . mysqli_error($mysqli));
        //print "Sikeresen kiválasztott adatbázis: " . $adatbazis . "<br>";
        ?>
    </h1>
</body>

</html>