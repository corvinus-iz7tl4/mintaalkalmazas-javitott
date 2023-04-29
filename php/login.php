<?php
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>

<body>
    <div>
        <form method="post" action="checkLogin.php" onSubmit="return blankcheck()" name="submit">
            <h2>Bejelentkezés</h2>
            <label for="emailc">E-mail cím*</label><br>
            <input type="text" name="email" id="emailc" size="35"><br>
            <label for="pw">Jelszó*</label><br>
            <input type="password" name="password" id="pw" size="35"><br>
            <input type="submit" value="Bejelentkezés" name="submit">
        </form>
        <div id="errorMsg">
            <?php
            if (isset($_GET["nomatch"])) {
                if ($_GET["nomatch"] == true) {
                    echo "Hibás felhasználónév, jelszó párost adtál meg!";
                }
            }
            ?>
        </div>
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