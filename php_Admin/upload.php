<?php
session_start();
require 'session.inc.php';

$error = "";
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

require 'views/upload_view.php';
