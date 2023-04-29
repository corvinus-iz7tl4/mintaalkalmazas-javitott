<?php
session_start();

if ($_SESSION['loggedin']) {
    session_destroy();
    header("Location: login.php");
}
