<?php
session_start();
require 'session.inc.php';
require 'config.php';

// Map voor afbeeldingen
$map = "images/";

// Alle afbeeldingen ophalen uit de database
try {
    $query = "SELECT * FROM afbeeldingen ORDER BY ID DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $afbeeldingen = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Database fout: " . $e->getMessage());
}

require 'views/overzicht_view.php';
