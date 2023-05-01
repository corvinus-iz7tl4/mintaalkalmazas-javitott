<?php
session_start();

/* $host = '127.0.0.1';
$user = 'root';
$pw = '';
$database = 'javitott_iz7tl4';

try {
    $connect_PDO = new PDO('mysqli:host=$host;dbname=$database', $user, $pw);
    print "<pre>";
    print_r($connect_PDO);
    print "</pre>";
    $connect_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
} */


if (isset($_POST["submit"])) {
    require_once("connect.php");

    mysqli_set_charset($kapcsolat, "utf-8");

    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    $cleared_email = mysqli_real_escape_string($kapcsolat, $email);
    $cleared_password = mysqli_real_escape_string($kapcsolat, $password);


    //https://www.webslesson.info/2016/06/php-login-script-using-pdo-with-session.html
    //https://medium.com/@sujithsandeep/php-pdo-connection-and-authentication-registration-login-and-logout-909e950b10cd
    //https://www.sourcecodester.com/tutorials/php/12348/php-pdo-login-and-registration.html
    //ezt a három cikket próbáltam követni, de valamiért hibát dob minden alkalommal --> megnézni mi a probléma 
    /*     $query = "SELECT * FROM paciens WHERE email= :cleared_email AND jelszo= :cleared_password";
    $statement = $connect_PDO->prepare($query);
    $statement->execute(array($cleared_email, $cleared_password));
    $row = $statement->rowCount();
    $paciens = $statement->fetch() */;

    $query = "SELECT * FROM paciens WHERE email='$cleared_email' AND jelszo='$cleared_password'";
    $result = mysqli_query($kapcsolat, $query);
    $paciens = mysqli_fetch_assoc($result);

    /* print($query);
    print "<pre>";
    print_r($result);
    print "</pre>"; */

    if (mysqli_num_rows($result) > 0/* $row > 0 */) {
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
