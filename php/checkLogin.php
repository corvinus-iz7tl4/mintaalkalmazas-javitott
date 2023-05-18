<?php
session_start();
header("Content-type: text/html; charset=utf-8");

if (isset($_POST["submit"])) {
    require_once("connect.php");
    mysqli_set_charset($kapcsolat, "utf-8");


    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    $cleared_email = mysqli_real_escape_string($kapcsolat, $email);
    $cleared_password = mysqli_real_escape_string($kapcsolat, $password);

    $query = "SELECT * FROM paciens WHERE email=? AND jelszo=?";
    $stmt = $kapcsolat->prepare($query);
    $stmt->bind_param("ss", $cleared_email, $cleared_password);
    $stmt->execute();
    $result = $stmt->get_result();
    $paciens = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['paciens_nev'] = $paciens["nev"];
        $_SESSION['paciens_szul_ido'] = $paciens["szul_ido"];
        $_SESSION['paciens_szemelyi'] = $paciens["szemelyi"];
        $_SESSION['paciens_tajSzam'] = $paciens["tajSzam"];

        $orvosID = $paciens['orvosID'];
        $queryOrvos = "SELECT * FROM orvos WHERE id=?";
        $stmt = $kapcsolat->prepare($queryOrvos);
        $stmt->bind_param("s", $orvosID);
        $stmt->execute();
        $resultOrvos = $stmt->get_result();
        $orvos = mysqli_fetch_assoc($resultOrvos);

        if (mysqli_num_rows($resultOrvos) > 0) {
            $_SESSION['orvos_nev'] = $orvos["nev"];
            $_SESSION['orvos_szak'] = $orvos["szakkepzes"];
            $_SESSION['orvos_pecset'] = $orvos["pecsetszam"];
            $_SESSION['orvos_telefon'] = $orvos["telefonszam"];
        } else {
            $_SESSION['orvos_nev'] = 'nincs adat';
            $_SESSION['orvos_szak'] = 'nincs adat';
            $_SESSION['orvos_pecset'] = 'nincs adat';
            $_SESSION['orvos_telefon'] = 'nincs adat';
        }

        $gyogyszerID = $paciens['gyogyszerID'];
        $queryGyogyszer = "SELECT * FROM gyogyszer WHERE id=?";
        $stmt = $kapcsolat->prepare($queryGyogyszer);
        $stmt->bind_param("s", $gyogyszerID);
        $stmt->execute();
        $resultGyogyszer = $stmt->get_result();
        $gyogyszer = mysqli_fetch_assoc($resultGyogyszer);

        if (mysqli_num_rows($resultGyogyszer) > 0) {
            $_SESSION['gyogyszer_nev'] = $gyogyszer["nev"];
            $_SESSION['gyogyszer_adagolas'] = $gyogyszer["adagolas"];
            $_SESSION['gyogyszer_venas'] = $gyogyszer["venykotelezett-e"];
            $_SESSION['gyogyszer_betegseg'] = $gyogyszer["betegseg"];
        } else {
            $_SESSION['gyogyszer_nev'] = 'nincs adat';
            $_SESSION['gyogyszer_adagolas'] = 'nincs adat';
            $_SESSION['gyogyszer_venas'] = 'nincs adat';
            $_SESSION['gyogyszer_betegseg'] = 'nincs adat';
        }

        $vizsgalatID = $paciens['vizsgalatID'];
        $queryVizsgalat = "SELECT * FROM vizsgalatok WHERE id=?";
        $stmt = $kapcsolat->prepare($queryVizsgalat);
        $stmt->bind_param("s", $vizsgalatID);
        $stmt->execute();
        $resultVizsgalat = $stmt->get_result();
        $vizsgalatok = mysqli_fetch_assoc($resultVizsgalat);

        if (mysqli_num_rows($resultVizsgalat) > 0) {
            $_SESSION['vizsgalat_nev'] = $vizsgalatok["nev"];
            $_SESSION['vizsgalat_datum'] = $vizsgalatok["datum"];
            $_SESSION['vizsgalat_eredmeny'] = $vizsgalatok["eredmeny"];
        } else {
            $_SESSION['vizsgalat_nev'] = 'nincs adat';
            $_SESSION['vizsgalat_datum'] = 'nincs adat';
            $_SESSION['vizsgalat_eredmeny'] = 'nincs adat';
        }

        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        header('Location: login.php?nomatch=true');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

mysqli_close($kapcsolat);
