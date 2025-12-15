<?php
session_start();
require 'session.inc.php';
require 'config.php';

$map = "images/";
$tn_map = "thumbnails/";

try {
    $query = "SELECT * FROM afbeeldingen ORDER BY ID DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $afbeeldingen = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Database fout: " . $e->getMessage());
}

require 'views/overzicht_view.php';
