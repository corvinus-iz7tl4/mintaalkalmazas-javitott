<?php
if (isset($_POST["submit"])) {
    require_once("connect.php");
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    $cleared_email = mysqli_real_escape_string($kapcsolat, $email);
    $cleared_password = mysqli_real_escape_string($kapcsolat, $password);

    mysqli_set_charset($kapcsolat, "utf-8");

    $query = "SELECT * FROM paciens WHERE email='$cleared_email' AND jelszo='$cleared_password'";
    $result = mysqli_query($kapcsolat, $query);
    $paciens = mysqli_fetch_assoc($result);

    /* print($query);
    print "<pre>";
    print_r($result);
    print "</pre>"; */

    if (mysqli_num_rows($result) >= 1) {
        session_start();
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
