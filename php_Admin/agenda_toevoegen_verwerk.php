<?php
require 'config.php';

session_start();

$message = "";
$errors = [];

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || $_SESSION['token'] !== $_POST['token']) {
        $errors[] = "Invalid CSRF token.";
    } else {
        try {

            $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
            if (empty($name)) {
                $errors[] = "Name is required.";
            }

            $rating = filter_input(INPUT_POST, 'rating', FILTER_UNSAFE_RAW);
            if (empty($rating) || !is_numeric($rating) || $rating < 1 || $rating > 10) {
                $errors[] = "Rating must be a number between 1 and 10.";
            }

            $character = filter_input(INPUT_POST, 'character', FILTER_UNSAFE_RAW);
            if (empty($character)) {
                $errors[] = "Character is required.";
            }

            $episodes = filter_input(INPUT_POST, 'episodes', FILTER_UNSAFE_RAW);
            if (empty($episodes) || !is_numeric($episodes) || $episodes < 1) {
                $errors[] = "Episodes must be a positive number.";
            }

            $releaseDate = filter_input(INPUT_POST, 'releaseDate', FILTER_UNSAFE_RAW);
            if (empty($releaseDate)) {
                $errors[] = "Release date is required.";
            } else {
                $datum1 = strtotime($releaseDate);
                $goede_datum = date('Y-m-d', $datum1);
                if ($releaseDate !== $goede_datum) {
                    $errors[] = "Invalid release date format.";
                }
            }

            $endAir = filter_input(INPUT_POST, 'endAir', FILTER_UNSAFE_RAW);
            if (empty($endAir)) {
                $errors[] = "End air date is required.";
            } else {
                $datum1 = strtotime($endAir);
                $goede_datum = date('Y-m-d', $datum1);
                if ($endAir !== $goede_datum) {
                    $errors[] = "Invalid end air date format.";
                }
            }

            $genre = filter_input(INPUT_POST, 'genre', FILTER_UNSAFE_RAW);
            if (empty($genre)) {
                $errors[] = "Genre is required.";
            }

            if (empty($errors)) {
                $query = "INSERT INTO anime_agenda (`Name`, `Rating`, `Character`, `Episodes`, `Release Date`, `End Air`, `Genre`)
                          VALUES (:name, :rating, :character, :episodes, :releaseDate, :endAir, :genre)";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':rating', $rating);
                $stmt->bindParam(':character', $character);
                $stmt->bindParam(':episodes', $episodes);
                $stmt->bindParam(':releaseDate', $releaseDate);
                $stmt->bindParam(':endAir', $endAir);
                $stmt->bindParam(':genre', $genre);

                $stmt->execute();

                $message = "Anime added successfully!";
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
            } else {
                $message = "Please fix the following errors: " . implode(', ', $errors);
            }
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}

include 'views/agenda_toevoegen_view.php';
?>