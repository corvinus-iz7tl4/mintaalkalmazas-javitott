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
    <title>Gyógyszerek</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="adatok.php">Adatok</a></li>
            <li><a href="vizsgalatok.php">Vizsgálatok</a></li>
            <li><a id="active" href="#">Gyógyszerek</a></li>
            <li><a href='logout.php'>Kijelentkezés</a></li>
        </ul>
    </nav>

    <div>
        <h3>KERESÉS</h3>
        <form action="gyogyszerek.php" method="get">
            <input type="text" name="search" id="search">
            <input type="button" value="Keresés" name="searc_btn">
        </form>
        <?php
        require_once("connect.php");
        if (isset($_GET["search"])) {
            $gyogyszer = $_GET["search"];

            $query = "SELECT * FROM gyogyszer WHERE nev LIKE '%$gyogyszer'";
            $result = mysqli_query($kapcsolat, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($results = mysqli_fetch_array($result)) {
                    echo "<p><h4>" . $results['nev'] . "</p></h4>";
                }
            } else {
                echo "nincs találat";
            }
        }
        ?>
    </div>

</body>

</html>