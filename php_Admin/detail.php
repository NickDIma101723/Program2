<?php
require 'config.php';

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    try {
        $query = "SELECT * FROM anime_agenda WHERE ID = :ID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $amountRows = $stmt->rowCount();

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No ID provided. <a href='index.php'>Back to overview</a>";
}

include "views/detail_view.php";