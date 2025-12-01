<?php
require 'config.php';

$id = isset($_POST['ID']) ? $_POST['ID'] : null;

if ($id === null) {
    include 'index.php';
    exit;
}

try {
    $query = "DELETE FROM anime_agenda WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $success = true;
    $message = "The anime has been successfully deleted.";
} catch (PDOException $e) {
    $success = false;
    $message = "An error occurred while deleting the anime.";
}

include 'views/agenda_verwijder_verwerk_view.php';
