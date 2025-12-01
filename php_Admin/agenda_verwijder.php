<?php
require 'config.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : null;

if ($id === null) {
    include 'index.php';
    exit;
}

$query = "SELECT * FROM anime_agenda WHERE ID = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch();

if (!$result) {
    include 'index.php';
    exit;
}

include 'views/agenda_verwijder_view.php';