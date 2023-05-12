<?php
session_start();

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

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['paciens_nev'] = $paciens["nev"];
        $_SESSION['paciens_szul_ido'] = $paciens["szul_ido"];
        $_SESSION['paciens_szemelyi'] = $paciens["szemelyi"];
        $_SESSION['paciens_tajSzam'] = $paciens["tajSzam"];
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
