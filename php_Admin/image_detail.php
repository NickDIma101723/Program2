<?php
require 'config.php';

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    try {
        $query = "SELECT * FROM afbeeldingen WHERE ID = :ID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        $result = $stmt->fetch();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No ID provided. <a href='overzicht.php'>Back to overview</a>";
}

include 'views/image_detail_view.php';
?>