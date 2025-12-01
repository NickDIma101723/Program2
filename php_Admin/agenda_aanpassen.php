<?php

require 'config.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : null;

if ($id === null) {
    include 'index.php';
    exit;
}

try {
    $query = "SELECT * FROM anime_agenda WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
    include 'index.php';
        exit;
    }

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    $releaseDate = $record['Release Date'] ? date('Y-m-d', strtotime($record['Release Date'])) : null;
    $endAir = $record['End Air'] ? date('Y-m-d', strtotime($record['End Air'])) : null;

} catch (PDOException $e) {
    $error = "An error occurred while retrieving data.";
}

include 'views/agenda_aanpassen_view.php';