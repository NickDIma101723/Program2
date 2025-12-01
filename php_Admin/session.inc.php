<?php

session_start();

// Controleert of de gebruiker is ingelogd
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: views/login_view.php");
    exit();
}
