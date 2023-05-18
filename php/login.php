<?php
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../css/képek/favicon.png" type="image/x-icon">
    <title>Bejelentkezés</title>
</head>

<body>
    <div class="login-container">
        <form class="login-form" method="post" action="checkLogin.php" onSubmit="return blankcheck()" name="submit">
            <h2>BEJELENTKEZÉS</h2>
            <label for="emailc">E-mail cím*</label>
            <input type="email" name="email" id="emailc" size="35"><br>
            <label for="pw">Jelszó*</label>
            <input type="password" name="password" id="pw" size="35"><br>
            <input type="submit" value="Bejelentkezés" name="submit">
            <p id="errorMsg">
                <?php
                if (isset($_GET["nomatch"])) {
                    if ($_GET["nomatch"] == true) {
                        echo "Hibás felhasználónév, jelszó párost adtál meg!";
                    }
                }
                ?>
            </p>
        </form>

    </div>
    <script>
        function blankcheck() {
            if (document.getElementById('emailc').value == '' || document.getElementById('pw') == '') {
                document.getElementById('errorMsg').innerHTML = "Töltsd ki mindkét mezőt a belépéshez!";
                return false;
            } else {
                return true
            }
        }
    </script>
</body>

</html>