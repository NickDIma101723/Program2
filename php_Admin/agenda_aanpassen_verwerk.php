<?php
require_once 'config.php';

$ID = "";
$name = "";
$character = "";
$rating = "";
$episodes = "";
$releaseDate = "";
$endAir = "";
$genre = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ID = $_POST["ID"];
    $name = $_POST["Name"];
    $character = $_POST["Character"];
    $rating = $_POST["Rating"];
    $episodes = $_POST["Episodes"];
    $releaseDate = $_POST["releaseDate"];
    $endAir = $_POST["endAir"];
    $genre = $_POST["Genre"];

    try {
        $query = "UPDATE anime_agenda 
                  SET `Name` = :name, `Character` = :character, `Rating` = :rating, `Episodes` = :episodes,
                      `Release Date` = :releaseDate, `End Air` = :endAir, `Genre` = :genre
                  WHERE ID = :ID";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'name' => $name,
            'character' => $character,
            'rating' => $rating,
            'episodes' => $episodes,
            'releaseDate' => $releaseDate,
            'endAir' => $endAir,
            'genre' => $genre,
            'ID' => $ID
        ]);

        $success = true;
        $message = "$name has been updated successfully.";
    } catch (PDOException $e) {
        $success = false;
        $message = "An error occurred while updating the anime.";
    }
}

include "views/agenda_aanpassen_verwerk_view.php";
?>
